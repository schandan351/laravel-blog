<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class DashBoardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $posts = Post::orderBy('created_at', 'asc')->paginate(6);
        return view('dashboard')->with('posts',$posts);
    }
}
