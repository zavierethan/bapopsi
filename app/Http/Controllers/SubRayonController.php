<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SubRayonController extends Controller
{
    public function index() {
        return view('modules.sub-rayon.index');
    }

    public function getLists(Request $request){
        $params = $request->all();

        $query = DB::table('sub_rayon')
            ->select('sub_rayon.*', 'kecamatan.nama as nama_kecamatan')
            ->join('kecamatan', 'kecamatan.id', '=', 'sub_rayon.kecamatan_id');

        if (!empty($params['name'])) {
            $query->where('sub_rayon.nama', $params['name']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('sub_rayon.nama', 'like', '%' . strtoupper($searchValue) . '%');
            });
        }

        if ($request->has('order') && $request->order) {
            $columnIndex = $request->order[0]['column'];
            $sortDirection = $request->order[0]['dir'];
            $columnName = $request->columns[$columnIndex]['data'];

            $query->orderBy($columnName, $sortDirection);
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
        $kecamatan = DB::table('kecamatan')->orderBy('nama', 'asc')->get();
        return view('modules.sub-rayon.create', compact('kecamatan'));
    }

    public function save(Request $request) {
       $request->validate([
            'kecamatan_id' => 'required|integer|exists:kecamatan,id',
            'nama' => 'required|string|max:255',
        ]);

        DB::beginTransaction();

        try {
            DB::table('sub_rayon')->insert([
                'kecamatan_id' => $request->kecamatan_id,
                'nama' => $request->nama
            ]);

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
        }
    }

    public function edit($id) {
        $sport = DB::table('sub_rayon')->where('id', $id)->first();
        return view('modules.sub-rayon.edit', compact('sport'));
    }

    public function update(Request $request) {
        DB::table('sports')->where('id', $request->id)->update([
            "code" => $request->code,
            "nama" => $request->name,
            "kecamatan_id" => $request->kecamatan_id
        ]);

        return redirect()->route('sub-rayon.index');
    }

    public function getSubRayonByKec($kecId) {
        $data = DB::table('sub_rayon')->where('kecamatan_id', $kecId)->get();

        return response()->json(['data' => $data], 200);
    }
}
