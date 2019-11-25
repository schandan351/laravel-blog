<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','search']]);
    }

    public function index()
    {
        $posts = Post::orderBy('created_at', 'desc')
            ->join('categories', 'categories.id', 'posts.category_id')
            ->where('draft', 0)
            ->select(
                'posts.id',
                'posts.title',
                'posts.body',
                'posts.created_at',
                'posts.draft',
                'posts.photo',

                'categories.name as category_name'
            )
            ->paginate(6);
        return view('posts.index')->with('posts', $posts);
    }

    public function draft(){
        $posts=Post::where('draft',1)->get();
        return view('posts.draft')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function search(Request $request){
        $search=$request->get('search');
        $posts = Post::orderBy('created_at', 'desc')
            ->join('categories', 'categories.id', 'posts.category_id')
            ->where('body','LIKE','%'.$search.'%')
            ->orWhere('title','LIKE','%'.$search.'%')
            ->select(
                'posts.id',
                'posts.title',
                'posts.body',
                'posts.created_at',
                'posts.draft',
                'posts.photo',
                'categories.name as category_name'
            )
            ->paginate(6);

        return view('posts.index',['posts'=>$posts]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'categories'=>'required',
            'image'=>'required',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $posts = new Post();
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->draft=$request->input('draft',0);
        $posts->category_id=$request->input('categories');

        if($files = $request->file('image'))
        {
            $destinationPath = 'image/'; // upload path
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $posts->photo=$profileImage;
        }
       
        $posts->save();
        return redirect('/posts')->with('success', 'Post created');

    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::find($id);
        return view('posts.details')->with('posts', $posts);
    }

    /**
     * Show the form for editing the specified res]ource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        return view('posts.edit')->with('post', $post)->with('categories',$categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'image'=>'required'
        ]);

        $posts = Post::find($id);
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->photo=$request->input('image');

        // dd($posts->photo);
        if($files = $request->file('image'))
        {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);
            $posts->photo=$profileImage;
        }

        $posts->category_id=$request->input('categories');
        $posts->draft=$request->input('draft',0);
        $posts->save();
        return redirect('/posts')->with('success', 'Post updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted');
    }
}