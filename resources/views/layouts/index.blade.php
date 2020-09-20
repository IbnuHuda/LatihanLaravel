<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src="{{ asset('js/index.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}">
</head>
<body class="default-theme">
    <svg id="wave-background" viewBox="0 0 1440 550">
        <path fill-opacity="1" d="M0,256L48,229.3C96,203,192,149,288,154.7C384,160,480,224,576,218.7C672,213,768,139,864,128C960,117,1056,171,1152,197.3C1248,224,1344,224,1392,224L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
    </svg>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark shadow-sm">
            <div class="container">
                <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center">
                    <img src="{{ asset('images/websites/Logo_VeCo.png') }}" class="img-responsive">
                    <strong class="ml-2">VeCo</strong>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto" id="menu">
                        <a href="{{ route('index') }}#home">Home</a>
                        <a href="{{ route('index') }}#about-veco">What is Veco?</a>
                        <a href="{{ route('index') }}#easy-goals">Easy Goals with Us</a>
                        <a href="{{ route('index') }}#contact">Contact</a>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <a href="{{ route('register') }}" class="btn btn-sm my-2 btn-info my-sm-0 dropbtn" type="submit" style="background-color: #67A9FB;"><i class="fa fa-user"></i> Start as Vendor</a>
                        <a href="{{ route('companyRegister') }}" class="btn btn-sm my-2 btn-info my-sm-0 dropbtn" type="submit" style="background-color: #67A9FB;"><i class="fa fa-user"></i> Start as Company</a>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>

        <div id="footer">
            <div class="container">
                <span class="float-left">&reg; 2020 Alright Reserved by VeCo Team</span>
                <span class="float-right"><i class="fa fa-telegram"></i></span>
                <span class="float-right"><i class="fa fa-facebook"></i></span>
                <span class="float-right"><i class="fa fa-instagram"></i></span>
                <span class="float-right">Follow us : </span>
            </div>
        </div>

        <div id="theme-toggler">
            <i class="fa fa-moon-o" id="themeIcon"></i>
        </div>
    </div>
</body>
</html>
