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

        $query =  DB::table('sub_rayon as sr')
            ->join('kecamatan as k', 'sr.kecamatan_id', '=', 'k.id')
            ->leftJoin('rayon_kecamatan as rk', 'rk.kecamatan_id', '=', 'k.id')
            ->leftJoin('rayon as r', 'rk.rayon_id', '=', 'r.id')
            ->select(
                'sr.id',
                'sr.nama as sub_rayon',
                'k.nama as kecamatan',
                'r.nama as rayon'
            );

        if (!empty($params['name'])) {
            $query->where('sub_rayon.nama', $params['name']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('sr.nama', 'like', '%' . strtoupper($searchValue) . '%');
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
        $data = $query->orderBy('sr.id', 'desc')->skip($start)->take($length)->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }

    public function create() {
        $rayon = DB::table('kecamatan')->orderBy('nama', 'asc')->get();
        return view('modules.sub-rayon.create', compact('rayon'));
    }

    public function save(Request $request) {
       $request->validate([
            'nama' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        $exists = DB::table('rayon_kecamatan')
            ->where('kecamatan_id', $request->kecamatan_id)
            ->exists();

        if (!$exists) {
            return response()->json([
                'status' => 'error',
                'message' => 'Kecamatan ini belum dimapping ke rayon. Harap mapping terlebih dahulu.'
            ], 422);
        }

        DB::table('sub_rayon')->insert([
            'nama' => $request->nama,
            'kecamatan_id' => $request->kecamatan_id
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Sub rayon berhasil disimpan.'
        ]);
    }

    public function edit($id) {
        $subrayon = DB::table('sub_rayon')->where('id', $id)->first();
        $kecamatan = DB::table('kecamatan')->get();

        return view('modules.sub-rayon.edit', compact('subrayon', 'kecamatan'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kecamatan_id' => 'required|exists:kecamatan,id',
        ]);

        $isMapped = DB::table('rayon_kecamatan')
            ->where('kecamatan_id', $request->kecamatan_id)
            ->exists();

        if (!$isMapped) {
            return response()->json([
                'success' => false,
                'message' => 'Kecamatan ini belum dimapping ke rayon. Harap mapping terlebih dahulu.'
            ], 422);
        }

        DB::table('sub_rayon')
            ->where('id', $id)
            ->update([
                'nama' => $request->nama,
                'kecamatan_id' => $request->kecamatan_id,
            ]);

        return response()->json([
            'success' => true,
            'message' => 'Data berhasil diperbarui.'
        ]);
    }

    public function getSubRayonByKec($kecId) {
        $data = DB::table('sub_rayon')->where('kecamatan_id', $kecId)->get();

        return response()->json(['data' => $data], 200);
    }

}
