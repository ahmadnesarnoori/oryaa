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

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light">
            <div class="container col-md-10">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <div class="col-md-7">
                      <img src="storage/images/logo/oryaa.png" height="43" width="43">
                    </div>
                    <div class="col">
                    <form class="row" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group">
                                <input id="email" placeholder="Email or Username" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group">
                                <input id="password" placeholder="Password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                        </div>
                        &nbsp;&nbsp;
                        <div class="form-group">
                                <button type="submit" class="btn btn-primary rounded">
                                    {{ __('Login') }}
                                </button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </nav>

        <main>
          <ul></ul>
            @yield('content')
        </main>
    </div>
</body>
</html>
