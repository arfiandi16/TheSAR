<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" href="{{asset('/img/logo/logo.jpg')}}" type="image/gif" sizes="16x16"> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Mantou</title>

    <!-- Scripts -->
    <script src="{{ asset('/js/app.js') }}" defer></script>
    <script type="text/javascript">

        $("#input-id").rating();

    </script>
    <!-- Fonts --> 
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <style type="text/css">
    body{
      background-color: white;
    }
    .img img{
      -webkit-filter:brightness(50%);
    }
    .navd{
      background-color: #1b2a49;
      color: white;
      padding: 5px;
    }
    .cards1{
      background-color: white;
      color: black; 
    }
    .type{
      color: white;
      padding: 5px;
    }
    .card-link{
      color: white;
    }
    a:link{
      text-decoration: none;
      color:white;
    }
    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm navd">
            <div class="container">
                <a class="navbar-brand card-link" href="{{ url('/home') }}" style="color:white;">
                    <img src="/img/logo/logo.png" width="50px">
                </a> 
                @guest
                @if (Route::has('register'))

                @endif
                @else
                    @if(Auth::user()->admin==0 && Auth::user()->verification==0)
                        
                    @else
                    <a class="nav-link" href="/crud" style="color:white;" >
                    Lihat Data
                        </a> 
                    @endif 
                @endguest
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
                            <li class="nav-item" >
                                <a class="nav-link" href="{{ route('login') }}" style="color:white;">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}" style="color:white;">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" style="color: white;" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->nama }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                     <a class="dropdown-item fa fa-user" style="color: black;" href="/account">
                                        My Account
                                    </a>
                                    <a class="dropdown-item fa fa-sign-out" style="color: black;" href="{{ route('logout') }}"
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
            @yield('content')
        </main>
    </div>
</body>
</html>
