<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class NewsController extends Controller
{
    public function index() {
        return view('modules.posts.news.index');
    }

    public function getLists(Request $request) {

        $params = $request->all();

        $query = DB::table('posts')
            ->select('posts.*', 'post_categories.name as category')
            ->join('post_categories', 'post_categories.id', '=', 'posts.category_id');

        $start = $request->input('start', 0);
        $length = $request->input('length', 10);

        $totalRecords = $query->count();
        $filteredRecords = $query->count();
        $data = $query->orderBy('posts.id', 'desc')->skip($start)->take($length)->get();

        $response = [
            'draw' => $request->input('draw'),
            'recordsTotal' => $totalRecords,
            'recordsFiltered' => $filteredRecords,
            'data' => $data
        ];

        return response()->json($response);
    }

    public function create() {
        $categories = DB::table('post_categories')->get();
        return view('modules.posts.news.create', compact('categories'));
    }

    public function save(Request $request) {

        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|exists:categories,id',
            'status' => 'required|boolean',
        ]);

        $news = News::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category,
            'status' => $request->status,
        ]);

        return response()->json([
            'message' => 'News created successfully',
            'data' => $news
        ]);
    }

    public function edit($id) {

    }

    public function update(Request $request) {


    }

    public function delete(Request $request) {

    }
}
