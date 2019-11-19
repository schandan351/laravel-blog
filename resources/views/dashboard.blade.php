@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary btn-lg mx-2 my-2">Create</a>
                    <form class="form-inline my-4 my-lg-0">
                        
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                    @foreach($posts as $post)
                        <ul  class="list-group mt-4">
                            <li class="list-group-item">{{$post->title}}

                            {!!Form::open(['action'=>['PostController@destroy',$post->id],'method'=>'POST','class'=>'float-right'])!!}
                            {{Form::hidden('_method','DELETE')}}
                            {{Form::submit('Delete',['class'=>'btn btn-danger btn-lg'])}}
                            {!!Form::close()!!}
                            <a href="/posts/{{$post->id}}/edit" class="btn btn-primary btn-lg float-right mx-2" role="button">edit</a>
                            <a href="/posts/{{$post->id}}" class="btn btn-primary btn-lg float-right mx-2" role="button">view</a>
                            
                            </li>
                            
                        </ul>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('posts')


@endsection