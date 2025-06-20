<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class AthleteController extends Controller
{
    public function index() {
        return view('modules.athletes.index');
    }

    public function getLists(Request $request){
        $params = $request->all();

        $query = DB::table('registration_requests');

        if (!empty($params['nama_lengkap'])) {
            $query->where('registration_requests.nama_lengkap', $params['name']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('registration_requests.nama_lengkap', 'like', '%' . strtoupper($searchValue) . '%');
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
}
