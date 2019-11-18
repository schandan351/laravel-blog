@extends('layouts/app')

@section('posts')
<h1>Create posts</h1>
{!! Form::open(['action'=>'PostController@store','method'=>'POST']) !!}
{{Form::label('title','Title')}}
{{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
{{Form::label('body','Body')}}
{{Form::textarea('body','',['id'=>'mytextarea','class'=>'form-control','placeholder'=>'body','cols'=>'100','rows'=>'20'])}}
{{Form::submit('Post',['class'=>'btn btn-primary btn-lg mt-3'])}}
{!! Form::close() !!}
@endsection