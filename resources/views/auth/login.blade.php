@extends('layouts.app')

@section('content')
<section class="mt-4">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-8 col-lg-8 col-xl-5" style="padding: 2em; background-color: rgba(0,0,0,0); border-radius: 5px; border: 1px solid gray;">
          <div class="row">
            <div class="col text-center">
              <h1>Sign In</h1>
            </div>
          </div>
        <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
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
            <input type="password" name="password" class="form-control" id="password" value="" placeholder="Password">
            </div>
          </div>
          @if ($errors->has('password'))
            <span class="text-danger">
                {{ $errors->first('password') }}
            </span>
          @endif

          <div class="row justify-content-start mt-3">
            <div class="col">
              <div class="form-check">
                <label class="form-check-label">
                  <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} class="form-check-input">
                  Remember me
                </label>
                <a href="{{ route('password.request') }}" class="float-right">Forgot Password?</a>
              </div>
              <button type="submit" id="submit-control" class="btn btn-primary btn-block mt-3" data-disable-with="Signing in...">Sign In</button>
            </div>
          </div>
          <p class="mt-2">Don't have an Account? <a href="{{ route('register') }}">sign up</a></p>
        </form>
        </div>
      </div>
    </div>
  </section>
@endsection
