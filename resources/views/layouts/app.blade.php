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
    background-color: hsl(200, 20%, 92%);
}
.login1 {
  background-color: white;
  border: blue;
  height: 40px;
  width: 90px;
  border: 1px;
  color: black;
  font-size: 14px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 1px 1px;
  cursor: pointer;
  border-radius: 40px;
}

</style>

<style type="text/css">
.search-bar {
width: 230px;
box-sizing: border-box;
border: 2px solid #ccc;
border-radius: 33px;
border-color: hsl(220, 50%, 80%);
font-size: 14px;
font-color: blue;
background-color: white;
background-image: url('searchicon.png');
background-position: 10px 10px;
background-repeat: no-repeat;
padding: 1px 1px 0px 40px;
-webkit-transition: width 0.4s ease-in-out;
transition: width 0.4s ease-in-out;
outline: none;
}

input[type=text]:focus {
}
</style>

<style type="text/css">
.profile-image {
max-width: 90px;
border: 3px;
border-radius: 100%;
}

.screen-only

{
display: block;
}
.mobile-only
{
display: none;
}
@media screen and (max-width: 480px)
{
.screen-only
{
display: none;
}
.mobile-only
{
display: block;
}
}

</style>

<style>
.item{position:relative}
img.playOverlay{
   position:absolute;
   top: 90%;
   left: 22%;
   transform: translate(-50%, -65%);
}

.login {
  background-color: hsl(210, 90%, 60%);
  border: blue;
  height: 45px;
  width: 70px;
  border: 2px;
  color: white;
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
                   <img  src="storage/images/logo/logo.png" height="30" width="31" onerror="this.style.display='none'">
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

        <main class="py-3">
            <div class="container">
                <div class="col">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>
