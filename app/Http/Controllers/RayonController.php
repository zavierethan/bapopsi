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
                    DB::raw("STRING_AGG(k.nama, ' | ') as kecamatan")
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

    public function save(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kecamatan_id' => 'required|array|min:1',
        ]);

        DB::beginTransaction();
        try {
            $rayonId = DB::table('rayon')->insertGetId([
                'nama' => $request->nama
            ]);

            foreach ($request->kecamatan_id as $kecId) {
                DB::table('rayon_kecamatan')->insert([
                    'rayon_id' => $rayonId,
                    'kecamatan_id' => $kecId
                ]);
            }

            DB::commit();
            return response()->json(['message' => 'Berhasil disimpan'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e], 500);
        }
    }

    public function edit($id) {
        $rayon = DB::table('rayon')->where('id', $id)->first();

        $selectedKec = DB::table('rayon_kecamatan')
            ->where('rayon_id', $id)
            ->pluck('kecamatan_id')
            ->toArray();

        $rayon->kecamatan_ids = $selectedKec;

        $kecamatan = DB::table('kecamatan')->get();

        return view('modules.rayon.edit', compact('rayon', 'kecamatan'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'kecamatan_id' => 'required|array|min:1',
        ]);

        DB::beginTransaction();
        try {
            DB::table('rayon')->where('id', $id)->update([
                'nama' => $request->nama
            ]);

            // Hapus kecamatan lama, insert yang baru
            DB::table('rayon_kecamatan')->where('rayon_id', $id)->delete();

            foreach ($request->kecamatan_id as $kecId) {
                DB::table('rayon_kecamatan')->insert([
                    'rayon_id' => $id,
                    'kecamatan_id' => $kecId
                ]);
            }

            DB::commit();
            return response()->json(['message' => 'Berhasil diupdate'], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['message' => 'Gagal diupdate'], 500);
        }
    }
}
