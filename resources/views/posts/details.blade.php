@extends('layouts.app')

@section('posts')
<div class="container">
    <h1><b>{{ucfirst($posts->title)}}</b></h1>
    <p>Posted date:<b>{{$posts->created_at}}</b></p>
    <p>Posted By: <a href="">default</a></p>
    <p>{!!$posts->body!!}</p>

    <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary">Edit</a>
</div>

@endsection