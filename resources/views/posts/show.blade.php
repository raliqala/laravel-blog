@extends('layouts.app')

@section('content')
<a href="/posts" class="btn btn-outline-secondary mt-4 mb-2 float-right" role="button" aria-pressed="true">Go back</a>
   <h2 class="mt-4">{{ $post->title }}</h2>
   <img style="width:100%;" src="/storage/cover_images/{{$post->cover_image}}" alt="img">
   <br><br>
   <div>
       {!! $post->body !!}
   </div>
   <hr>
   <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
   @if (!Auth::guest())
    @if ($post->user_id == Auth::user()->id)
    <a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary float-right">Edit this post</a>
        <span class="mr-2 float-right text-white">|</span>
    {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete this post', ['class' => 'btn btn-outline-danger'])}}
    {!!Form::close()!!}
    @endif
   @endif
   <div style="margin-bottom:3em;"></div>
@endsection