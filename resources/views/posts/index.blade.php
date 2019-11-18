@extends('layouts.app')

@section('posts')
<div class="container">
    <div class="row">
        <h1>Posts</h1>
    </div>
    <div class="row col-md-10">
        @if(count($posts) > 0)

        @foreach($posts as $post)
        <div class="card mt-3 mr-3" style="width: 14rem;">
            <img src="https://picsum.photos/id/248/200/200" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$post->title}}</h5>
                <p class="card-text">{!!$post->body!!}</p>
                <a href="/posts/{{$post->id}}" class="btn btn-primary">View</a>
            </div>
        </div>

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