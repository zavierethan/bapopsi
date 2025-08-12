<?php

namespace App\Http\Controllers;

use Barryvdh\DomPDF\Facade\Pdf;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use DB;
use Auth;

class AthleteController extends Controller
{
    public function index() {
        return view('modules.athletes.index');
    }

    public function getLists(Request $request){
        $params = $request->all();

        $query = DB::table('atlet')
            ->select(
                'atlet.*',
                'events.name as nama_event',
                DB::raw("TO_CHAR(atlet.tanggal_lahir, 'DD/MM/YYYY') AS tanggal_lahir"),
                DB::raw("CASE
                    WHEN atlet.appr_status IS NULL THEN 'Waiting Approval'
                    WHEN atlet.appr_status = 1 THEN 'Approved'
                    WHEN atlet.appr_status = 0 THEN 'Rejected'
                END as approval_status"),
                DB::raw("CASE
                    WHEN atlet.perolehan_medali IS NULL THEN '-'
                    WHEN atlet.perolehan_medali = 1 THEN 'Emas (1)'
                    WHEN atlet.perolehan_medali = 2 THEN 'Perak (2)'
                    WHEN atlet.perolehan_medali = 3 THEN 'Perunggu (3)'
                END as perolehan_medali"),
                DB::raw("TO_CHAR(atlet.appr_date, 'DD/MM/YYYY HH24:MI:SS') AS approval_date"),
                'atlet.appr_notes',
                'sports.name as cabang_olahraga',
                'event_registrations.jenjang',
                'event_registrations.kecamatan_id',
                'event_registrations.sub_rayon_id',
                'kecamatan.nama as nama_kecamatan',
                'sub_rayon.nama as nama_sub_rayon',
            )
            ->leftJoin('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id')
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'atlet.event_reg_id')
            ->leftJoin('events', 'events.id', '=', 'event_registrations.event_id')
            ->leftJoin('kecamatan', 'kecamatan.id', '=', 'event_registrations.kecamatan_id')
            ->leftJoin('sub_rayon', 'sub_rayon.id', '=', 'event_registrations.sub_rayon_id');

        if (!empty($params['eventCategory']) && $params['eventCategory'] !== ' ') {
            $query->where('events.event_category_id', $params['eventCategory']);
        }

        if (!empty($params['jenjang']) && $params['jenjang'] !== ' ') {
            $query->where('event_registrations.jenjang', $params['jenjang']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('atlet.nama_lengkap', 'like', '%' . strtoupper($searchValue) . '%');
            });
        }

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $totalRecords = $query->count();
        $filteredRecords = $query->count();
        $data = $query->orderBy('atlet.id', 'desc')->skip($start)->take($length)->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }

    public function create() {
        $cabor = DB::table('sports')->orderBy('name', 'asc')->get();
        $officials = DB::table('jabatan_official')->orderBy('id', 'asc')->get();
        return view('modules.athletes.create', compact('cabor', 'officials'));
    }

