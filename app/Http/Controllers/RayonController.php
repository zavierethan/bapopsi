<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RayonController extends Controller
{
    public function index() {
        return view('modules.rayon.index');
    }

    public function getLists(Request $request){
        $params = $request->all();

        $query = DB::table('rayon as r')
                ->join('rayon_kecamatan as rk', 'rk.rayon_id', '=', 'r.id')
                ->join('kecamatan as k', 'k.id', '=', 'rk.kecamatan_id')
                ->select(
                    'r.id',
                    'r.nama as nama_rayon',
                    'r.keterangan',
                    DB::raw("STRING_AGG(k.nama, ', ') as kecamatan")
                )
                ->groupBy('r.id', 'r.nama', 'r.keterangan');

        if (!empty($params['nama'])) {
            $query->where('r.nama', $params['nama']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('r.nama', 'like', '%' . strtoupper($searchValue) . '%');
            });
        }

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $totalRecords = $query->count();
        $filteredRecords = $query->count();
        $data = $query->orderBy('r.nama')->skip($start)->take($length)->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }

    public function create() {
        $kecamatan = DB::table('kecamatan')->orderBy('nama', 'asc')->get();
        return view('modules.rayon.create', compact('kecamatan'));
    }
}
