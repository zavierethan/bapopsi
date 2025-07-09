<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use DB;
use Auth;

class EventRegistrationController extends Controller
{
    public function index() {
        return view('modules.event-registrations.index');
    }

    public function getLists(Request $request){
        $params = $request->all();

        $query = DB::table('event_registrations')
            ->select(
            'event_registrations.*',
            'events.name',
            'events.description',
            DB::raw("TO_CHAR(event_registrations.approved_at, 'DD/MM/YYYY HH24:MI:SS') AS approval_date_formatted"),
            DB::raw("TO_CHAR(event_registrations.created_at, 'DD/MM/YYYY HH24:MI:SS') AS created_at_formatted"),
            'kecamatan.nama as nama_kecamatan',
            'sub_rayon.nama as sub_rayon',
            DB::raw("CASE
                        WHEN event_registrations.appr_status IS NULL THEN 'Waiting Approval'
                        WHEN event_registrations.appr_status = 1 THEN 'Approved'
                        WHEN event_registrations.appr_status = 0 THEN 'Rejected'
                    END as approval_status")
            )
            ->leftJoin('events', 'events.id', '=', 'event_registrations.event_id')
            ->leftJoin('kecamatan', 'kecamatan.id', '=', 'event_registrations.kecamatan_id')
            ->leftJoin('sub_rayon', 'sub_rayon.id', '=', 'event_registrations.sub_rayon_id');

        if (!empty($params['nama_lengkap'])) {
            $query->where('event_registrations.id', $params['name']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('event_registrations.id', 'like', '%' . strtoupper($searchValue) . '%');
            });
        }

        // if ($request->has('order') && $request->order) {
        //     $columnIndex = $request->order[0]['column'];
        //     $sortDirection = $request->order[0]['dir'];
        //     $columnName = $request->columns[$columnIndex]['data'];

        //     $query->orderBy($columnName, $sortDirection);
        // }

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $totalRecords = $query->count();
        $filteredRecords = $query->count();
        $data = $query->orderBy('id', 'desc')->skip($start)->take($length)->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }

    public function create() {
        $events = DB::table('events')->get();
        $cabangOlahraga = DB::table('sports')->get();
        $jabatan = DB::table('jabatan_official')->get();
        return view('modules.event-registrations.create', compact('events', 'cabangOlahraga', 'jabatan'));
    }

