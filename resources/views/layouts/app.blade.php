<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('../js/app.js') }}" defer></script>
    <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'article-ckeditor' );
    </script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/_style.scss') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md mb-4 cnavbar">
            <div class="container">
                <div  id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>
                        <ul class="navbar-nav navbar-left">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="/">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/about">About</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/services">Services</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="/posts">Blog</a>
                            </li>
                        </ul>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav navbar-right d-flex d-inline-flex" style="margin-left: 500px!important;">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item d-inline-flex  align-items-center mr-2">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item d-inline-flex  align-items-center mr-2">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item d-inline-flex  align-items-center mr-2">
                                    <a class="nav-link" href="/dashboard"
                                       role="button">
                                        {{ Auth::user()->name }}
                                    </a>

                                    <div>
                                        {{--dropdown-menu dropdown-menu-right--}}
                                        <a class="nav-link" style="color:white" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('messages')
            @yield('content')
        </main>
    </div>
</body>
</html>


{{--<li class="nav-item dropdown">--}}
{{--    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="/dashboard"--}}
{{--       role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
{{--        {{ Auth::user()->name }}--}}
{{--    </a>--}}

{{--    <div class="" aria-labelledby="navbarDropdown">--}}
{{--        --}}{{--dropdown-menu dropdown-menu-right--}}
{{--        <a style="color:white" class="dropdown-item" href="{{ route('logout') }}"--}}
{{--           onclick="event.preventDefault();--}}
{{--                                                     document.getElementById('logout-form').submit();">--}}
{{--            {{ __('Logout') }}--}}
{{--        </a>--}}
