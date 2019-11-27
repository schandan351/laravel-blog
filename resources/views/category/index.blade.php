@extends('layouts/app')

@section('posts')

<div>
    <ul>
        @foreach($categories as $category)
            <li class="list-group-item" ><a href="/showcats/{{$category->id}}" >{{$category->name}}</a>
                 <a href="category/{{$category->id}}/edit" class="float-right btn btn-primary mx-2">Edit</a>
                 {!!Form::open(['action'=>['CategoriesController@destroy',$category->id],'method'=>'DELETE','class'=>'float-right'])!!}
                    {{Form::submit('Delete',['class'=>'btn btn-danger btn-lg'])}}
                {!!Form::close()!!}
            </li>
           
        @endforeach
    </ul>
</div>


@endsection

