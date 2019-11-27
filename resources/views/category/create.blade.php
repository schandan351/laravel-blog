@extends('layouts/app')

@section('posts')
{!! Form::Open(['action'=>'CategoriesController@store','method'=>'POST'])!!}
{{Form::label('Category','Category')}}
{{Form::text('category','',['class'=>'form-control','placeholder'=>'Category'])}}
{{Form::submit('Add',['class'=>'btn btn-primary btn-lg mt-3 '])}}
{!!Form::Close()!!}


@endsection