@extends('layouts.app')

@section('content')

<h1 class="mt-4">Create Post</h1>
<div class="row justify-content-start">
  <div class="col-12 col-md-8 col-lg-8 col-xl-6">
  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
    <div class="form-group">
      {{Form::label('title', 'Title')}}
      {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title..'])}}
    </div>
    <div class="form-group">
      {{Form::label('body', 'Body')}}
      {{Form::textarea('body', '', ['id' => 'summary-ckeditor', 'class' => 'form-control', 'placeholder' => 'Write your post here...', 'rows' => 3, 'cols' => 40])}}
    </div>
    <div class="form-control">
      {{Form::file('cover_image')}}
    </div>
    {{Form::submit('Post', ['class' => 'btn btn-primary mt-2'])}}
  {!! Form::close() !!}
  </div>
</div>
<div style="margin-bottom: 3em;"></div>
@endsection