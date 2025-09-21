<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class JadwalPertandinganController extends Controller
{
    public function index() {
        return view('modules.jadwal-pertandingan.index');
    }

    public function getLists(Request $request){
        $searchValue = $request->input('search.value');
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $baseQuery = DB::table('jadwal_pertandingan')
            ->select(
                'jadwal_pertandingan.*',
                'events.name as event_name',
                'sports.name as cabor',
                'sport_classes.name as nomor_pertandingan',
                'events.status as event_status',
                DB::raw("CASE
                    WHEN jadwal_pertandingan.status = '0' THEN 'Belum dimulai'
                    WHEN jadwal_pertandingan.status = '1' THEN 'Sedang Berlangsung'
                    WHEN jadwal_pertandingan.status = '2' THEN 'Selesai'
                END as status_pertandingan"),
                DB::raw("TO_CHAR(jadwal_pertandingan.tanggal, 'DD/MM/YYYY') AS date")
            )
            ->leftJoin('events', 'events.id', '=', 'jadwal_pertandingan.event_id')
            ->leftJoin('event_categories', 'event_categories.id', '=', 'events.event_category_id')
            ->leftJoin('sports', 'sports.id', '=', 'jadwal_pertandingan.cabor_id')
            ->leftJoin('sport_classes', 'sport_classes.id', '=', 'jadwal_pertandingan.nomor_pertandingan');

        // Clone for total count
        $totalRecords = (clone $baseQuery)->count();

        // Apply filters
        if (!empty($request->query('eventStatus'))) {
            $baseQuery->where('events.status', $request->query('eventStatus'));
        }

        // Apply filters
        if (!empty($request->query('caborId'))) {
            $baseQuery->where('sports.id', $request->query('caborId'));
        }

        // Apply filters
        if (!empty($request->query('eventId'))) {
            $baseQuery->where('events.event_category_id', $request->query('eventId'));
        }

        if (!empty($searchValue)) {
            $baseQuery->where(function($q) use ($searchValue) {
                $q->where('events.name', 'like', '%' . $searchValue . '%')
                ->orWhere('sports.name', 'like', '%' . $searchValue . '%')
                ->orWhere('sport_classes.name', 'like', '%' . $searchValue . '%');
            });
        }

        // Clone again for filtered count
        $filteredRecords = (clone $baseQuery)->count();

        // Pagination & ordering
        $data = $baseQuery
            ->orderBy('jadwal_pertandingan.tanggal', 'desc')
            ->skip($start)
            ->take($length)
            ->get();

        // Return datatables JSON format
        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);
    }

    public function create() {

        $kelasOlahraga = DB::table('sport_classes')
            ->select('sport_classes.*', 'sports.name as sport_name')
            ->join('sports', 'sports.id', '=', 'sport_classes.sport_id')
            ->get();

        return view('modules.jadwal-pertandingan.create', [
            'events' => DB::table('events')->where('status', 1)->get(),
            'cabangOlahraga' => DB::table('sports')->get(),
            'kelasOlahraga' => $kelasOlahraga
        ]);
    }

    public function save(Request $request) {

        $caborId = DB::table('sport_classes')->where('id', $request->nomor_pertandingan)->value('sport_id');

        $event = DB::table('jadwal_pertandingan')->insert([
            'event_id'           => $request->event_id,
            'tanggal'            => $request->tanggal,
            'tempat'             => $request->tempat,
            'cabor_id'           => $caborId,
            'nomor_pertandingan' => $request->nomor_pertandingan,
            'kategori'           => $request->kategori,
            'status'             => $request->status,
            'created_at'         => now(),
        ]);

        return response()->json([
            'message' => 'Jadwal Pertandingan berhasil disimpan',
            'data'    => $event
        ]);
    }

    public function edit($id){
        $jadwal = DB::table('jadwal_pertandingan')->where('id', $id)->first();
        $kelasOlahraga = DB::table('sport_classes')
            ->select('sport_classes.*', 'sports.name as sport_name')
            ->join('sports', 'sports.id', '=', 'sport_classes.sport_id')
            ->get();
        $events = DB::table('events')->where('status', 1)->get();
        $cabangOlahraga = DB::table('sports')->get();

        return view('modules.jadwal-pertandingan.edit', compact('jadwal', 'kelasOlahraga', 'events', 'cabangOlahraga'));
    }

    public function update(Request $request, $id) {

        $updated = DB::table('jadwal_pertandingan')->where('id', $id)->update([
            'event_id'           => $request->name,
            'tanggal'            => $request->description,
            'tempat'             => $request->location,
            'cabor_id'           => $request->start_date,
            'nomor_pertandingan' => $request->end_date,
            'kategori'           => $request->category,
            'status'             => $request->location,
            'updated_at'         => now(),
        ]);

        return response()->json([
            'message' => 'Jadwal Pertandingan berhasil diperbarui',
            'data'    => $updated,
        ]);
    }

    public function delete($id) {

        DB::table('jadwal_pertandingan')->where('id', $id)->delete();

        return response()->json([
            'message' => 'Jadwal Pertandingan berhasil dihapus',
        ]);
    }
}
