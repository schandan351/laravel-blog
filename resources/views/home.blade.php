@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    <a href="/posts/create" class="btn btn-primary">Create</a>

                    @foreach($posts as $post)
                    <p>$post->title</p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('posts')


@endsection