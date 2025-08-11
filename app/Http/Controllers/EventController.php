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
                'event_categories.name as event_category',
                DB::raw("TO_CHAR(events.start_date, 'DD/MM/YYYY') AS start_date"),
                DB::raw("TO_CHAR(events.end_date, 'DD/MM/YYYY') AS end_date"),
                DB::raw("TO_CHAR(events.open_reg_date, 'DD/MM/YYYY') AS open_reg_date"),
                DB::raw("TO_CHAR(events.close_reg_date, 'DD/MM/YYYY') AS close_reg_date"),
                DB::raw("CASE
                    WHEN CURRENT_DATE < events.close_reg_date THEN 'Open'
                    ELSE 'Closed'
                END AS status")
            )
            ->leftJoin('event_categories', 'event_categories.id', '=', 'events.event_category_id');

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
        $categories = DB::table('event_categories')->get();
        return view('modules.events.create', compact('categories'));
    }

    public function save(Request $request) {

        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date',
            'category'      => 'required|exists:event_categories,id',
            'location'      => 'required|string',
            'year'          => 'required',
            'open_reg_date' => 'required|date',
            'close_reg_date'=> 'required|date',
        ]);

        $event = DB::table('events')->insert([
            'name'              => $request->name,
            'description'       => $request->description,
            'start_date'        => $request->start_date,
            'end_date'          => $request->end_date,
            'open_reg_date'     => $request->open_reg_date,
            'close_reg_date'    => $request->close_reg_date,
            'year'              => $request->year,
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

        return view('modules.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([
            'name'          => 'required|string|max:255',
            'description'   => 'required|string',
            'start_date'    => 'required|date',
            'end_date'      => 'required|date',
            'category'      => 'required|exists:event_categories,id',
            'location'      => 'required|string',
            'open_reg_date' => 'required|date',
            'close_reg_date'=> 'required|date',
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
            'year'              => $request->year,
            'open_reg_date'     => $request->open_reg_date,
            'close_reg_date'    => $request->close_reg_date,
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
