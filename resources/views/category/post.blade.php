@extends('layouts.app')


@section('posts')

<div class="row ">
        @if(count($posts) > 0)

        @foreach($posts as $post)
            <div class="col-md-3">
                <div class="card mb-4">
                    @if($post->photo)
                    <img src="image/{{$post->photo}}" class="card-img-top" alt="...">
                    @else
                    <img src="http://via.placeholder.com/300" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{$post->title}}</h5>
                        <p class="card-text">{!!Str::limit($post->body,50)!!}</p>

                        <p class="card-text">{{$post->category_name}}</p>
                        <a href="/posts/{{$post->id}}" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>

        @endforeach


        @else

        <h1>There is no posts</h1>

        @endif

    </div>
   



@endsection


