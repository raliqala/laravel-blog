@extends('layouts.app')

@section('content')
<section class="mt-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-8">
         <div class="card">
           <div class="card-header">
             Dashboard
           </div>
           <div class="card-body">
             <div class="card-title">
               <a href="/posts/create" class="btn btn-primary">Create new post</a>
             </div>
             @if(count($posts) > 0)
              <table class="table table-striped">
                  <tr>
                      <th>Title</th>
                      <th></th>
                      <th></th>
                  </tr>
                  @foreach($posts as $post)
                      <tr>
                          <td>{{$post->title}}</td>
                          <td><a href="/posts/{{$post->id}}/edit" class="btn btn-outline-primary">Edit</a></td>
                          <td>
                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => ''])!!}
                            {{Form::hidden('_method', 'DELETE')}}
                            {{Form::submit('Delete', ['class' => 'btn btn-outline-danger'])}}
                            {!!Form::close()!!}
                          </td>
                      </tr>
                    @endforeach
                </table>
              @else
                  <p>You have no posts</p>
              @endif
           </div>
         </div>
        </div>
      </div>
    </div>
  </section>
@endsection


