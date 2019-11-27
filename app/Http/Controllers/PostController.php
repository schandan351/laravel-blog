<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

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

        $categories = Category::all();
        
        return view('posts.index',compact('categories','posts'));
    }

    public function getcats(){
        $posts=Post::all()->groupBy('category_id');
        return view('posts.index',compact('posts'));
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
        $categories = Category::all();
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

        return view('posts.index',compact('categories','posts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostRequest $request)
    {
        $posts = new Post();
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->draft=$request->input('draft',0);
        $posts->category_id=$request->input('categories');

        if($files = $request->file('image'))
        {
            $destinationPath = 'image/'; // upload path
            $blogImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $blogImage);
            $posts->photo=$blogImage;
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
    public function update(PostRequest $request, $id)
    {
        $posts = Post::find($id);
        $posts->title = $request->input('title');
        $posts->body = $request->input('body');
        $posts->photo=$request->input('image');

        // dd(($posts->photo));

        if($request->hasFile('image'))
        {
            $destinationPath = 'image/';
            if($posts->photo !='' && File::exists($destinationPath.$posts->photo)){
                File::delete($destinationPath.$posts->photo);
            }
            $file=$request->file('image');
            $blogImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
            $file->move($destinationPath, $blogImage);
            $posts->photo=$blogImage;
          
        }elseif($request->remove ==1 && File::exists('image/'.$posts->photo)){
            File::delete('image/'.$posts->photo);
            $posts->photo=null;

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
        return redirect('/dashboard')->with('success', 'Post deleted');
    }

}