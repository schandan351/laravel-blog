@extends('layouts/app')

@section('posts')
{!! Form::Open(['action'=>['CategoriesController@update',$category->id],'method'=>'PUT'])!!}
{{Form::label('Category','Category')}}
{{Form::text('category',$category->name,['class'=>'form-control','placeholder'=>'Category'])}}
{{Form::submit('Update',['class'=>'btn btn-primary btn-lg mt-3 '])}}
{!!Form::Close()!!}
@endsection