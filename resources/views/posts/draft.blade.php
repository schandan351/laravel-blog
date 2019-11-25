@extends('layouts.app')

@section('posts')
    <h1>Drafts Post</h1>
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">title</th>
      <th scope="col">draft</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
     @foreach($posts as $post)

        <tr>
            <!-- <th scope="row">1</th> -->
            <td> {{$post->title}}</td>
            @if($post->draft)
                <td>yes</td>
            @endif

            <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
        </tr>
    @endforeach

  </tbody>
</table>


@endsection