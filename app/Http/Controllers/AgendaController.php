<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AgendaController extends Controller
{
    public function index() {
        return view('modules.posts.agendas.index');
    }

    public function getLists(Request $request) {

        $searchValue = $request->input('search.value');
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $query = DB::table('agendas')
            ->select(
                'agendas.*',
                DB::raw("TO_CHAR(agendas.agenda_date, 'DD/MM/YYYY') AS agenda_date")
            );

        $totalRecords = $query->count();

        if (!empty($searchValue)) {
            $query->where('agendas.title', 'like', '%' . $searchValue . '%');
        }

        $filteredRecords = $query->count();

        $data = $query->orderBy('agendas.id', 'desc')
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
        return view('modules.posts.agendas.create');
    }

    public function save(Request $request) {

        $validated = $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'agenda_date' => 'required|date',
            'location'    => 'required|string|max:255',
        ]);

        $agenda = DB::table('agendas')->insert([
            'title'        => $request->title,
            'description'  => $request->description,
            'agenda_date'  => $request->agenda_date,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'location'     => $request->location,
            'created_at'   => now(),
        ]);

        return response()->json([
            'message' => 'Agenda berhasil disimpan',
            'data'    => $agenda
        ]);
    }

    public function edit($id){
        $agenda = DB::table('agendas')->where('id', $id)->first();

        return view('modules.posts.agendas.edit', compact('agenda'));
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

        $agenda = DB::table('agendas')->where('id', $id)->first();

        if (!$agenda) {
            return response()->json(['message' => 'Agenda tidak ditemukan'], 404);
        }

        DB::table('agendas')->where('id', $id)->update([
            'title'        => $request->title,
            'description'  => $request->description,
            'agenda_date'  => $request->agenda_date,
            'start_time'   => $request->start_time,
            'end_time'     => $request->end_time,
            'location'     => $request->location,
            'updated_at'   => now(),
        ]);

        $updated = DB::table('agendas')->where('id', $id)->first();

        return response()->json([
            'message' => 'Agenda berhasil diperbarui',
            'data'    => $updated,
        ]);
    }

    public function delete($id) {
        $galery = DB::table('agendas')->where('id', $id)->first();

        if (!$galery) {
            return response()->json([
                'message' => 'Agenda tidak ditemukan',
            ], 404);
        }

        DB::table('agendas')->where('id', $id)->delete();

        return response()->json([
            'message' => 'Agenda berhasil dihapus',
        ]);
    }
}
