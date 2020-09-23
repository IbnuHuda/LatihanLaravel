<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Dashboard') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css') }}">
</head>
<body class="default-theme">
    <div id="app">
        <div class="navbar box-shadow" id="navbar">
            <button id="sidebar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container d-flex justify-content-between">
                <a href="{{ route('index') }}" class="navbar-brand d-flex align-items-center">
                    <img src="{{ asset('images/websites/Logo_VeCo.png') }}" class="img-responsive">
                    <strong class="ml-2 mt-2">VeCo</strong>
                </a>

                <div class="input-group">
                    @csrf
                    <input type="hidden" id="tokenUsers" value="{{ csrf_token() }}">
                    <input class="form-control" type="text" id="searchUsers" placeholder="Search Users">
                </div>  
                <div id="listUsers" class="list-group list-group-flush">
                    
                </div>
            </div>

            <img src="{{ asset('/images/users/1/示例图片_01.jpg') }}" class="rounded-circle float-right" id="photo" data-toggle="tooltip" data-html="true" title="aaaaaaa"> 
        </div>

        <div class="content">
            <div id="sidebar">
                <ul id="listMenu">
                    <a href=""><li><i class="fa fa-home"></i> <span style="margin-left: 27px;">Dashboard</span></li></a>
                    <span id="Jobs"><li><i class="fa fa-filter"></i> <span style="margin-left: 30px;">Jobs</span> <i class="fa fa-chevron-right" id="jobsChevron"></i></li></span>
                    <ul id="jobsMenus">
                    <a href="{{ route('companyPublishJobs')}}"><li>Publish Job</li></a>
                        <a href=""><li>Jobs Details</li></a>
                    </ul>
                </ul>

                <p id="reserved">&reg; 2020 Alright Reserved by VeCo Team</p>
            </div>

            <main>
                @yield('content')
            </main>

            <div id="theme-toggler">
                <i class="fa fa-moon-o" id="themeIcon"></i>
            </div>

            <div id="profileBox" class="text-center">
                <span>Logged as <br /><strong>{{ Auth::guard('company')->user()->name }}</strong></span>
                <hr width="100%" />
                <a href="profile">Profile</a><br />
                <a href="{{ route('companyLogout') }}">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
