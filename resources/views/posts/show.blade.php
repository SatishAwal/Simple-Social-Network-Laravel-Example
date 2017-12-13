@extends('layouts.master')
@section('content')

<hr>
<div class="col-sm-8 blog-main">


 <h1>{{$post->title}}</h1>

 @if(count($post->tags))
 <ul>

  @foreach($post->tags as $tag)

  <li><a href="/posts/tags/{{$tag->name}}">{{$tag->name}}</a></li>
  @endforeach

</ul>
@endif



<p>{{$post->body}}</p>
<hr>
<h1>Comment</h1>

<div class="comments">
 <ul class="list-group">
  @foreach($post->comments as $comment)

  <li class="list-group-item">
   <strong>{{$post->created_at->toFormattedDateString()}}:</strong>  {{$comment->body}} &nbsp;
 </li>

 @endforeach

</ul>


</div>

<hr>

<div class="card">
	<div class="card-block">

    <form method="POST" action="/posts/{{$post->id}}/comments">
     {{csrf_field()}}

     <div class="form-group">
      <textarea class="form-control" name="body" placeholder="Your Commment is HERE."></textarea>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Add Comment</button>
    </div>


  </form>
  @include('layouts.errors')
</div>

</div>

</div>
@endsection