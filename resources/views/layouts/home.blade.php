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
max-width: 100px;
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

<style>
.item{position:relative}
img.playOverlayprofile{
   position:absolute;
   top: 0%;
   left: 50%;
   transform: translate(-50%, -50%);
}

.login {
  background-color: white;
  border: blue;
  height: 35px;
  width: 70px;
  border: 1px;
  color: black;
  font-size: 12px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 1px 1px;
  cursor: pointer;
  border-radius: 40px;
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

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container col-11">

              <a class="nav-link active" href="{{ url('/home')}}">
                  <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home">
                  <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"> </path>
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                  </svg>
                  <!--
                  Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
                  License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
                  -->
              </a>
              <a class="nav-link" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 500 500" fill="none" stroke="currentColor" stroke-width="30"><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg>
                <!--
                Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
                License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
                -->
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach ($messages as $messages)
                  <div>
                    <a class="dropdown-item" href="#">
                      <img class="profile-image" src="storage/images/newsfeeds/{{ $messages->image}}" height="30" width="30">
                      <span>{{ $messages->message}}...</span>
                    </a>
                  </div>
                  @endforeach

                  <div class="dropdown-divider"></div>
                  <div>
                  <a class="dropdown-item nov-link" href="message">
                    <svg xmlns="http://www.w3.org/2000/svg" height="20" width="25" viewBox="0 0 500 500" fill="none" stroke="currentColor" stroke-width="30"><path d="M502.3 190.8c3.9-3.1 9.7-.2 9.7 4.7V400c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V195.6c0-5 5.7-7.8 9.7-4.7 22.4 17.4 52.1 39.5 154.1 113.6 21.1 15.4 56.7 47.8 92.2 47.6 35.7.3 72-32.8 92.3-47.6 102-74.1 131.6-96.3 154-113.7zM256 320c23.2.4 56.6-29.2 73.4-41.4 132.7-96.3 142.8-104.7 173.4-128.7 5.8-4.5 9.2-11.5 9.2-18.9v-19c0-26.5-21.5-48-48-48H48C21.5 64 0 85.5 0 112v19c0 7.4 3.4 14.3 9.2 18.9 30.6 23.9 40.7 32.4 173.4 128.7 16.8 12.2 50.2 41.8 73.4 41.4z"/></svg>
                    <!--
                    Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
                    License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
                    -->
                    View all messages</a>
                  </div>
              </div>

              <a class="nav-link active" href="home">
                  <svg xmlns="http://www.w3.org/2000/svg" height="20" width="20" viewBox="0 0 500 500" fill="none" stroke="currentColor" stroke-width="40"><path d="M224 512c35.32 0 63.97-28.65 63.97-64H160.03c0 35.35 28.65 64 63.97 64zm215.39-149.71c-19.32-20.76-55.47-51.99-55.47-154.29 0-77.7-54.48-139.9-127.94-155.16V32c0-17.67-14.32-32-31.98-32s-31.98 14.33-31.98 32v20.84C118.56 68.1 64.08 130.3 64.08 208c0 102.3-36.15 133.53-55.47 154.29-6 6.45-8.66 14.16-8.61 21.71.11 16.4 12.98 32 32.1 32h383.8c19.12 0 32-15.6 32.1-32 .05-7.55-2.61-15.27-8.61-21.71z"/></svg>
                  <!--
                  Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
                  License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
                  -->
                  <polyline points="9 22 9 12 15 12 15 22"></polyline>
                  <span class="sr-only">(current)</span>
              </a>

              <div>
                <form action="search" method="POST" role="search">
                  {{ csrf_field() }}
                    <input placeholder="Search ORYAA"  class="search-bar from-control" type="text" name="q" ></input>
                                <button type="submit" class="btn-link border-0">
                <span class="glyphicon glyphicon-search"></span>
                </button>
                </form>
              </div>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <img  src="storage/images/logo/logo.png" height="30" width="31">
                    <ul><ul><ul><ul><ul><ul></ul></ul></ul></ul></ul></ul>

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
                            <li class="nav-item row dropdown">
                                <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                  <img class="profile-image" src="storage/images/newsfeeds/{{ Auth::user()->image}}" width="25" height="25"></img>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">


                                    <a class="dropdown-item" href="profile">
                                      Profile
                                    </a>
                                    <a class="dropdown-item" href="cashsales">
                                      Cash Sale
                                    </a>
                                    <a class="dropdown-item" href="creditsales">
                                      Credit Sale
                                    </a>
                                    <a class="dropdown-item" href="balancesheet">
                                      Reports
                                    </a>
                                    <a href="setting" class="dropdown-item">
                                      Setting
                                    </a>

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

                            <li>
                              &nbsp; &nbsp; @include('content.new.new')
                            </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-3">
          <div class="container">
            <div class="row">
              <div class="row">

                <div class="col screen-only">
                  @include('content.userinfo')
                </div>

                <div class="col-6">
                  @include('partials.success')
                  @include('partials.errors')
                  <div class="row">
                    <div class="col-12">
                      @yield('content')
                    </div>
                  </div>
                </div>

                <div class="col">
                  @include ('content.balance')
                  <div>
                    <ul></ul>
                  </div>
                  @include ('content.indexes')
                </div>
              </div>

            </div>
          </div>
        </main>
    </div>
</body>
</html>
