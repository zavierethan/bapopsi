<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EventController extends Controller
{
    public function index() {
        return view('modules.events.index');
    }

    public function getLists(Request $request) {

        $searchValue = $request->input('search.value');
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $query = DB::table('events')
            ->select(
                'events.*',
                DB::raw("TO_CHAR(events.start_date, 'DD/MM/YYYY') AS start_date"),
                DB::raw("TO_CHAR(events.end_date, 'DD/MM/YYYY') AS end_date")
            );

        $totalRecords = $query->count();

        if (!empty($searchValue)) {
            $query->where('events.name', 'like', '%' . $searchValue . '%');
        }

        $filteredRecords = $query->count();

        $data = $query->orderBy('events.id', 'desc')
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
        return view('modules.events.create');
    }

    public function save(Request $request) {

        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'location'    => 'required|string',
        ]);

        $event = DB::table('events')->insert([
            'name'        => $request->name,
            'description' => $request->description,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'location'    => $request->location,
            'created_at'  => now(),
        ]);

        return response()->json([
            'message' => 'Event berhasil disimpan',
            'data'    => $event
        ]);
    }

    public function edit($id){
        $event = DB::table('events')->where('id', $id)->first();

        return view('modules.events.edit', compact('event'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'required|string',
            'start_date'  => 'required|date',
            'end_date'    => 'required|date',
            'location'    => 'required|string',
        ]);

        $agenda = DB::table('events')->where('id', $id)->first();

        if (!$agenda) {
            return response()->json(['message' => 'Events tidak ditemukan'], 404);
        }

        DB::table('events')->where('id', $id)->update([
            'name'        => $request->name,
            'description' => $request->description,
            'start_date'  => $request->start_date,
            'end_date'    => $request->end_date,
            'location'    => $request->location,
            'updated_at'  => now(),
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
