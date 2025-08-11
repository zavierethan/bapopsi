<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Auth;

class EventRegistrationController extends Controller
{
    public function index() {
        $cabangOlahraga = DB::table('sports')->get();
        $eventCategories = DB::table('event_categories')->get();
        return view('modules.event-registrations.index', compact('cabangOlahraga', 'eventCategories'));
    }

    public function getLists(Request $request){
        $params = $request->all();

        $query = DB::table('event_registrations')
            ->select(
            'event_registrations.*',
            'event_categories.name as event_category',
            'sports.name as cabang_olahraga',
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
            ->leftJoin('event_categories', 'event_categories.id', '=', 'events.event_category_id')
            ->leftJoin('kecamatan', 'kecamatan.id', '=', 'event_registrations.kecamatan_id')
            ->leftJoin('sub_rayon', 'sub_rayon.id', '=', 'event_registrations.sub_rayon_id')
            ->leftJoin('sports', 'sports.id', '=', 'event_registrations.sport_id');

        if (!empty($params['eventCategory']) && $params['eventCategory'] !== ' ') {
            $query->where('events.event_category_id', $params['eventCategory']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('event_registrations.id', 'like', '%' . strtoupper($searchValue) . '%');
            });
        }

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

        $cabangOlahraga = DB::table('sports')->get();
        $jabatan = DB::table('jabatan_official')->get();

        if(Auth::user()->group_id == 15) {
            $events = DB::table('events')->where('event_category_id', 1)->get();
            return view('modules.event-registrations.create', compact('events', 'cabangOlahraga', 'jabatan'));
        } else if(Auth::user()->group_id == 16) {
            $events = DB::table('events')->whereNotIn('event_category_id', [1])->get();
            return view('modules.event-registrations.create', compact('events', 'cabangOlahraga', 'jabatan'));
        } else {
            abort(404);
        }
    }

