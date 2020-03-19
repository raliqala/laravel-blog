<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="navbar-brand" href="@if(!Auth::guest()) /home @else / @endif">{{config('app.name', 'TP_BLOG')}}</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
        <a class="nav-link" href="@if(!Auth::guest()) /home @else / @endif">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/about">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="/services">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/contact">Contact</a>
        </li>
        {{-- @if (!Auth::guest()) --}}
        <li class="nav-item">
          <a class="nav-link" href="/posts">Blog</a>
        </li>
        {{-- @endif --}}
      </ul>
      <ul class="navbar-nav ml-auto nav-flex-icons">
        @if (Auth::guest())
          <li class="nav-item">
            <a href="/login" class="nav-link btn btn-sm btn-outline-primary">Sign In</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-sm btn-outline-primary ml-1" href="/register">Sign Up</a>
          </li>
       @else
        <li class="nav-item">
          <a class="nav-link" href="{{ route('logout') }}"
              onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
              Logout
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-sm btn-outline-success" href="/posts/create">Create Post</a>
        </li>
       @endif
      </ul>
    </div>
  </nav>

  