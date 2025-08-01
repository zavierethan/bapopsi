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
                'sports.name as cabor',
                'sport_classes.name as nomor_pertandingan',
                'events.name as event_name',
                'events.status as event_status',
                DB::raw("CASE
                    WHEN jadwal_pertandingan.status = '0' THEN 'Belum dimulai'
                    WHEN jadwal_pertandingan.status = '1' THEN 'Sedang Berlangsung'
                    WHEN jadwal_pertandingan.status = '2' THEN 'Selesai'
                END as status_pertandingan"),
                DB::raw("TO_CHAR(jadwal_pertandingan.tanggal, 'DD/MM/YYYY') AS date")
            )
            ->leftJoin('events', 'events.id', '=', 'jadwal_pertandingan.event_id')
            ->leftJoin('sports', 'sports.id', '=', 'jadwal_pertandingan.cabor_id')
            ->leftJoin('sport_classes', 'sport_classes.id', '=', 'jadwal_pertandingan.nomor_pertandingan');

        // Clone for total count
        $totalRecords = (clone $baseQuery)->count();

        // Apply filters
        if (!empty($request->query('eventStatus'))) {
            $baseQuery->where('events.status', $request->query('eventStatus'));
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
            ->orderBy('jadwal_pertandingan.id', 'desc')
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
        return view('modules.jadwal-pertandingan.create', [
            'events' => DB::table('events')->get(),
            'cabangOlahraga' => DB::table('sports')->get(),
            'kelasOlahraga' => DB::table('sport_classes')->where('sport_id')->get()
        ]);
    }

    public function save(Request $request) {

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'category'    => 'required|exists:event_categories,id',
            'location'    => 'required|string',
        ]);

        $event = DB::table('events')->insert([
            'name'              => $request->name,
            'description'       => $request->description,
            'start_date'        => $request->start_date,
            'end_date'          => $request->end_date,
            'event_category_id' => $request->category,
            'location'          => $request->location,
            'created_at'        => now(),
        ]);

        return response()->json([
            'message' => 'Event berhasil disimpan',
            'data'    => $event
        ]);
    }

    public function edit($id){
        $event = DB::table('events')->where('id', $id)->first();
        $categories = DB::table('event_categories')->get();

        return view('modules.jadwal-pertandingan.edit', compact('event', 'categories'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'category'    => 'required|exists:event_categories,id',
            'location'    => 'required|string',
        ]);

        $agenda = DB::table('events')->where('id', $id)->first();

        if (!$agenda) {
            return response()->json(['message' => 'Events tidak ditemukan'], 404);
        }

        DB::table('events')->where('id', $id)->update([
            'name'              => $request->name,
            'description'       => $request->description,
            'start_date'        => $request->start_date,
            'end_date'          => $request->end_date,
            'event_category_id' => $request->category,
            'location'          => $request->location,
            'updated_at'        => now(),
        ]);

        $updated = DB::table('events')->where('id', $id)->first();

        return response()->json([
            'message' => 'Events berhasil diperbarui',
            'data'    => $updated,
        ]);
    }

    public function delete($id) {
        $event = DB::table('events')->where('id', $id)->first();

        if (!$event) {
            return response()->json([
                'message' => 'Events tidak ditemukan',
            ], 404);
        }

        DB::table('events')->where('id', $id)->delete();

        return response()->json([
            'message' => 'Events berhasil dihapus',
        ]);
    }
}
