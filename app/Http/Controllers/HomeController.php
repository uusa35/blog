<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $elements = Post::whereActive(true)->orderBy('id','desc')->simplePaginate(self::TAKE_LESS);
        return view('home', compact('elements'));
    }
}
