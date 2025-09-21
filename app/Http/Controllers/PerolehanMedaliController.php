<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PerolehanMedaliController extends Controller
{
    public function index() {
        $cabangOlahraga = DB::table('sports')->get();
        $eventCategories = DB::table('event_categories')->get();
        $kecamatan = DB::table('kecamatan')->orderBy('nama')->get();
        $subRayon = DB::table('sub_rayon')->orderBy('nama')->get();
        return view('modules.perolehan-medali.index', compact('cabangOlahraga', 'eventCategories', 'kecamatan', 'subRayon'));
    }

    public function getLists(Request $request){
        $params = $request->all();

        $query = DB::table('atlet')
            ->select(
                'atlet.*',
                'events.name as nama_event',
                DB::raw("TO_CHAR(atlet.tanggal_lahir, 'DD/MM/YYYY') AS tanggal_lahir"),
                DB::raw("CASE
                    WHEN atlet.appr_status IS NULL THEN 'Waiting Approval'
                    WHEN atlet.appr_status = 1 THEN 'Approved'
                    WHEN atlet.appr_status = 0 THEN 'Rejected'
                END as approval_status"),
                DB::raw("CASE
                    WHEN atlet.perolehan_medali IS NULL THEN '-'
                    WHEN atlet.perolehan_medali = 1 THEN 'Emas (1)'
                    WHEN atlet.perolehan_medali = 2 THEN 'Perak (2)'
                    WHEN atlet.perolehan_medali = 3 THEN 'Perunggu (3)'
                END as perolehan_medaliiiii"),
                DB::raw("TO_CHAR(atlet.appr_date, 'DD/MM/YYYY HH24:MI:SS') AS approval_date"),
                'atlet.appr_notes',
                'sports.name as cabang_olahraga',
                'event_registrations.kecamatan_id',
                'event_registrations.sub_rayon_id',
                'kecamatan.nama as nama_kecamatan',
                'sub_rayon.nama as nama_sub_rayon'
            )
            ->leftJoin('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id')
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'atlet.event_reg_id')
            ->leftJoin('events', 'events.id', '=', 'event_registrations.event_id')
            ->leftJoin('kecamatan', 'kecamatan.id', '=', 'event_registrations.kecamatan_id')
            ->leftJoin('sub_rayon', 'sub_rayon.id', '=', 'event_registrations.sub_rayon_id');

        if (!empty($params['eventCategory']) && $params['eventCategory'] !== ' ') {
            $query->where('events.event_category_id', $params['eventCategory']);
        }

        if (!empty($params['cabangOlahraga']) && $params['cabangOlahraga'] !== ' ') {
            $query->where('atlet.cabang_olahraga_id', $params['cabangOlahraga']);
        }

        // $searchValue = $request->input('search.value');
        // if (!empty($searchValue)) {
        //     $query->where(function ($q) use ($searchValue) {
        //         $q->where('atlet.nama_lengkap', 'like', '%' . strtoupper($searchValue) . '%');
        //     });
        // }

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

    public function create() {
        $cabangOlahraga = DB::table('sports')->get();
        $events = DB::table('events')->get();
        return view('modules.perolehan-medali.create', compact('cabangOlahraga', 'events'));
    }

    public function create2() {
        return view('modules.perolehan-medali.create2');
    }

    public function save(Request $request) {

    }

    public function edit($id) {

    }

    public function update(Request $request, $id) {

    }

    public function export(Request $request) {
        $query = DB::table('atlet')
            ->select(
                'atlet.*',
                'events.name as nama_event',
                DB::raw("TO_CHAR(atlet.tanggal_lahir, 'DD/MM/YYYY') AS tanggal_lahir"),
                DB::raw("CASE
                    WHEN atlet.appr_status IS NULL THEN 'Waiting Approval'
                    WHEN atlet.appr_status = 1 THEN 'Approved'
                    WHEN atlet.appr_status = 0 THEN 'Rejected'
                END as approval_status"),
                DB::raw("TO_CHAR(atlet.appr_date, 'DD/MM/YYYY HH24:MI:SS') AS approval_date"),
                'atlet.appr_notes',
                'sports.name as cabang_olahraga',
                'event_registrations.jenjang',
                'event_registrations.kecamatan_id',
                'event_registrations.sub_rayon_id',
                'kecamatan.nama as nama_kecamatan',
                'sub_rayon.nama as nama_sub_rayon',
            )
            ->leftJoin('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id')
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'atlet.event_reg_id')
            ->leftJoin('events', 'events.id', '=', 'event_registrations.event_id')
            ->leftJoin('kecamatan', 'kecamatan.id', '=', 'event_registrations.kecamatan_id')
            ->leftJoin('sub_rayon', 'sub_rayon.id', '=', 'event_registrations.sub_rayon_id');

        if ($request->filled('eventCategory')) {
            $query->where('events.event_category_id', $request->eventCategory);
        }

        if ($request->filled('tahun')) {
            $query->where('events.year', $request->tahun);
        }

        $data = $query->orderBy('sports.name')->get();

        $groupedData = $data->groupBy('cabang_olahraga');

        $pdf = Pdf::loadView('modules.event-registrations.export', compact('data', 'groupedData'))
                  ->setPaper('A4', 'landscape');

        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="Album Atlet ' . date('Y-m-d') . '.pdf"')
            ->header('X-Filename', 'Album Atlet ' . date('Y-m-d') . '.pdf');
    }
}
