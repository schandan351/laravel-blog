@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-md-8">
                <div>
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                   
                    @foreach($posts as $post)
                        <ul  class="list-group mt-4">
                            <li class="list-group-item">
                            <h4>{{$post->title}}</h4>
                            <p>{!!Str::limit($post->body,50)!!}</p>
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
        <div class="row">
            <div>{{$posts->links()}}</div>
        </div>
    </div>
</div>

@endsection
@section('category')

<a href="/posts/create" class="btn btn-primary btn-lg mx-2 my-2">Create</a>
<a href="/category/create" class="btn btn-primary btn-lg mx-2 my-2">Add Category</a>
<a href="/category" class="btn btn-primary btn-lg mx-2 my-2">List Category</a>
<a href="/draft" class="btn btn-primary btn-lg mx-2 my-2">Drafts</a>

<form class="form-inline my-4 my-lg-0" action="/search" method="GET">
    
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
</form>

@endsection

@section('posts')


@endsection

