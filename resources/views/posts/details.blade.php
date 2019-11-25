@extends('layouts.app')

@section('posts')
<div class="container">
    <h1><b>{{ucfirst($posts->title)}}</b></h1>
    <p>Posted date:<b>{{$posts->created_at}}</b></p>
    <p>Catagories: <a href="#"><b>{{$posts->catagories}}</b></a></p>

    <p>Posted By: <a href="">default</a></p>
        <img src="/image/{{$posts->photo}}" alt="">
    <p>{!!$posts->body!!}</p>

    @if(!Auth::guest())
    <a href="/posts/{{$posts->id}}/edit" class="btn btn-primary">Edit</a>
    {!!Form::open(['action'=>['PostController@destroy',$posts->id],'method'=>'DELETE','class'=>'float-right'])!!}
    <!-- {{Form::hidden('_method','DELETE')}} -->
    {{Form::submit('Delete',['class'=>'btn btn-danger'])}}
    {!!Form::close()!!}
    @endif
</div>
<div id="disqus_thread"></div>
<script>

/**
*  RECOMMENDED CONFIGURATION VARIABLES: EDIT AND UNCOMMENT THE SECTION BELOW TO INSERT DYNAMIC VALUES FROM YOUR PLATFORM OR CMS.
*  LEARN WHY DEFINING THESE VARIABLES IS IMPORTANT: https://disqus.com/admin/universalcode/#configuration-variables*/
/*
var disqus_config = function () {
this.page.url = PAGE_URL;  // Replace PAGE_URL with your page's canonical URL variable
this.page.identifier = PAGE_IDENTIFIER; // Replace PAGE_IDENTIFIER with your page's unique identifier variable
};
*/
(function() { // DON'T EDIT BELOW THIS LINE
var d = document, s = d.createElement('script');
s.src = 'https://learnwithchandan.disqus.com/embed.js';
s.setAttribute('data-timestamp', +new Date());
(d.head || d.body).appendChild(s);
})();
</script>
<noscript>Please enable JavaScript to view the <a href="https://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
                            
@endsection
