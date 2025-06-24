<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use DB;

class GaleryController extends Controller
{
    public function index() {
        return view('modules.posts.galeries.index');
    }

    public function getLists(Request $request) {

        $params = $request->all();

        $query = DB::table('galleries')
            ->select('galleries.*', 'gallery_categories.name as category')
            ->join('gallery_categories', 'gallery_categories.id', '=', 'galleries.category_id');

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $totalRecords = $query->count();
        $filteredRecords = $query->count();
        $data = $query->orderBy('galleries.id', 'desc')->skip($start)->take($length)->get();

        $response = [
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ];

        return response()->json($response);
    }

    public function create() {
        $categories = DB::table('gallery_categories')->get();
        return view('modules.posts.galeries.create', compact('categories'));
    }

    public function save(Request $request) {

        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|exists:gallery_categories,id',
            'image'       => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->hasFile('image')
                    ? $request->file('image')->store('/uploads/galleries', 'public')
                    : null;

        $gallery = DB::table('galleries')->insert([
            'title'        => $request->title,
            'description'  => $request->description,
            'category_id'  => $request->category,
            'image_url'    => $imagePath,
        ]);

        return response()->json([
            'message' => 'Gallery berhasil disimpan',
            'data'    => $gallery
        ]);
    }

    public function edit($id){
        $galery = DB::table('galleries')->where('id', $id)->first();
        $categories =  DB::table('gallery_categories')->get();

        return view('modules.posts.galeries.edit', compact('galery', 'categories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'category'    => 'required|exists:gallery_categories,id',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $galery = DB::table('galleries')->where('id', $id)->first();

        if (!$galery) {
            return response()->json(['message' => 'Galery tidak ditemukan'], 404);
        }

        $imagePath = $galery->image_url;

        if ($request->hasFile('image')) {
            if ($galery->image_url && Storage::disk('public')->exists($galery->image_url)) {
                Storage::disk('public')->delete($galery->image_url);
            }

            $imagePath = $request->file('image')->store('uploads/galleries', 'public');
        }

        DB::table('galleries')->where('id', $id)->update([
            'title'       => $request->title,
            'description' => $request->description,
            'category_id' => $request->category,
            'image_url'   => $imagePath,
            'updated_at'  => now(),
        ]);

        $updated = DB::table('galleries')->where('id', $id)->first();

        return response()->json([
            'message' => 'Galery berhasil diperbarui',
            'data'    => $updated,
        ]);
    }

    public function delete($id) {
        $galery = DB::table('galleries')->where('id', $id)->first();

        if (!$galery) {
            return response()->json([
                'message' => 'Galery tidak ditemukan',
            ], 404);
        }

        if ($galery->image_url && Storage::disk('public')->exists($galery->image_url)) {
            Storage::disk('public')->delete($galery->image_url);
        }

        DB::table('galleries')->where('id', $id)->delete();

        return response()->json([
            'message' => 'Galery berhasil dihapus',
        ]);
    }
}
