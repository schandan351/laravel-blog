@extends('layouts/app')


@section('posts')
<h1>Create posts</h1>
{!! Form::open(['action'=>'PostController@store','method'=>'POST','enctype'=>'multipart/form-data']) !!}
{{Form::label('title','Title')}}
{{Form::text('title','',['class'=>'form-control','placeholder'=>'Title'])}}

{{Form::label('image','Image')}}
{{Form::file('image',['class'=>'form-control','placeholder'=>'image'])}}


{{Form::label('categories','Categories')}}

<select class="custom-select custom-select-lg mb-3" name="categories" >
  <option selected>Select Categories</option>

@foreach($categories as $category)
<option value="{{$category->id}}" >{{$category->name}}</option>

@endforeach
 
</select>



{{Form::label('body','Body')}}
{{Form::textarea('body','',['id'=>'mytextarea','class'=>'form-control','placeholder'=>'body','cols'=>'100','rows'=>'20'])}}

<!-- <div class="form-check">
    {{Form::label('draft','Draft',['class'=>'form-check-label'])}}
    {{Form::checkbox('draft','0',['name'=>'draft','class'=>'form-check-input'])}}
</div> -->

<div class="form-check mt-3">
  <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1" name="draft">
  <label class="form-check-label" for="defaultCheck1">
  Draft
  </label>
</div>
{{Form::submit('Post',['class'=>'btn btn-primary btn-lg mt-3'])}}
{!! Form::close() !!}
@endsection