    public function save(Request $request) {
        DB::beginTransaction();

        try {
            $userId = Auth::user()->id;

            $manager = DB::table('managers')->where('user_id', $userId)->first();

            if (!$manager) {
                return response()->json([
                    'success' => false,
                    'message' => 'Managers (Pengelola) ID tidak ditemukan!'
                ], 404);
            }

            // Simpan pendaftaran event utama
            $eventRegId = DB::table('event_registrations')->insertGetId([
                'event_id' => $request->event_id,
                'sport_id' => $request->cabang_olahraga_id,
                'sport_class_id' => $request->sport_class_id,
                'manager_id' => $manager->id,
                'kecamatan_id' => $manager->kecamatan_id,
                'sub_rayon_id' => $manager->sub_rayon_id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // =======================
            // Simpan data ATLET
            // =======================
            $atlets = $request->input('atlets', []);
            foreach ($atlets as $index => $a) {
                // Default nilai
                $pasFoto = null;
                $raport = null;
                $aktaLahir = null;

                // Upload pas foto
                if ($request->hasFile("atlets.$index.pas_foto")) {
                    $pasFoto = $request->file("atlets.$index.pas_foto")->store('uploads/atlets/pas_foto', 'public');
                }

                // Upload raport
                if ($request->hasFile("atlets.$index.raport")) {
                    $raport = $request->file("atlets.$index.raport")->store('uploads/atlets/raport', 'public');
                }

                // Upload akta lahir
                if ($request->hasFile("atlets.$index.akta_lahir")) {
                    $aktaLahir = $request->file("atlets.$index.akta_lahir")->store('uploads/atlets/akta_lahir', 'public');
                }

                // Simpan atlet
                DB::table('atlet')->insert([
                    'nama_lengkap'       => $a['nama_lengkap'] ?? '',
                    'tempat_lahir'       => $a['tempat_lahir'] ?? '',
                    'tanggal_lahir'      => $a['tanggal_lahir'] ?? null,
                    'jenis_kelamin'      => $a['jenis_kelamin'] ?? '',
                    'nama_sekolah'       => $a['nama_sekolah'] ?? '',
                    'nisn'               => $a['nisn'] ?? '',
                    'pas_foto'           => $pasFoto,
                    'raport'             => $raport,
                    'akta_lahir'         => $aktaLahir,
                    'event_reg_id'       => $eventRegId,
                    'cabang_olahraga_id' => $request->cabang_olahraga_id,
                    'kelas_id'           => $request->sport_class_id,
                    'created_by'         => $userId,
                    'created_at'         => now(),
                    'updated_at'         => now(),
                ]);
            }

            // =======================
            // Simpan data OFFICIAL
            // =======================
            $officials = $request->input('officials', []);
            foreach ($officials as $index => $o) {
                $fotoPath = null;

                if ($request->hasFile("officials.$index.foto")) {
                    $fotoPath = $request->file("officials.$index.foto")->store('uploads/officials/foto', 'public');
                }

                DB::table('officials')->insert([
                    'nama'          => $o['nama_lengkap'] ?? '',
                    'jabatan_id'    => $o['jabatan'] ?? null,
                    'foto'          => $fotoPath,
                    'event_reg_id'  => $eventRegId,
                    'created_by'    => $userId,
                    'created_at'    => now(),
                    'updated_at'    => now(),
                ]);
            }

            DB::commit();

            return response()->json([
                'message' => 'Pendaftaran berhasil disimpan.'
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Terjadi kesalahan saat menyimpan data.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function edit($id) {
        $registration = DB::table('event_registrations')->where('id', $id)->first();

        if (!$registration) {
            abort(404, 'Data tidak ditemukan.');
        }

        $atlets = DB::table('atlet')->where('event_reg_id', $id)->get();
        $officials = DB::table('officials')->where('event_reg_id', $id)->get();

        return view('modules.event-registrations.edit', [
            'eventRegistration' => $registration,
            'atlets' => $atlets,
            'officials' => $officials,
            'events' => DB::table('events')->get(),
            'cabangOlahraga' => DB::table('sports')->get(),
            'kelasOlahraga' => DB::table('sport_classes')->where('sport_id', $registration->sport_id)->get(),
            'jabatans' => DB::table('jabatan_official')->get(),
        ]);
    }

    public function update(Request $request, $id) {
        DB::beginTransaction();
        try {
            // 1. Update event registration info
            DB::table('event_registrations')->where('id', $id)->update([
                'event_id' => $request->event_id,
                'sport_id' => $request->cabang_olahraga_id,
                'sport_class_id' => $request->sport_class_id,
                'updated_at' => now()
            ]);

            foreach ($request->atlets ?? [] as $index => $atlet) {

                $existingAtlet = DB::table('atlet')->where('id', $atlet['id'])->first();

                $updateData = [
                    'nama_lengkap'   => $atlet['nama_lengkap'],
                    'tempat_lahir'   => $atlet['tempat_lahir'] ?? null,
                    'tanggal_lahir'  => $atlet['tanggal_lahir'] ?? null,
                    'jenis_kelamin'  => $atlet['jenis_kelamin'] ?? null,
                    'nama_sekolah'   => $atlet['nama_sekolah'] ?? null,
                    'nisn'           => $atlet['nisn'] ?? null,
                    'updated_at'     => now(),
                ];

                // Handle file uploads
                if ($request->hasFile("atlets.$index.pas_foto")) {
                    if ($existingAtlet->pas_foto) Storage::disk('public')->delete($existingAtlet->pas_foto);
                    $updateData['pas_foto'] = $request->file("atlets.$index.pas_foto")->store('atlets/pas_foto', 'public');
                }

                if ($request->hasFile("atlets.$index.raport")) {
                    if ($existingAtlet->raport) Storage::disk('public')->delete($existingAtlet->raport);
                    $updateData['raport'] = $request->file("atlets.$index.raport")->store('atlets/raport', 'public');
                }

                if ($request->hasFile("atlets.$index.akta_lahir")) {
                    if ($existingAtlet->akta_lahir) Storage::disk('public')->delete($existingAtlet->akta_lahir);
                    $updateData['akta_lahir'] = $request->file("atlets.$index.akta_lahir")->store('atlets/akta_lahir', 'public');
                }

                DB::table('atlet')->where('id', $atlet['id'])->update($updateData);
            }

            foreach ($request->officials ?? [] as $index => $official) {
                $existingOfficial = DB::table('officials')->where('id', $official['id'])->first();

                $updatedOfficial = [
                    'nama'         => $official['nama_lengkap'],
                    'jabatan_id'   => $official['jabatan'],
                    'updated_at'   => now(),
                ];

                if ($request->hasFile("officials.$index.foto")) {
                    if ($existingOfficial->foto) Storage::disk('public')->delete($existingOfficial->foto);
                    $updatedOfficial['foto'] = $request->file("officials.$index.foto")->store('officials/foto', 'public');
                }

                DB::table('officials')->where('id', $official['id'])->update($updatedOfficial);
            }

            DB::commit();
            return response()->json(['success' => true, 'message' => 'Data berhasil diperbarui.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => 'Gagal update data: ' . $e->getMessage()], 500);
        }
    }


    public function approve($id) {
        DB::beginTransaction();

        try {
            $registration = DB::table('registration_requests')->where('id', $id)->first();

            if (!$registration) {
                return response()->json(['success' => false, 'message' => 'Registration not found.'], 404);
            }

            DB::table('users')->insert([
                'name' => $registration->username,
                'email' => $registration->email,
                'password' => $registration->password_hash,
                'group_id' => 15,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('registration_requests')->where('id', $id)->update([
                'approval_status' => 1,
                'approval_date' => now(),
            ]);

            DB::commit();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Approval failed.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function reject($id) {
        DB::table('registration_requests')->where('id', $id)->update([
            "approval_status" => 0,
            "approval_date" => now()
        ]);

        return response()->json(['success' => true]);
    }

    public function getTotalApprovalSummary() {
        $summary = DB::table('registration_requests')
            ->selectRaw("
                COUNT(*) FILTER (WHERE approval_status IS NULL) AS waiting_approval,
                COUNT(*) FILTER (WHERE approval_status = 1) AS approved,
                COUNT(*) FILTER (WHERE approval_status = 0) AS rejected
            ")
            ->first();

        return response()->json([
            'waiting_approval' => $summary->waiting_approval,
            'approved' => $summary->approved,
            'rejected' => $summary->rejected,
        ]);
    }

    public function getKecamatanMedalSummary(Request $request) {
        $query = DB::table('kecamatan as k')
            ->leftJoin('event_registrations as er', 'er.kecamatan_id', '=', 'k.id')
            ->leftJoin('atlet as a', 'a.event_reg_id', '=', 'er.id')
            ->leftJoin('medals as m', 'm.atlet_id', '=', 'a.id')
            ->select(
                'k.id',
                'k.nama',
                DB::raw('COUNT(m.id) as total'),
                DB::raw("COUNT(CASE WHEN m.medal_type = 'emas' THEN 1 END) as emas"),
                DB::raw("COUNT(CASE WHEN m.medal_type = 'perak' THEN 1 END) as perak"),
                DB::raw("COUNT(CASE WHEN m.medal_type = 'perunggu' THEN 1 END) as perunggu")
            )
            ->groupBy('k.id', 'k.nama')
            ->orderBy('k.nama');

        if ($request->has('kecamatan_id')) {
            $query->where('k.id', $request->input('kecamatan_id'));
        }

        $results = $query->get();

        return response()->json($results);
    }

    public function getAtletByKecamatanId(Request $request) {

        $query = DB::table('event_registrations as er')
            ->leftJoin('atlet as a', 'a.event_reg_id', '=', 'er.id')
            ->leftJoin('medals as m', 'm.atlet_id', '=', 'a.id')
            ->select(
                'a.id as atlet_id',
                'a.nama_lengkap',
                'a.nama_sekolah',
                DB::raw('COUNT(m.id) as total_medali'),
                DB::raw("SUM(CASE WHEN m.medal_type = 'emas' THEN 1 ELSE 0 END) as emas"),
                DB::raw("SUM(CASE WHEN m.medal_type = 'perak' THEN 1 ELSE 0 END) as perak"),
                DB::raw("SUM(CASE WHEN m.medal_type = 'perunggu' THEN 1 ELSE 0 END) as perunggu")
            )
            ->where('er.kecamatan_id', $request->kecamatan_id)
            ->groupBy('a.id', 'a.nama_lengkap', 'a.nama_sekolah')
            ->get();

        return response()->json($query);
    }

    public function getTotalMedalSummary() {
        $result = DB::table('kecamatan as k')
            ->leftJoin('event_registrations as er', 'er.kecamatan_id', '=', 'k.id')
            ->leftJoin('atlet as a', 'a.event_reg_id', '=', 'er.id')
            ->leftJoin('medals as m', 'm.atlet_id', '=', 'a.id')
            ->selectRaw("
                COUNT(m.id) AS total,
                COUNT(CASE WHEN m.medal_type = 'emas' THEN 1 END) AS emas,
                COUNT(CASE WHEN m.medal_type = 'perak' THEN 1 END) AS perak,
                COUNT(CASE WHEN m.medal_type = 'perunggu' THEN 1 END) AS perunggu
            ")
            ->first();

            return response()->json($result);
    }
}
