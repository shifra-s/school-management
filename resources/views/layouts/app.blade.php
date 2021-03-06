<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="token" content="{!! csrf_token() !!}">

    <title>School Management Platform</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"
          integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
    {{--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">--}}
    <link href="https://fonts.googleapis.com/css?family=Karla|Lato|Montserrat" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/main.css">

    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="row" id="full-navbar">
            <div class="col-md-3 col-sm-3 hidden-xs navbar-header">

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <a href="#" class="navbar-left">
                        <img class="navbar-logo" src="/imgs/john_bryce_logo.jpg" alt="jb-logo"
                             style="max-width:100%; max-height:100px; margin-top:6%; margin-left: 20px;">
                    </a>
                </a>
            </div>

            <div class="col-md-6 col-sm-5 col-xs-8 navbar-links">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="app-navbar-collapse">

                @if(\Auth::check())
                    <!-- Left Side Of Navbar -->
                        <ul class=" nav navbar-nav main-menu navbar-expand-lg navbar-dark fixed-top nav-school-admin">

                            <li><a href="{{ url('/home') }}">Home</a></li>
                            <li><a href="{{ url('/schools') }}">School</a></li>
                            @if(in_array(\Auth::user()->role, [1,2]))
                                <li><a href="{{ url('/administrators') }}">Administrators</a></li>
                            @endif
                        </ul>
                @endif


                <!-- Collapsed Hamburger -->


                </div>
            </div>
            <div class="col-md-3 col-sm-4 col-xs-4">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a id="login" href="{{ url('/login') }}">Login</a></li>
                        <li><a href="#">{{\Auth::check() ? \Auth::user()->name : ''}}</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false">
                                <p id="user-details">
                                    <strong>{{ Auth::user()->name}}
                                        <span>&nbsp&nbsp</span></strong>{{\Auth::user()->roles->name }} <span
                                            class="caret"></span>
                                </p>

                                <img id="user-img" style="max-width: 100px; max-height: 100px;" class="img-thumbnail"
                                     src="uploads/{{Auth::user()->image}}">
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</nav>

@yield('content')

<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"
        integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js"
        integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
        crossorigin="anonymous"></script>
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}

@stack('scripts')
</body>
</html>
