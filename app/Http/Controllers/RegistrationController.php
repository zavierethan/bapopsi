<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RegistrationController extends Controller
{
    public function index() {
        return view('modules.registration.index');
    }

    public function getLists(Request $request){
        $params = $request->all();

        $query = DB::table('registration_requests')
            ->select(
            'registration_requests.*',
            DB::raw("TO_CHAR(registration_requests.approval_date, 'DD-MM-YYYY HH24:MI:SS') AS approval_date_formatted"),
            DB::raw("TO_CHAR(registration_requests.created_at, 'DD-MM-YYYY HH24:MI:SS') AS created_at_formatted"),
            'kecamatan.nama as nama_kecamatan',
            'sub_rayon.nama as sub_rayon',
            DB::raw("CASE
                        WHEN registration_requests.approval_status IS NULL THEN 'Waiting Approval'
                        WHEN registration_requests.approval_status = 1 THEN 'Approved'
                        WHEN registration_requests.approval_status = 0 THEN 'Rejected'
                    END as approval_status")
            )
            ->leftJoin('kecamatan', 'kecamatan.id', '=', 'registration_requests.kecamatan_id')
            ->leftJoin('sub_rayon', 'sub_rayon.id', '=', 'registration_requests.sub_rayon_id');

        if (!empty($params['nama_lengkap'])) {
            $query->where('registration_requests.nama_lengkap', $params['name']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('registration_requests.nama_lengkap', 'like', '%' . strtoupper($searchValue) . '%');
            });
        }

        // if ($request->has('order') && $request->order) {
        //     $columnIndex = $request->order[0]['column'];
        //     $sortDirection = $request->order[0]['dir'];
        //     $columnName = $request->columns[$columnIndex]['data'];

        //     $query->orderBy($columnName, $sortDirection);
        // }

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

    public function approve($id) {
        DB::beginTransaction();

        try {
            $registration = DB::table('registration_requests')->where('id', $id)->first();

            if (!$registration) {
                return response()->json(['success' => false, 'message' => 'Registration not found.'], 404);
            }

            DB::table('users')->insert([
                'name' => $registration->username,
                'email' => $registration->email,
                'password' => $registration->password_hash,
                'group_id' => 15,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::table('registration_requests')->where('id', $id)->update([
                'approval_status' => 1,
                'approval_date' => now(),
            ]);

            DB::commit();

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Approval failed.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function reject($id) {
        DB::table('registration_requests')->where('id', $id)->update([
            "approval_status" => 0,
            "approval_date" => now()
        ]);

        return response()->json(['success' => true]);
    }

    public function getTotalApprovalSummary() {
        $summary = DB::table('registration_requests')
            ->selectRaw("
                COUNT(*) FILTER (WHERE approval_status IS NULL) AS waiting_approval,
                COUNT(*) FILTER (WHERE approval_status = 1) AS approved,
                COUNT(*) FILTER (WHERE approval_status = 0) AS rejected
            ")
            ->first();

        return response()->json([
            'waiting_approval' => $summary->waiting_approval,
            'approved' => $summary->approved,
            'rejected' => $summary->rejected,
        ]);
    }
}
