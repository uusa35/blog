<?php

namespace App\Http\Controllers;

use App\Models\Post;

class DashBoardController extends Controller
{
    public function index()
    {
        $posts = Post::orderBy('id','desc')->simplePaginate(100);
        return view('dashboard', compact('posts'));
    }
}
