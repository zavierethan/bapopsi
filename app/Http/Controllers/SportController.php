<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SportController extends Controller
{
    public function index() {
        return view('modules.cabang-olahraga.index');
    }

    public function getLists(Request $request){
        $params = $request->all();

        $query = DB::table('sports')
            ->leftJoin('sport_classes', 'sports.id', '=', 'sport_classes.sport_id')
            ->select(
                'sports.id',
                'sports.name',
                DB::raw("STRING_AGG(sport_classes.name, ' | ') as classes")
            )
            ->groupBy('sports.id', 'sports.name');

        if (!empty($params['name'])) {
            $query->where('sports.name', $params['name']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('sports.name', 'like', '%' . strtoupper($searchValue) . '%');
            });
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
        return view('modules.cabang-olahraga.create');
    }

    public function save(Request $request) {

        DB::beginTransaction();

        try {

            $sportId = DB::table('sports')->insertGetId([
                'name' => $request->name,
                'description' => $request->description,
                'created_at' => now(),
            ]);

            foreach ($request->sport_classes as $class) {
                DB::table('sport_classes')->insert([
                    'sport_id' => $sportId,
                    'name' => $class['name'],
                    'created_at' => now(),
                ]);
            }

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Gagal menyimpan data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function edit($id) {
        $sport = DB::table('sports')->where('id', $id)->first();
        $classes = DB::table('sport_classes')->where('sport_id', $id)->get();
        return view('modules.cabang-olahraga.edit', compact('sport', 'classes'));
    }

    public function update(Request $request, $id) {

        DB::beginTransaction();

        try {
            DB::table('sports')->where('id', $id)->update([
                'name' => $request->name,
                'description' => $request->description,
            ]);

            DB::table('sport_classes')->where('sport_id', $id)->delete();

            foreach ($request->sport_classes as $class) {
                DB::table('sport_classes')->insert([
                    'sport_id' => $id,
                    'name' => $class['name'],
                ]);
            }

            DB::commit();

            return response()->json(['success' => true]);
        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Gagal update data.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function getKelasByCabor($caborId) {
        $data = DB::table('sport_classes')->where('sport_id', $caborId)->get();

        return response()->json(['data' => $data], 200);
    }
}