    public function save(Request $request) {
        DB::beginTransaction();

        try {
            $userId = Auth::user()->id;

            $userRole = Auth::user()->group_id;

            $approvalStatus = NULL;
            $approvalDate = NULL;

            if($userRole != 16) {
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
            } else {
                $eventRegId = DB::table('event_registrations')->insertGetId([
                    'event_id' => $request->event_id,
                    'sport_id' => $request->cabang_olahraga_id,
                    'sport_class_id' => $request->sport_class_id,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);

                $approvalStatus = 1;
                $approvalDate = now();
            }

            $atlets = $request->input('atlets', []);
            foreach ($atlets as $index => $a) {
                // Default nilai
                $pasFoto = null;
                $raport = null;
                $aktaLahir = null;
                $sk = null;

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

                // Upload SK
                if ($request->hasFile("atlets.$index.sk")) {
                    $sk = $request->file("atlets.$index.sk")->store('uploads/atlets/sk', 'public');
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
                    'sk'                 => $sk,
                    'akta_lahir'         => $aktaLahir,
                    'event_reg_id'       => $eventRegId,
                    'cabang_olahraga_id' => $request->cabang_olahraga_id,
                    'kelas_id'           => $request->sport_class_id,
                    'appr_status'        => $approvalStatus,
                    'appr_date'          => $approvalDate,
                    'created_by'         => $userId,
                    'created_at'         => now(),
                    'updated_at'         => now(),
                ]);
            }

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

        $atlets = DB::table('atlet')
            ->select(
                'atlet.*',
                 DB::raw("CASE
                        WHEN atlet.appr_status IS NULL THEN 'Waiting Approval'
                        WHEN atlet.appr_status = 1 THEN 'Approved'
                        WHEN atlet.appr_status = 0 THEN 'Rejected'
                    END as approval_status")
            )
            ->where('event_reg_id', $id)->get();
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
                'event_id'       => $request->event_id,
                'sport_id'       => $request->cabang_olahraga_id,
                'sport_class_id' => $request->sport_class_id,
                'updated_at'     => now()
            ]);

            // 2. Update atlets
            foreach ($request->atlets ?? [] as $index => $atlet) {
                if (empty($atlet['id'])) {
                    continue; // skip jika ID atlet kosong
                }

                $existingAtlet = DB::table('atlet')->where('id', $atlet['id'])->first();
                if (!$existingAtlet) {
                    continue; // skip jika data atlet tidak ditemukan
                }

                $updateData = [
                    'nama_lengkap'   => $atlet['nama_lengkap'] ?? $existingAtlet->nama_lengkap,
                    'tempat_lahir'   => $atlet['tempat_lahir'] ?? $existingAtlet->tempat_lahir,
                    'tanggal_lahir'  => $atlet['tanggal_lahir'] ?? $existingAtlet->tanggal_lahir,
                    'jenis_kelamin'  => $atlet['jenis_kelamin'] ?? $existingAtlet->jenis_kelamin,
                    'nama_sekolah'   => $atlet['nama_sekolah'] ?? $existingAtlet->nama_sekolah,
                    'nisn'           => $atlet['nisn'] ?? $existingAtlet->nisn,
                    'updated_at'     => now(),
                ];

                // Handle file uploads
                if ($request->hasFile("atlets.$index.pas_foto")) {
                    if (!empty($existingAtlet->pas_foto)) Storage::disk('public')->delete($existingAtlet->pas_foto);
                    $updateData['pas_foto'] = $request->file("atlets.$index.pas_foto")->store('atlets/pas_foto', 'public');
                }

                if ($request->hasFile("atlets.$index.raport")) {
                    if (!empty($existingAtlet->raport)) Storage::disk('public')->delete($existingAtlet->raport);
                    $updateData['raport'] = $request->file("atlets.$index.raport")->store('atlets/raport', 'public');
                }

                if ($request->hasFile("atlets.$index.akta_lahir")) {
                    if (!empty($existingAtlet->akta_lahir)) Storage::disk('public')->delete($existingAtlet->akta_lahir);
                    $updateData['akta_lahir'] = $request->file("atlets.$index.akta_lahir")->store('atlets/akta_lahir', 'public');
                }

                if ($request->hasFile("atlets.$index.sk")) {
                    if (!empty($existingAtlet->sk)) Storage::disk('public')->delete($existingAtlet->sk);
                    $updateData['sk'] = $request->file("atlets.$index.sk")->store('atlets/sk', 'public');
                }

                DB::table('atlet')->where('id', $atlet['id'])->update($updateData);
            }

            // 3. Update officials
            foreach ($request->officials ?? [] as $index => $official) {
                if (empty($official['id'])) {
                    continue; // skip jika ID official kosong
                }

                $existingOfficial = DB::table('officials')->where('id', $official['id'])->first();
                if (!$existingOfficial) {
                    continue; // skip jika data official tidak ditemukan
                }

                $updatedOfficial = [
                    'nama'       => $official['nama_lengkap'] ?? $existingOfficial->nama,
                    'jabatan_id' => $official['jabatan'] ?? $existingOfficial->jabatan_id,
                    'updated_at' => now(),
                ];

                if ($request->hasFile("officials.$index.foto")) {
                    if (!empty($existingOfficial->foto)) Storage::disk('public')->delete($existingOfficial->foto);
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
            ->leftJoin('event_registrations as er', function ($join) use ($request) {
                $join->on('er.kecamatan_id', '=', 'k.id')
                    ->where('er.event_id', '=', $request->input('event_id'));
            })
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

    public function prestasiByKecamatan($kecamatanId) {
        return view('web.prestasi-detail');
    }

    public function getEventCategory($eventId) {
        $evenCategoryId = DB::table('events')->where('id', $eventId)->value('event_category_id');
        return $evenCategoryId;
    }

    public function export(Request $request) {
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

        if ($request->filled('eventCategory')) {
            $query->where('events.event_category_id', $request->eventCategory);
        }

        if ($request->filled('tahun')) {
            $query->where('events.year', $request->tahun);
        }

        $data = $query->orderBy('sports.name')->get();

        $groupedData = $data->groupBy('cabang_olahraga');

        $pdf = Pdf::loadView('modules.event-registrations.export', compact('data', 'groupedData'))
                  ->setPaper('A4', 'landscape');

        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="Album Atlet ' . date('Y-m-d') . '.pdf"')
            ->header('X-Filename', 'Album Atlet ' . date('Y-m-d') . '.pdf');
    }
}
