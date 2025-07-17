<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{

    public function index()
    {
        $kecamatan = DB::table('kecamatan')->orderBy('id')->get();
        $sports = DB::table('sports')->orderBy('id')->get();
        $events = DB::table('events')->orderBy('id')->get();
        return view('home', compact('kecamatan', 'sports', 'events'));
    }

    public function getLists(Request $request) {
        $params = $request->all();

        $query = DB::table('atlet')
            ->select(
                'atlet.*',
                'sports.name as cabang_olahraga',
                'sport_classes.name as nomor_cabang_olahraga',
                'medals.medal_type'
            )
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'atlet.event_reg_id')
            ->leftJoin('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id')
            ->leftJoin('sport_classes', 'sport_classes.id', '=', 'atlet.kelas_id')
            ->leftJoin('medals', 'medals.atlet_id', '=', 'atlet.id');

        if (!empty($params['event_id'])) {
            $query->where('event_registrations.event_id', $params['event_id']);
        }

        if (!empty($params['sport_id'])) {
            $query->where('atlet.cabang_olahraga_id', $params['sport_id']);
        }

        if (!empty($params['medal_type'])) {
            $query->where('medals.medal_type', $params['medal_type']);
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

    public function getSummary(Request $request) {
        $query = DB::table('atlet')
            ->select(
                'atlet.*',
                'sports.name as cabang_olahraga',
                'medals.medal_type'
            )
            ->leftJoin('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id')
            ->leftJoin('medals', 'medals.atlet_id', '=', 'atlet.id')
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'atlet.event_reg_id');

        // Filter by kecamatan (from event_registrations)
        if ($request->filled('event_id')) {
            $query->where('event_registrations.event_id', $request->event_id);
        }

        // Filter lainnya
        if ($request->filled('sport_id')) {
           $query->where('atlet.cabang_olahraga_id', $request->sport_id);
        }

        if ($request->filled('medal_type')) {
            $query->where('medals.medal_type', $request->medal_type);
        }

        // Clone query to prevent side effects
        $totalAtlet = (clone $query)->distinct('atlet.id')->count('atlet.id');
        $totalMedali = (clone $query)->whereNotNull('medals.id')->count('medals.id');
        $totalCabangOlahraga = (clone $query)->distinct('sports.id')->count('sports.id');

        return response()->json([
            'success' => true,
            'data' => [
                'total_atlet' => $totalAtlet,
                'total_medali' => $totalMedali,
                'total_cabang_olahraga' => $totalCabangOlahraga
            ]
        ]);
    }
}
