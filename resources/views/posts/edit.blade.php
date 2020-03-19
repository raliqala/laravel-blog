@extends('layouts.app')

@section('content')

<h1 class="mt-4">Edit Post</h1>
<div class="row justify-content-start">
  <div class="col-12 col-md-8 col-lg-8 col-xl-6">
  {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', $post->title, ['class' => 'form-control', 'placeholder' => 'Title..'])}}
    </div>
    <div class="form-group">
      {{Form::label('body', 'Body')}}
      {{Form::textarea('body', $post->body, ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Write your post here...', 'rows' => 3, 'cols' => 40])}}
    </div>
    <div class="form-control">
      {{Form::file('cover_image')}}
    </div>
    {{Form::hidden('_method', 'PUT')}}
    {{Form::submit('Post', ['class' => 'btn btn-primary mt-2'])}}
  {!! Form::close() !!}
  </div>
</div>
<div class="mb-4"></div>
@endsection