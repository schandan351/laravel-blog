@section('category')
    <h1>CATEGORIES</h1>
    @foreach($categories as $category)
        <ul class="list-group">
            <li class="list-group-item"><a href="/category/{{$category->id}}">{{$category->name}}</a></li>
        </ul>
    @endforeach
    <p><a href=""></a></p>
@endsection