    public function save(Request $request) {
        $request->validate([
            'nama_lengkap'       => 'required|string|max:255',
            'tempat_lahir'       => 'required|string|max:255',
            'tanggal_lahir'      => 'required|date',
            'jenis_kelamin'      => 'required|in:L,P',
            'nama_sekolah'       => 'required|string|max:255',
            'nisn'               => 'required|string|max:50',
            'cabang_olahraga'    => 'required|exists:sports,id',
            'kelas_id'           => 'required|exists:sport_classes,id',
            'pas_foto'           => 'required|file|mimes:jpg,jpeg,png|max:2048',
            'raport'             => 'required|file|mimes:pdf|max:2048',
            'akta_lahir'         => 'required|file|mimes:pdf|max:2048',
            'officials.*.jabatan'=> 'required_with:officials.*.jabatan|exists:jabatan_official,id|max:255',
            'officials.*.nama'   => 'required_with:officials.*.nama|string|max:255',
            'officials.*.foto'   => 'required_with:officials|file|mimes:jpg,jpeg,png|max:2048'
        ]);

        DB::beginTransaction();

        try {
            $pasFotoPath = $request->hasFile('pas_foto')
                ? $request->file('pas_foto')->store('uploads/atlet', 'public')
                : null;

            $raportPath = $request->hasFile('raport')
                ? $request->file('raport')->store('uploads/atlet', 'public')
                : null;

            $aktaPath = $request->hasFile('akta_lahir')
                ? $request->file('akta_lahir')->store('uploads/atlet', 'public')
                : null;

            $atletId = DB::table('atlet')->insertGetId([
                'nama_lengkap'       => $request->nama_lengkap,
                'tempat_lahir'       => $request->tempat_lahir,
                'tanggal_lahir'      => $request->tanggal_lahir,
                'jenis_kelamin'      => $request->jenis_kelamin,
                'nama_sekolah'       => $request->nama_sekolah,
                'nisn'               => $request->nisn,
                'pas_foto'           => $pasFotoPath,
                'raport'             => $raportPath,
                'akta_lahir'         => $aktaPath,
                'cabang_olahraga_id' => $request->cabang_olahraga,
                'kelas_id'           => $request->kelas_id,
                'created_at'         => now(),
                'updated_at'         => now(),
                'created_by'         => Auth::user()->id,
            ]);

            if ($request->has('officials')) {
                foreach ($request->officials as $index => $official) {
                    $fotoPath = null;
                    $fotoInputName = "officials.{$index}.foto";

                    if ($request->hasFile($fotoInputName)) {
                        $fotoPath = $request->file($fotoInputName)->store('uploads/official', 'public');
                    }

                    DB::table('officials')->insert([
                        'atlet_id'   => $atletId,
                        'jabatan_id'    => $official['jabatan'],
                        'nama'       => $official['nama'],
                        'foto'       => $fotoPath,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }

            DB::commit();
            return response()->json(['message' => 'Data berhasil disimpan']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Gagal menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id) {
        $atlet = DB::table('atlet')->where('id', $id)->first();
        $officials = DB::table('officials')->leftJoin('jabatan_official', 'jabatan_official.id', '=', 'officials.jabatan_id')->get();
        $medals = DB::table('medals')->where('atlet_id', $atlet->id)->get();
        $jabatan = DB::table('jabatan_official')->orderBy('id', 'asc')->get();
        $cabor = DB::table('sports')->get();
        $kelas = DB::table('sport_classes')->where('sport_id', $atlet->cabang_olahraga_id)->get();

        return view('modules.athletes.edit', compact('atlet', 'officials', 'cabor', 'kelas', 'jabatan', 'medals'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama_lengkap'    => 'required|string|max:255',
            'tempat_lahir'    => 'required|string|max:255',
            'tanggal_lahir'   => 'required|date',
            'jenis_kelamin'   => 'required|in:L,P',
            'nama_sekolah'    => 'required|string|max:255',
            'nisn'            => 'required|string|max:20',
            'pas_foto'        => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'raport'          => 'nullable|mimes:pdf|max:2048',
            'akta_lahir'      => 'nullable|mimes:pdf|max:2048'
        ]);

        DB::beginTransaction();

        try {
            $atlet = DB::table('atlet')->where('id', $id)->first();
            if (!$atlet) {
                return response()->json(['message' => 'Data atlet tidak ditemukan.'], 404);
            }

            $updateData = [
                'nama_lengkap'       => $request->nama_lengkap,
                'tempat_lahir'       => $request->tempat_lahir,
                'tanggal_lahir'      => $request->tanggal_lahir,
                'jenis_kelamin'      => $request->jenis_kelamin,
                'nama_sekolah'       => $request->nama_sekolah,
                'nisn'               => $request->nisn,
                'perolehan_medali'   => $request->perolehan_medali,
                'appr_status'        => null,
                'updated_at'         => now()
            ];

            // Handle file uploads
            if ($request->hasFile('pas_foto')) {
                if ($atlet->pas_foto) Storage::disk('public')->delete($atlet->pas_foto);
                $updateData['pas_foto'] = $request->file('pas_foto')->store('uploads/atlets/pas_foto', 'public');
            }

            if ($request->hasFile('raport')) {
                if ($atlet->raport) Storage::disk('public')->delete($atlet->raport);
                $updateData['raport'] = $request->file('raport')->store('uploads/atlets/raport', 'public');
            }

            if ($request->hasFile('akta_lahir')) {
                if ($atlet->akta_lahir) Storage::disk('public')->delete($atlet->akta_lahir);
                $updateData['akta_lahir'] = $request->file('akta_lahir')->store('uploads/atlets/akta_lahir', 'public');
            }

            // Update atlet data
            DB::table('atlet')->where('id', $id)->update($updateData);

            DB::commit();

            return response()->json([
                'message' => 'Data atlet berhasil diperbarui.'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Terjadi kesalahan saat memperbarui data.',
                'error'   => $e->getMessage(),
            ], 500);
        }
    }

    public function approve($id) {
        DB::beginTransaction();

        try {
            DB::table('atlet')->where('id', $id)->update([
                'appr_status' => 1,
                'appr_date' => now(),
            ]);

            DB::commit();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Approval failed.',
                'error'   => $e->getMessage()
            ], 500);
        }
    }

    public function reject($id, Request $request) {
        DB::table('atlet')->where('id', $id)->update([
            "appr_status" => 0,
            "appr_notes"  => $request->reason,
            "appr_date"   => now()
        ]);

        return response()->json(['success' => true]);
    }

    public function generateNameTagPdf($id) {

        $atlet = DB::table('atlet')
            ->join('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id')
            ->select('atlet.*', 'sports.name as cabang_olahraga')
            ->where('atlet.id', $id)
            ->first();

        if (!$atlet) {
            abort(404);
        }

        $url = url('/athletes/detail/' . $id);
        $qrSvg = QrCode::format('svg')->size(150)->generate($url);
        $qrBase64 = $qrSvg;

        $pdf = Pdf::loadView('modules.athletes.pdf-nametag', [
            'atlet' => $atlet,
            'qrBase64' => $qrBase64,
        ])->setPaper([0, 0, 270, 420]);

        return view('modules.athletes.pdf-nametag');
    }

    public function showIdCard($id) {
        $atlet = DB::table('atlet')
            ->select(
                'atlet.*',
                'events.name as nama_event',
                'sports.name as cabang_olahraga'
            )
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'atlet.event_reg_id')
            ->leftJoin('events', 'events.id', '=', 'event_registrations.event_id')
            ->leftJoin('sports', 'sports.id', '=', 'event_registrations.sport_id')
            ->leftJoin('kecamatan', 'kecamatan.id', '=', 'event_registrations.kecamatan_id')
            ->leftJoin('sub_rayon', 'sub_rayon.id', '=', 'event_registrations.sub_rayon_id')
            ->where('atlet.id', $id)
            ->first();

        if (!$atlet) {
            abort(404);
        }

        $approvalStatus = $atlet->appr_status == 1 ? "Verified" : "Not Verified";
        $qrUrl = $approvalStatus;

        return view('modules.athletes.idcard', compact('atlet', 'qrUrl'));
    }

    private function convertImageToBase64($path){
        if (!file_exists($path)) {
            return null;
        }

        $type = pathinfo($path, PATHINFO_EXTENSION);
        $data = file_get_contents($path);
        return 'data:image/' . $type . ';base64,' . base64_encode($data);
    }
}
