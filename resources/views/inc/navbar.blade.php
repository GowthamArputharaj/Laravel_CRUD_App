<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">            
            <ul class="navbar-nav mr-auto mx-4">
              <li class="nav-item mx-2">
                <a class="nav-link" href="/">Home</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="/about">About</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="/services">Service</a>
              </li>
              <li class="nav-item mx-2">
                <a class="nav-link" href="/posts">Blog</a>
              </li>
            </ul>

            {{-- <ul class="nav navbar-nav navbar-right float-right">
              <li class="nav-item">
                  <a class="nav-link" href="/posts/create">Create Post</a>
              </li>
          </ul> --}}

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
              <li class="nav-item mx-3">
                <a class="nav-link" href="/posts/create">Create Post</a>
              </li>
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="/home/" class="dropdown-item">Dashboard</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>

{{-- 
<nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top position-static mb-5">
  <a class="navbar-brand mx-4" href="#"><h4>{{config('app.name'), 'Gowtham'}}</h4></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
    <ul class="navbar-nav mr-auto mx-4">
      <li class="nav-item mx-2">
        <a class="nav-link" href="/">Home</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link" href="/about">About</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link" href="/service">Service</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link" href="/posts">Blog</a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
        <li class="nav-item">
            <a class="nav-link" href="/posts/create">Create Post</a>
        </li>
    </ul>
  </div>
</nav>
 --}}
