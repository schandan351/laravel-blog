@extends('layouts/app')

@section('posts')
<h1>Create posts</h1>
{!! Form::open(['action'=>['PostController@update',$post->id],'method'=>'PUT']) !!}
{{Form::label('title','Title')}}
{{Form::text('title',$post->title,['class'=>'form-control','placeholder'=>'Title'])}}

{{Form::label('image','Image')}}

@if($post->photo)
<p><a href="image/{{$post->photo}}">{{$post->photo}}</a></p>
@endif

{{Form::file('image',['class'=>'form-control','placeholder'=>'image'])}}

{{Form::label('catagories','Catagories')}}

<select class="custom-select custom-select-lg mb-3" name="categories" >
  {{  $x=$post->category_id }}
    @foreach($categories as $category)
        <option selected value="{{$category->id}}">{{$category->$x}}</option>
    @endforeach
    @foreach($categories as $category)
        <option value="{{$category->id}}" >{{$category->name}}</option>

    @endforeach
    
</select>


{{Form::label('body','Body')}}
{{Form::textarea('body',$post->body,['id'=>'mytextarea','class'=>'form-control','placeholder'=>'body','cols'=>'100','rows'=>'20'])}}

<div class="form-check mt-3">
    @if($post->draft)
        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1"  name="draft" checked>
    @else
        <input class="form-check-input" type="checkbox" value="1" id="defaultCheck1"  name="draft">
    @endif

  <label class="form-check-label" for="defaultCheck1">
  Draft
  </label>
</div>
{{Form::hidden('_method','PUT')}}

{{Form::submit('Post',['class'=>'btn btn-primary btn-lg mt-3'])}}
{!! Form::close() !!}
@endsection