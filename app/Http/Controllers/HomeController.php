<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use DB;
use Auth;

class HomeController extends Controller
{

    public function index()
    {
        $kecamatan = DB::table('kecamatan')->orderBy('id')->get();
        $sports = DB::table('sports')->orderBy('id')->get();
        $events = DB::table('events')->where('events.event_category_id', 1)->get();

        $user = Auth::user();

        if($user->group_id == 14) {
            return view('modules.dashboards.admin', compact('kecamatan', 'sports', 'events'));
        }
        if($user->group_id == 15) {
            return view('modules.dashboards.manager', compact('kecamatan', 'sports', 'events'));
        }
        if ($user->group_id == 16) {
            return view('modules.dashboards.sport-admin', compact('kecamatan', 'sports', 'events'));
        }

        return view('modules.dashboards.superadmin', compact('kecamatan', 'sports', 'events'));
    }

    public function getLists(Request $request) {
        $params = $request->all();

        $query = DB::table('atlet')
            ->select(
                'atlet.*',
                'sports.name as cabang_olahraga',
                'sport_classes.name as nomor_cabang_olahraga',
                'medals.medal_type',
                DB::raw("CASE
                    WHEN atlet.perolehan_medali IS NULL THEN '-'
                    WHEN atlet.perolehan_medali = 1 THEN 'Emas (1)'
                    WHEN atlet.perolehan_medali = 2 THEN 'Perak (2)'
                    WHEN atlet.perolehan_medali = 3 THEN 'Perunggu (3)'
                END as perolehan_medali"),
            )
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'atlet.event_reg_id')
            ->leftJoin('events', 'events.id', '=', 'event_registrations.event_id')
            ->leftJoin('event_categories', 'event_categories.id', '=', 'events.event_category_id')
            ->leftJoin('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id')
            ->leftJoin('sport_classes', 'sport_classes.id', '=', 'atlet.kelas_id')
            ->leftJoin('medals', 'medals.atlet_id', '=', 'atlet.id')
            ->where('atlet.appr_status', 1);

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
        $data = $query->orderBy('sports.name', 'ASC')->orderBy('atlet.perolehan_medali', 'ASC')->skip($start)->take($length)->get();

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
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'atlet.event_reg_id')
            ->leftJoin('events', 'events.id', '=', 'event_registrations.event_id')
            ->leftJoin('event_categories', 'event_categories.id', '=', 'events.event_category_id')
            ->where('atlet.appr_status', 1);


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

    public function export(Request $request) {
        $query = DB::table('atlet')
            ->select(
                'atlet.nama_lengkap',
                'atlet.jenis_kelamin',
                DB::raw("CASE
                    WHEN atlet.perolehan_medali IS NULL THEN '-'
                    WHEN atlet.perolehan_medali = 1 THEN 'Emas'
                    WHEN atlet.perolehan_medali = 2 THEN 'Perak'
                    WHEN atlet.perolehan_medali = 3 THEN 'Perunggu'
                END as perolehan_medali"),
                'events.name as nama_event',
                DB::raw("TO_CHAR(atlet.tanggal_lahir, 'DD/MM/YYYY') AS tanggal_lahir"),
                'sports.name as cabang_olahraga',
                'sport_classes.name as kelas_olahraga',
                'event_registrations.jenjang',
                'kecamatan.nama as nama_kecamatan',
                'sub_rayon.nama as nama_sub_rayon',
            )
            ->leftJoin('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id')
            ->leftJoin('event_registrations', 'event_registrations.id', '=', 'atlet.event_reg_id')
            ->leftJoin('sport_classes', 'sport_classes.id', '=', 'event_registrations.sport_class_id')
            ->leftJoin('events', 'events.id', '=', 'event_registrations.event_id')
            ->leftJoin('kecamatan', 'kecamatan.id', '=', 'event_registrations.kecamatan_id')
            ->leftJoin('sub_rayon', 'sub_rayon.id', '=', 'event_registrations.sub_rayon_id')
            ->where('atlet.appr_status', 1);

        if ($request->filled('event')) {
            $query->where('events.id', $request->event);
        }

        if ($request->filled('cabor')) {
            $query->where('atlet.cabang_olahraga_id', $request->cabor);
        }

        $data = $query->orderBy('atlet.nama_lengkap', 'asc')->get();

        $pdf = Pdf::loadView('modules.dashboards.export', compact('data'))
                  ->setPaper('A4', 'portrait');

        return response($pdf->output(), 200)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="Perolehan Medali Atlet ' . date('Y-m-d') . '.pdf"')
            ->header('X-Filename', 'Perolehan Medali Atlet ' . date('Y-m-d') . '.pdf');
    }
}
