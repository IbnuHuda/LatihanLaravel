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
    <script src="{{ asset('js/dashboardApp.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboardApp.css') }}">
</head>
<body class="default-theme">
    <div id="app">
        <div class="navbar navbar-dark bg-primary box-shadow">
            <button id="sidebar-toggler" class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-2"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                    <strong>VeCo</strong>
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
                    <span id="Team"><li><i class="fa fa-users"></i> <span style="margin-left: 25px;">Team</span> <i class="fa fa-chevron-right" id="teamChevron"></i></li></span>
                    <ul id="teamMenus">
                        <a href=""><li>Create Team</li></a>
                        <a href=""><li>Profile Team</li></a>
                    </ul>
                    <span id="Jobs"><li><i class="fa fa-filter"></i> <span style="margin-left: 30px;">Jobs</span> <i class="fa fa-chevron-right" id="jobsChevron"></i></li></span>
                    <ul id="jobsMenus">
                        <a href=""><li>Publish Job</li></a>
                        <a href=""><li>Your Jobs</li></a>
                    </ul>
                    <span id="Vendor"><li><i class="fa fa-list"></i> <span style="margin-left: 25px;">Vendor</span> <i class="fa fa-chevron-right" id="vendorChevron"></i></li></span>
                    <ul id="vendorMenus">
                        <a href=""><li>Submission</li></a>
                        <a href=""><li>Assesment</li></a>
                        <a href=""><li>Approval</li></a>
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
                <span>Logged as <br /><strong>Ibnu Huda</strong></span>
                <hr width="100%" />
                <a href="profile">Profile</a><br />
                <a href="logout">Logout</a>
            </div>
        </div>
    </div>
</body>
</html>
