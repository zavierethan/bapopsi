<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use DB;

class NewsController extends Controller
{
    public function index() {
        return view('modules.posts.news.index');
    }

    public function getLists(Request $request) {

        $searchValue = $request->input('search.value');
        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $query = DB::table('posts')
            ->select('posts.*', 'post_categories.name as category')
            ->join('post_categories', 'post_categories.id', '=', 'posts.category_id');

        $totalRecords = $query->count();

        if (!empty($searchValue)) {
            $query->where('posts.title', 'like', '%' . $searchValue . '%');
        }

        $filteredRecords = $query->count();

        $data = $query->orderBy('posts.id', 'desc')
                    ->skip($start)
                    ->take($length)
                    ->get();

        return response()->json([
            'draw' => intval($request->input('draw')),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data,
        ]);
    }

    public function create() {
        $categories = DB::table('post_categories')->get();
        return view('modules.posts.news.create', compact('categories'));
    }

    public function save(Request $request) {

        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'category'      => 'required|exists:post_categories,id',
            'thumbnail'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imagePath = $request->hasFile('thumbnail')
                    ? $request->file('thumbnail')->store('/uploads/posts', 'public')
                    : null;

        $post = DB::table('posts')->insert([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title, '-'),
            'content'       => $request->content,
            'thumbnail_url' => $imagePath,
            'category_id'   => $request->category,
            // 'status'        => $request->status,
            'published_at'  => now(),
        ]);

        return response()->json([
            'message' => 'News berhasil disimpan',
            'data'    => $post
        ]);
    }

    public function edit($id) {
        $news = DB::table('posts')->where('id', $id)->first();
        $categories =  DB::table('post_categories')->get();

        return view('modules.posts.news.edit', compact('news', 'categories'));
    }

    public function update(Request $request, $id) {
        $request->validate([
            'title'         => 'required|string|max:255',
            'content'       => 'required|string',
            'category'      => 'required|exists:post_categories,id',
            'thumbnail'     => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            return response()->json(['message' => 'News tidak ditemukan'], 404);
        }

        $imagePath = $post->thumbnail_url;

        if ($request->hasFile('thumbnail')) {
            if ($post->thumbnail_url && Storage::disk('public')->exists($post->thumbnail_url)) {
                Storage::disk('public')->delete($post->thumbnail_url);
            }

            $imagePath = $request->file('thumbnail')->store('uploads/posts', 'public');
        }

        DB::table('posts')->where('id', $id)->update([
            'title'         => $request->title,
            'slug'          => Str::slug($request->title, '-'),
            'content'       => $request->content,
            'thumbnail_url' => $imagePath,
            'category_id'   => $request->category,
            // 'status'        => $request->status,
            'updated_at'    => now(),
        ]);

        $updated = DB::table('posts')->where('id', $id)->first();

        return response()->json([
            'message' => 'News berhasil diperbarui',
            'data'    => $updated,
        ]);
    }

    public function delete($id) {
        $post = DB::table('posts')->where('id', $id)->first();

        if (!$post) {
            return response()->json([
                'message' => 'News tidak ditemukan',
            ], 404);
        }

        if ($post->thumbnail_url && Storage::disk('public')->exists($post->thumbnail_url)) {
            Storage::disk('public')->delete($post->thumbnail_url);
        }

        DB::table('posts')->where('id', $id)->delete();

        return response()->json([
            'message' => 'News berhasil dihapus',
        ]);
    }
}
