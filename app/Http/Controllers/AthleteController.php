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

        $query = DB::table('atlet')
            ->select(
                'atlet.*',
                'sports.name as cabang_olahraga'
            )
            ->leftJoin('sports', 'sports.id', '=', 'atlet.cabang_olahraga_id');

        if (!empty($params['nama_lengkap'])) {
            $query->where('atlet.nama_lengkap', $params['nama_lengkap']);
        }

        $searchValue = $request->input('search.value');
        if (!empty($searchValue)) {
            $query->where(function ($q) use ($searchValue) {
                $q->where('atlet.nama_lengkap', 'like', '%' . strtoupper($searchValue) . '%');
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

    public function create() {
        $cabor = DB::table('sports')->orderBy('name', 'asc')->get();
        return view('modules.athletes.create', compact('cabor'));
    }

    public function save(Request $request) {
        DB::beginTransaction();
        try {
            // Simpan file atlet ke public path
            $pasFotoPath = $request->hasFile('pas_foto')
                ? $request->file('pas_foto')->store('uploads/atlet', 'public')
                : null;

            $raportPath = $request->hasFile('raport')
                ? $request->file('raport')->store('uploads/atlet', 'public')
                : null;

            $aktaPath = $request->hasFile('akta_lahir')
                ? $request->file('akta_lahir')->store('uploads/atlet', 'public')
                : null;

            // Simpan data atlet
            $atletId = DB::table('atlet')->insertGetId([
                'nama_lengkap'       => $request->nama_lengkap,
                'tempat_lahir'       => $request->tempat_lahir,
                'tanggal_lahir'      => $request->tanggal_lahir,
                'jenis_kelamin'      => $request->jenis_kelamin,
                'nama_sekolah'       => $request->nama_sekolah,
                'nisn'               => $request->nisn,
                'pas_foto'           => $pasFotoPath,
                'raport'             => $raportPath,
                'akta_lahir'         => $aktaPath,
                'cabang_olahraga_id' => $request->cabang_olahraga,
                'kelas_id'           => $request->kelas_id,
                'created_at'         => now(),
                'updated_at'         => now()
            ]);

            // Simpan data official
            if ($request->has('officials')) {
                foreach ($request->officials as $index => $official) {
                    $fotoPath = null;
                    $fileInput = "officials.{$index}.foto";

                    if ($request->hasFile($fileInput)) {
                        $fotoPath = $request->file($fileInput)->store('uploads/official', 'public');
                    }

                    DB::table('officials')->insert([
                        'atlet_id'   => $atletId,
                        'jabatan'    => $official['jabatan'],
                        'nama'       => $official['nama'],
                        'foto'       => $fotoPath,
                        'created_at' => now(),
                        'updated_at' => now()
                    ]);
                }
            }

            DB::commit();
            return response()->json(['message' => 'Data berhasil disimpan']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'message' => 'Gagal menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}
