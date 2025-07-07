<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;

class OfficialController extends Controller
{
    public function index() {
        return view('modules.officials.index');
    }

    public function getLists(Request $request) {

        $searchValue = $request->input('search.value');
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $query = DB::table('officials')
            ->select(
                'officials.*',
                'jabatan_official.nama_jabatan',

                // Status approval
                DB::raw("CASE
                    WHEN officials.appr_status IS NULL THEN 'Waiting Approval'
                    WHEN officials.appr_status = 1 THEN 'Approved'
                    WHEN officials.appr_status = 0 THEN 'Rejected'
                END as approval_status"),

                // Format tanggal approval
                DB::raw("TO_CHAR(officials.appr_date, 'DD/MM/YYYY HH24:MI:SS') AS approval_date"),

                // Join tambahan
                'event_registrations.kecamatan_id',
                'event_registrations.sport_id',
                'event_registrations.sub_rayon_id',
                'sports.name as cabang_olahraga',
                'kecamatan.nama as nama_kecamatan',
                'sub_rayon.nama as nama_sub_rayon'
            )
            ->leftJoin('jabatan_official', 'jabatan_official.id', '=', 'officials.jabatan_id')
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'officials.event_reg_id')
            ->leftJoin('sports', 'sports.id', '=', 'event_registrations.sport_id')
            ->leftJoin('kecamatan', 'kecamatan.id', '=', 'event_registrations.kecamatan_id')
            ->leftJoin('sub_rayon', 'sub_rayon.id', '=', 'event_registrations.sub_rayon_id');

        $totalRecords = $query->count();

        if (!empty($searchValue)) {
            $query->where('officials.nama', 'like', '%' . $searchValue . '%');
        }

        $user = Auth::user();

        if (!in_array($user->group_id, [1, 14])) {
            $query->where('officials.created_by', $user->id);
        }

        $filteredRecords = $query->count();

        $data = $query->orderBy('officials.id', 'desc')
                    ->skip($start)
                    ->take($length)
                    ->get();

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);
    }


    public function create() {
        return view('modules.officials.create');
    }

    public function save(Request $request) {

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'agenda_date' => 'required|date',
            'location'    => 'required|string|max:255',
        ]);

        $agenda = DB::table('officials')->insert([
            'title'        => $request->title,
            'description'  => $request->description,
            'agenda_date'  => $request->agenda_date,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'location'     => $request->location,
            'created_at'   => now(),
        ]);

        return response()->json([
            'message' => 'Official berhasil disimpan',
            'data'    => $agenda
        ]);
    }

    public function edit($id){
        $official = DB::table('officials')->where('id', $id)->first();

        return view('modules.officials.edit', compact('official'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'agenda_date' => 'required|date',
            'start_time'  => 'nullable|date_format:H:i',
            'end_time'    => 'nullable|date_format:H:i|after_or_equal:start_time',
            'location'    => 'required|string|max:255',
        ]);

        $agenda = DB::table('officials')->where('id', $id)->first();

        if (!$agenda) {
            return response()->json(['message' => 'Official tidak ditemukan'], 404);
        }

        DB::table('officials')->where('id', $id)->update([
            'title'        => $request->title,
            'description'  => $request->description,
            'agenda_date'  => $request->agenda_date,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'location'     => $request->location,
            'updated_at'   => now(),
        ]);

        $updated = DB::table('officials')->where('id', $id)->first();

        return response()->json([
            'message' => 'Official berhasil diperbarui',
            'data'    => $updated,
        ]);
    }

    public function approve($id) {
        DB::table('officials')->where('id', $id)->update([
            'appr_status' => 1,
            'appr_date' => now(),
        ]);

        return response()->json(['success' => true]);
    }

    public function reject($id, Request $request) {
        DB::table('officials')->where('id', $id)->update([
            "appr_status" => 0,
            "appr_notes"  => $request->reason,
            "appr_date"   => now()
        ]);

        return response()->json(['success' => true]);
    }

    public function showIdCard($id) {
        $official = DB::table('officials')
            ->select(
                'officials.*',
                'jabatan_official.nama_jabatan',
                'event_registrations.kecamatan_id',
                'event_registrations.sport_id',
                'event_registrations.sub_rayon_id',
                'sports.name as cabang_olahraga',
                'kecamatan.nama as nama_kecamatan',
                'sub_rayon.nama as nama_sub_rayon'
            )
            ->leftJoin('jabatan_official', 'jabatan_official.id', '=', 'officials.jabatan_id')
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'officials.event_reg_id')
            ->leftJoin('sports', 'sports.id', '=', 'event_registrations.sport_id')
            ->leftJoin('kecamatan', 'kecamatan.id', '=', 'event_registrations.kecamatan_id')
            ->leftJoin('sub_rayon', 'sub_rayon.id', '=', 'event_registrations.sub_rayon_id')
            ->where('officials.id', $id)
            ->first();

        if (!$official) {
            abort(404);
        }

        $approvalStatus = $official->appr_status == 1 ? "Verified" : "Not Verified";
        $qrUrl = $approvalStatus;

        return view('modules.officials.idcard', compact('official', 'qrUrl'));
    }

    public function delete($id) {

    }
}
