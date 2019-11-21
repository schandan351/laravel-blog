@extends('layouts/app')


@section('posts')
<h1>Create posts</h1>
{!! Form::open(['action'=>'PostController@store','method'=>'POST']) !!}
{{Form::label('title','Title')}}
{{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}
{{Form::label('categories','Categories')}}



<select class="custom-select custom-select-lg mb-3" name="categories" >
  <option selected>Open this select menu</option>

@foreach($categories as $category)
<option value="{{$category->id}}" >{{$category->name}}</option>

@endforeach
 
</select>



{{Form::label('body','Body')}}
{{Form::textarea('body','',['id'=>'mytextarea','class'=>'form-control','placeholder'=>'body','cols'=>'100','rows'=>'20'])}}

<div class="form-check">
    {{Form::label('draft','Draft',['class'=>'form-check-label'])}}
    {{Form::checkbox('draft','1',['name'=>'draft','class'=>'form-check-input'])}}
</div>
{{Form::submit('Post',['class'=>'btn btn-primary btn-lg mt-3'])}}
{!! Form::close() !!}
@endsection