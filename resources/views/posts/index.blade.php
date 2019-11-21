@extends('layouts.app')

@section('posts')
<div class="container">
    <div class="row">
        <h1>Posts</h1>
    </div>
    <div class="row ">
        @if(count($posts) > 0)

        @foreach($posts as $post)
            @if($post->draft)
            <div class="col-md-4">
            <div class="card mb-4">
            <img src="https://picsum.photos/id/248/200/200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{!!Str::limit($post->body,50)!!}</p>
                <p class="card-text">{{Str::limit($post->category_id,50)}}</p>

                <a href="/posts/{{$post->id}}" class="btn btn-primary">View</a>
            </div>
        </div>
            </div>

        @endif

        @endforeach


        @else

        <h1>There is no posts</h1>

        @endif

    </div>
    <div class="row">
        <div>{{$posts->links()}}</div>
    </div>
</div>
@endsection