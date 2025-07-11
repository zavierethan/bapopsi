<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }

    public function getLists(Request $request) {
        $params = $request->all();

        $query = DB::table('atlet')
            ->select(
                'atlet.*',
                'sports.name as cabang_olahraga',
                'medals.medal_type',
            )
            ->leftJoin('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id')
            ->leftJoin('medals', 'medals.atlet_id', '=', 'atlet.id');

        if (!empty($params['nama_lengkap'])) {
            $query->where('atlet.nama_lengkap', $params['nama_lengkap']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('atlet.nama_lengkap', 'like', '%' . strtoupper($searchValue) . '%');
            });
        }

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $totalRecords = $query->count();
        $filteredRecords = $query->count();
        $data = $query->orderBy('atlet.id', 'desc')->skip($start)->take($length)->get();

        return response()->json([
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ]);
    }

    public function getSummary() {
        $summary = DB::table('atlet')
        ->selectRaw('
            (SELECT COUNT(*) FROM atlet) as total_atlet,
            (SELECT COUNT(*) FROM medals) as total_medali,
            (SELECT COUNT(*) FROM sports) as total_cabang_olahraga
        ')
        ->first();

        return response()->json([
            'success' => true,
            'data' => $summary
        ]);
    }
}
