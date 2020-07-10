<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>ORYAA</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('favicon.png')}}">

</head>

<style type="text/css">
.home-image {
max-width: 250px;
border-radius: 220%;
}

body {
    background-color: white;
}

</style>

<style type="text/css">
.input {
width: 200px;
height: 45px;
box-sizing: border-box;
border: 1px solid #ccc;
border-radius: 20px;
border-color: hsl(220, 50%, 80%);
font-size: 14px;
font-color: blue;
background-color: white;
background-position: 0px 0px;
background-repeat: no-repeat;
padding: 0px 0px 0px 13px;
}

input[type=text]:focus {
}

.login {
  background-color: white;
  border: blue;
  height: 45px;
  width: 198px;
  border: 2px;
  color: black;
  padding: 8px;
  font-size: 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 1px 1px;
  cursor: pointer;
  border-radius: 40px;
}

</style>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                  <img  src="storage/images/logo/logo.png" height="30" width="31">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

        <main class="py-4">
            <div class="container">
              <div class="row">

                <div class="col col-9">
                    @yield('content')
                </div>

                <ul></ul>

                <div class="col list-group" style="font-size: 16px">
                  <a href="researches" class="list-group-item list-group-item-action active">
                   <b> More Researches</b>
                  </a>
                  <a href="peer-to-peer-electronic-accounting-system" class="list-group-item list-group-item-action">Peer-to-Peer Electronic Accounting System</a>
                  <a href="double-entry-accounting-scalability-to-the-current-technology" class="list-group-item list-group-item-action">Double-Entry Accounting Scalability to the Current Technology</a>
                  <a href="how-to-develop-a-peer-to-peer-electronic-accounting-system" class="list-group-item list-group-item-action">How to Develop a Peer-to-Peer Electronic Accounting System</a>
                  <ul></ul>
                <div>
              </div>
            </div>
            <footer>
              @include ('content.footer')
            </footer>
        </main>
    </div>
</body>
</html>
