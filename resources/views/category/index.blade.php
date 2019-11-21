@extends('layouts/app')

@section('posts')

<div>
    <ul>
     @foreach($categories as $category)
        <li class="list-group-item" ><a href="" >{{$category->name}}</a></li>
     @endforeach
    </ul>
</div>


@endsection