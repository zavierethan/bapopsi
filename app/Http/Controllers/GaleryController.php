<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleryController extends Controller
{
    public function index() {
        return view('modules.posts.galeries.index');
    }
}
