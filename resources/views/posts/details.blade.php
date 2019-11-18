@extends('layouts.app')

@section('posts')
<div class="container">
    <h1><b>{{ucfirst($posts->title)}}</b></h1>
    <p>Posted date:<b>{{$posts->created_at}}</b></p>
    <p>Posted By: <a href="">default</a></p>
    <p>{!!$posts->body!!}</p>

    <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary">Edit</a>
    {!!Form::open(['action'=>['PostController@destroy',$posts->id],'method'=>'POST','class'=>'pull-right'])!!}
    {{Form::hidden('_method','DELETE')}}
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
</div>

@endsection