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
                DB::raw("TO_CHAR(atlet.tanggal_lahir, 'DD/MM/YYYY') AS tanggal_lahir"),
                DB::raw("CASE
                        WHEN atlet.appr_status IS NULL THEN 'Waiting Approval'
                        WHEN atlet.appr_status = 1 THEN 'Approved'
                        WHEN atlet.appr_status = 0 THEN 'Rejected'
                    END as approval_status"
                ),
                DB::raw("TO_CHAR(atlet.appr_date, 'DD/MM/YYYY HH24:MI:SS') AS approval_date"),
                'sports.name as cabang_olahraga'
            )
            ->leftJoin('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id');

        if (!empty($params['nama_lengkap'])) {
            $query->where('atlet.nama_lengkap', $params['nama_lengkap']);
        }

        $user = Auth::user();

        if (!in_array($user->group_id, [1, 14])) {
            $query->where('atlet.created_by', $user->id);
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
        $officials = DB::table('officials')->where('atlet_id', $id)
                ->leftJoin('jabatan_official', 'jabatan_official.id', '=', 'officials.jabatan_id')
                ->get();
        $jabatan = DB::table('jabatan_official')->orderBy('id', 'asc')->get();
        $cabor = DB::table('sports')->get();
        $kelas = DB::table('sport_classes')->where('sport_id', $atlet->cabang_olahraga_id)->get();

        return view('modules.athletes.edit', compact('atlet', 'officials', 'cabor', 'kelas', 'jabatan'));
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
            'akta_lahir'      => 'nullable|mimes:pdf|max:2048',
            'cabang_olahraga' => 'required|exists:sports,id',
            'kelas_id'        => 'required|exists:sport_classes,id',
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
                'cabang_olahraga_id' => $request->cabang_olahraga,
                'kelas_id'           => $request->kelas_id,
                'updated_at'         => now()
            ];

            // Handle file uploads
            if ($request->hasFile('pas_foto')) {
                if ($atlet->pas_foto) Storage::disk('public')->delete($atlet->pas_foto);
                $updateData['pas_foto'] = $request->file('pas_foto')->store('uploads/atlet', 'public');
            }

            if ($request->hasFile('raport')) {
                if ($atlet->raport) Storage::disk('public')->delete($atlet->raport);
                $updateData['raport'] = $request->file('raport')->store('uploads/atlet', 'public');
            }

            if ($request->hasFile('akta_lahir')) {
                if ($atlet->akta_lahir) Storage::disk('public')->delete($atlet->akta_lahir);
                $updateData['akta_lahir'] = $request->file('akta_lahir')->store('uploads/atlet', 'public');
            }

            // Update atlet data
            DB::table('atlet')->where('id', $id)->update($updateData);

            // Hapus semua existing officials dan insert ulang
            DB::table('officials')->where('atlet_id', $id)->delete();

            $officials = $request->input('officials', []);
            foreach ($officials as $index => $o) {
                $fotoPath = null;

                if ($request->hasFile("officials.$index.foto")) {
                    if (!empty($o['foto_existing'])) {
                        Storage::disk('public')->delete($o['foto_existing']);
                    }
                    $fotoPath = $request->file("officials.$index.foto")->store('uploads/official', 'public');
                } elseif (!empty($o['foto_existing'])) {
                    $fotoPath = $o['foto_existing'];
                }

                DB::table('officials')->insert([
                    'atlet_id'   => $id,
                    'jabatan_id' => $o['jabatan'],
                    'nama'       => $o['nama'],
                    'foto'       => $fotoPath,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

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

    public function reject($id) {
        DB::table('atlet')->where('id', $id)->update([
            "appr_status" => 0,
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

        $url = url('/athletes/edit/' . $id);
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
            ->join('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id')
            ->select('atlet.*', 'sports.name as cabang_olahraga')
            ->where('atlet.id', $id)
            ->first();
        if (!$atlet) {
            abort(404);
        }

        if($atlet->appr_status == 1) {
            $approvalStatus = "Verified";
        } else {
            $approvalStatus = "Not Verified";
        }
        $qrUrl = $approvalStatus; // This should be the route to athlete detail
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
