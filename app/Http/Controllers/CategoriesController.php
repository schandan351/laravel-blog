<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Post;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $categories=Category::all();
        return view('category.index')->with('categories',$categories);
    }

    public function show_cat($id){
        $posts = Post::orderBy('created_at', 'desc')
        ->join('categories', 'categories.id', 'posts.category_id')
        ->where('categories',$id)
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

        return view('category.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        $category=new Category();
        $category->name=$request->input('category');
        $category->save();
        return redirect('/category')->with('success','category created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::findOrFail($id);
       
        if($category){
            $posts=Post::where('category_id',$id)->get();
            // dd($posts);
            return view('category.post',compact('posts'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category=Category::find($id);
        return view('category.edit')->with('category',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        $category=Category::find($id);
        $category->name=$request->input('category');
        $category->save();
        return Redirect('/category')->with('success','category updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('/category')->with('success','deleted successfully');
    }
}
