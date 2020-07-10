<!DOCTYPE html>
<html>
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

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="google-site-verification" content="2u3PKbC-Te_tfad-1EO6If-G3Q3MUpzxFeRx897idfQ" />

<style>
body {
    font-family: Arial;
    color: white;
}

.split {
    height: 100%;
    width: 50%;
    position: fixed;
    z-index: 1;
    top: 0;
    overflow-x: hidden;
    padding-top: 20px;
}

.left {
    left: 0;
    background-color: hsl(210, 100%, 60%);
}

.right {
    right: 0;
    background-color: white;
}

.centered {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
}

.button {
  background-color: hsl(210, 100%, 60%);
  border: blue;
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

.login {
  background-color: white;
  border: blue;
  height: 45px;
  width: 70px;
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

.buttonone {
  background-color: hsl(250, 15%, 100%);
  border: blue;
  color: black;
  padding: 8px;
  font-size: 14px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  margin: 1px 1px;
  cursor: pointer;
  border-radius: 40px;
}

}
}

</style>

<style type="text/css">
.input {
width: 230px;
height: 45px;
box-sizing: border-box;
border: 1px solid #ccc;
border-radius: 3px;
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
</style>

</head>
<body>

  <div class="split left">
    <ul>&nbsp;</ul>
    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    <svg xmlns="http://www.w3.org/2000/svg" height="550" width="600" viewBox="0 0 600 500" fill="hsl(210, 60%, 55%)" stroke="currentColor" stroke-width="0" viewBox="0 0 448 512"><path d="M505.1 19.1C503.8 13 499 8.2 492.9 6.9 460.7 0 435.5 0 410.4 0 307.2 0 245.3 55.2 199.1 128H94.9c-18.2 0-34.8 10.3-42.9 26.5L2.6 253.3c-8 16 3.6 34.7 21.5 34.7h95.1c-5.9 12.8-11.9 25.5-18 37.7-3.1 6.2-1.9 13.6 3 18.5l63.6 63.6c4.9 4.9 12.3 6.1 18.5 3 12.2-6.1 24.9-12 37.7-17.9V488c0 17.8 18.8 29.4 34.7 21.5l98.7-49.4c16.3-8.1 26.5-24.8 26.5-42.9V312.8c72.6-46.3 128-108.4 128-211.1.1-25.2.1-50.4-6.8-82.6zM400 160c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48z"/></svg>
<!--
Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
-->

    <div  class="centered">
      <div class="text-left">
        <div>
        <svg xmlns="http://www.w3.org/2000/svg" height="32" width="50" viewBox="0 0 500 500" fill="none" stroke="currentColor" stroke-width="30" viewBox="0 0 512 512"><path d="M505.1 19.1C503.8 13 499 8.2 492.9 6.9 460.7 0 435.5 0 410.4 0 307.2 0 245.3 55.2 199.1 128H94.9c-18.2 0-34.8 10.3-42.9 26.5L2.6 253.3c-8 16 3.6 34.7 21.5 34.7h95.1c-5.9 12.8-11.9 25.5-18 37.7-3.1 6.2-1.9 13.6 3 18.5l63.6 63.6c4.9 4.9 12.3 6.1 18.5 3 12.2-6.1 24.9-12 37.7-17.9V488c0 17.8 18.8 29.4 34.7 21.5l98.7-49.4c16.3-8.1 26.5-24.8 26.5-42.9V312.8c72.6-46.3 128-108.4 128-211.1.1-25.2.1-50.4-6.8-82.6zM400 160c-26.5 0-48-21.5-48-48s21.5-48 48-48 48 21.5 48 48-21.5 48-48 48z"/></svg>
        <!--
        Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
        License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
        -->

        <span style="font-size: 18px"><b>Online Transactions</b></span>
      </div>
      <ul>&nbsp;</ul>
      <div>
      <svg xmlns="http://www.w3.org/2000/svg" height="30" width="50" viewBox="0 0 590 500" fill="none" stroke="currentColor" stroke-width="30" viewBox="0 0 448 512"><path d="M542.22 32.05c-54.8 3.11-163.72 14.43-230.96 55.59-4.64 2.84-7.27 7.89-7.27 13.17v363.87c0 11.55 12.63 18.85 23.28 13.49 69.18-34.82 169.23-44.32 218.7-46.92 16.89-.89 30.02-14.43 30.02-30.66V62.75c.01-17.71-15.35-31.74-33.77-30.7zM264.73 87.64C197.5 46.48 88.58 35.17 33.78 32.05 15.36 31.01 0 45.04 0 62.75V400.6c0 16.24 13.13 29.78 30.02 30.66 49.49 2.6 149.59 12.11 218.77 46.95 10.62 5.35 23.21-1.94 23.21-13.46V100.63c0-5.29-2.62-10.14-7.27-12.99z"/></svg>
      <!--
      Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
      License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
      -->


      <span style="font-size: 18px"><b>Accounting</b></span>
      </div>
      <ul>&nbsp;</ul>
      <div>
      <svg xmlns="http://www.w3.org/2000/svg" height="30" width="50" viewBox="0 0 590 500" fill="none" stroke="currentColor" stroke-width="30" viewBox="0 0 448 512"><path d="M192 256c61.9 0 112-50.1 112-112S253.9 32 192 32 80 82.1 80 144s50.1 112 112 112zm76.8 32h-8.3c-20.8 10-43.9 16-68.5 16s-47.6-6-68.5-16h-8.3C51.6 288 0 339.6 0 403.2V432c0 26.5 21.5 48 48 48h288c26.5 0 48-21.5 48-48v-28.8c0-63.6-51.6-115.2-115.2-115.2zM480 256c53 0 96-43 96-96s-43-96-96-96-96 43-96 96 43 96 96 96zm48 32h-3.8c-13.9 4.8-28.6 8-44.2 8s-30.3-3.2-44.2-8H432c-20.4 0-39.2 5.9-55.7 15.4 24.4 26.3 39.7 61.2 39.7 99.8v38.4c0 2.2-.5 4.3-.6 6.4H592c26.5 0 48-21.5 48-48 0-61.9-50.1-112-112-112z"/></svg>
      <!--
      Font Awesome Free 5.3.1 by @fontawesome - https://fontawesome.com
      License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License)
      -->

      <span style="font-size: 18px"><b>Plus Business Network</b></span>
      </div>


      </div>
    </div>
  </div>

  <div class="split right">
    <div class="centered col-10" style="color: black">

      <form class="row text-left" method="POST" action="{{ route('login') }}">
          @csrf

          <div class="form-group">
                  <input id="email" placeholder="Email, phone, or username" type="email" class="input {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                  @if ($errors->has('email'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('email') }}</strong>
                      </span>
                  @endif
          </div>

          <div class="form-group text-left col">
                  <input id="password" placeholder="Password" type="password" class="input {{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                  @if ($errors->has('password'))
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $errors->first('password') }}</strong>
                      </span>
                  @endif

                  <a style="font-size: 12px; color: hsl(210, 100%, 60%)" class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                  </a>
          </div>

          <div class="form-group">
                  <button style="color: black; font-size: 14px" type="submit" class="btn btn-light login border">
                     <b style="color: hsl(210, 100%, 60%)"> {{ __('Log in') }}</b>
                  </button>
          </div>
          &nbsp;&nbsp;&nbsp;
      </form>

      <div class="col-md-9 col text-left p-3 mb-5 bg-white">
        <ul>&nbsp;</ul>
        <img src="storage/images/logo/logo.png" width="50" height="50">
        <ul>&nbsp;</ul>
        <h3><b>Experience the future of a connected world with us.</b></h3>

        <ul></ul>
        <ul>&nbsp;</ul>
        <h5><b>Join oryaa today</b></h5>
        <ul></ul>
        <a href="{{ route('register')}}">
          <button  style="color: white" type="button" class="button border btn btn-light btn-block btn-primary">
            <b style="font-size: 14px">Sign Up</b>
          </button>
        </a>
        <ul></ul>
        <a href="{{ route('login')}}">
        <button style="color: black" type="button" class="buttonone border btn btn-light btn-sm btn-block btn-primary">
          <b style="font-size: 14px">Login</b></button>
        </a>
        <ul>&nbsp;</ul>
      </div>
    </div>
    <footer class="bg-white">
      @include ('content.footer')
    </footer>
  </div>
</body>
</html>
