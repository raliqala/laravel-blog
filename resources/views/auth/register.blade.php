@extends('layouts.app')

@section('content')
<section class="mt-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-5" style="padding: 2em; background-color: rgba(0,0,0,0); border-radius: 5px; border: 1px solid gray;">
          <div class="row">
            <div class="col text-center">
              <h1>Sign Up</h1>
            </div>
          </div>
        <form method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="row align-items-center mt-2">
                <div class="col">
                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Full Name" required autofocus>
                </div>
              </div>
              @if ($errors->has('name'))
                <span class="text-danger">
                    {{ $errors->first('name') }}
                </span>
              @endif

          <div class="row align-items-center mt-2">
            <div class="col">
            <input type="email" name="email" class="form-control" id="email" value="{{ old('email') }}" placeholder="E-mail" required>
            </div>
          </div>
          @if ($errors->has('email'))
            <span class="text-danger">
                {{ $errors->first('email') }}
            </span>
          @endif
          
          <div class="row align-items-center mt-2">
            <div class="col">
            <input type="password" name="password" class="form-control" id="password" value="" placeholder="Password" required>
            </div>
          </div>
          @if ($errors->has('password'))
            <span class="text-danger">
                {{ $errors->first('password') }}
            </span>
          @endif

          <div class="row align-items-center mt-2">
            <div class="col">
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
            </div>
          </div>

          <div class="row justify-content-start mt-3">
            <div class="col">
              <button type="submit" id="submit-control" class="btn btn-primary btn-block mt-3" data-disable-with="Signing up...">Sign Up</button>
            </div>
          </div>
          <p class="mt-2">Already have an Account? <a href="{{ route('login') }}">sign in</a></p>
        </form>
        </div>
      </div>
    </div>
  </section>
@endsection
