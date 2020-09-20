<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/index.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        h1, h2, h3, h4, h5, h6 {
            overflow-y: hidden;
        }

        body.default-theme {
            --main-bg-color: #ffffff;
            --secondary-bg-color: #f5f5f5;
            --main-text-color: #000000;
            --secondary-text-color: #757575;

            --btn-color: #3490dc;
            --shadow-color: #888888;
            --bg-navbar: #4a69bd;
            --bg-wave: #0099ff;

            background-color: var(--main-bg-color);
            transition: 0.25s;
        }

        body.dark-theme {
            --main-bg-color: #111013;
            --secondary-bg-color: #212121;
            --main-text-color: #ffffff;
            --secondary-text-color: #fafafa;

            --shadow-color: #343a40;
            --bg-navbar: #0c2461;
            --bg-wave: #0a3d62;
            --btn-color: #d81e1e;

            background-color: var(--main-bg-color);
            transition: 0.25s;
        }

        /* Navbar */

        nav.navbar {
            background-color: var(--bg-navbar);
            width: 100%;
            position: fixed;
            z-index: 1000;
        }

        nav.navbar a.navbar-brand img {
            width: 35px;
            height: 30px;
        }

        nav.navbar a.navbar-brand strong {
            color: #ffffff;
        }

        nav.navbar ul.navbar-nav a {
            text-decoration: none;
            color: #ffffff;
            margin: 0 15px;
        }

        nav.navbar ul.navbar-nav.ml-auto a {
            color: #ffffff;
        }

        /* Home */

        div#home {
            height: 100vh;
        }

        div#home div#leftSideHome {
            padding: 120px;
            margin-top: 75px;
            color: var(--main-text-color);
        }

        div#home div#leftSideHome p {
            margin-bottom: 35px;
        }

        div#home div#leftSideHome a {
            text-decoration: none;
            padding: 12.5px 12.5px;
            background-color: var(--btn-color);
            border-radius: 50px;
            color: #ffffff;
        }

        div#home div#leftSideHome hr {
            width: 17.5%; 
            border: 1px solid var(--main-text-color);
        }

        div#home div#rightSideHome img {
            width: 100%;
        }

        /* About-VeCo */

        div#about-veco {
            height: 100vh;
            background: linear-gradient(rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0.75)), url("{{ asset('images/websites/Paralax.jpg') }}") no-repeat center center fixed;
            color: #fff;
        }

        div#about-veco h2 {
            margin-top: 50px;
        }

        div#about-veco header hr {
            margin-left: 46%;
            margin-right: 46%;
            width: 8%; 
            border: 1px solid var(--main-text-color);
        }

        div#about-veco footer div.card {
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
        }

        div#about-veco footer div.card i {
            font-size: 90px;
        }

        div#about-veco footer div.card div.card-body {
            padding: 60px 30px;        
        }

        /* Easy-Goals */

        div#easy-goals {
            color: var(--main-text-color);
        }

        div#easy-goals header h2 {
            margin-top: 50px;
        }

        div#easy-goals header hr {
            text-align: center;
            width: 12%;
            margin-left: 44%;
            margin-right: 44%;
            border: 1px solid var(--main-text-color);
        }

        div#easy-goals content hr {
            text-align: center;
            width: 17.5%;
            border: 1px solid var(--main-text-color);
        }

        /* Footer */

        div#contact footer {
            background-color: var(--bg-navbar);
            color: #fff;
        }

        div#contact hr {
            color: #fff;
        }

        div#contact .copyright {
            float: left;
        }

        div#contact .social { 
            float: right;
            margin-right: 10px;
        }

        div#contact .footer-title{
            font-weight: bold;
        }

        div#contact .sub-account{
            margin-bottom: 5px;
        }

        div#contact .sub-account a{
            color: white;
        }

        div#contact img.img-google {
            margin-left: -7px;
            width: 100%;
        }

        div#contact img.img-apple {
            width: 90%;
        }

        /* Theme Toggler */

        div#theme-toggler {
            width: 50px;
            height: 50px;
            padding: 10px;
            background-color: #303f9f;
            border-radius: 50px;
            position: fixed;
            bottom: 20px;
            right: 25px;
            color: #ffffff;
            font-size: 20px;
            text-align: center;
            cursor: pointer;
            transition: 0.5s;
        }

        div#theme-toggler i {
            margin-top: 5px;
        }

        @media screen and (max-width: 998px) {
            * {
                padding: 0;
                margin: 0;
                box-sizing: border-box;
            }

            /* Home */

            div#home {
                height: 65vh;
            }

            div#home div#leftSideHome {
                padding: 50px 0px 10px 75px;
                margin-top: 75px;
                color: var(--main-text-color);
            }

            div#home div#leftSideHome {
                font-size: 12px;
            }

            div#home div#rightSideHome img {
                width: 100%;
            }

            /* About-VeCo */

            div#about-veco {
                height: auto;
                padding-bottom: 30px;
            }

            div#about-veco h2 {
                margin-top: 10px;
            }

            div#about-veco header p {
                font-size: 12px;
            }

            div#about-veco footer div.card div.card-body {
                padding: 30px 15px;
            }

            div#about-veco footer div.card i {
                font-size: 75px;
            }

            /* Easy-Goals */

            div#easy-goals content p {
                font-size: 12px;
            }
        }

        @media screen and (max-width: 874px) {
            /* Home */

            div#home {
                height: 55vh;
            }

            div#home div#leftSideHome {
                padding: 50px 20px 10px 50px;
                margin-top: 75px;
                color: var(--main-text-color);
            }

            div#home div#leftSideHome h2 {
                font-size: 24px;
            }

            div#home div#leftSideHome p {
                font-size: 10px;
                margin-bottom: 25px;
            }

            div#home div#rightSideHome img {
                width: 100%;
            }

            /* About-VeCo */

            div#about-veco {
                height: auto;
            }

            div#about-veco header h2 {
                font-size: 24px;
            }

            div#about-veco header p {
                font-size: 10px;
            }

            div#about-veco footer div.card i {
                font-size: 60px;
            }

            div#about-veco footer div.card h3 {
                transform: scale(.7);
            }

            div#about-veco footer div.card p {
                font-size: 10px;
            }

            /* Easy-Goals */

            div#easy-goals content p {
                font-size: 10px;
            }
        }

        @media screen and (max-width: 718px) {
            /* Home */

            div#home {
                height: 45vh;
            }

            div#home div#leftSideHome {
                padding: 35px 20px 10px 50px;
                margin-top: 75px;
                color: var(--main-text-color);
            }

            div#home div#leftSideHome h2 {
                font-size: 14px;
            }

            div#home div#leftSideHome p {
                font-size: 8px;
                margin-bottom: 15px;
            }

            div#home div#leftSideHome a {
                text-decoration: none;
                font-size: 8px;
                padding: 7.5px 7.5px;
                background-color: var(--btn-color);
                border-radius: 50px;
                color: var(--main-text-color);
            }

            div#home div#rightSideHome img {
                width: 100%;
            }

            /* About-VeCo */

            div#about-veco {
                height: auto;
            }

            div#about-veco h2 {
                font-size: 14px;
                margin-top: 0px;
            }

            div#about-veco header hr {
                margin-left: 47.3%;
                margin-right: 47.3%;
                width: 5.4%;
            }

            div#about-veco header p {
                font-size: 6px;
                padding: 0 20px;
            }

            div#about-veco footer div.card i {
                font-size: 40px;
            }

            div#about-veco footer div.card div.card-body {
                padding: 20px 10px;
            }

            div#about-veco footer div.card h3 {
                font-size: 10px;
            }

            div#about-veco footer div.card p {
                font-size: 8px;
            }

            /* Easy-Goals */

            div#easy-goals {
                margin-top: 25px;
            }

            div#easy-goals header h2 {
                font-size: 14px;
            }

            div#easy-goals content h3 {
                font-size: 10px;
            }

            div#easy-goals content hr {
                width: 17.5%;
            }

            div#easy-goals content p {
                font-size: 6px;
            }

        }
    </style>
</head>
<body class="default-theme">
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

    <div id="home" class="w-100">
        <div id="leftSideHome" class="w-50 float-left">
            <h2>Work With Us</h2>
            <hr />
            <p class="mt-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
            cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
            proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <a href="{{ route('companyRegister') }}">Join as Company</a>
            <a href="{{ route('register') }}" class="ml-3">Join as Vendor</a>
        </div>

        <div id="rightSideHome" class="w-50 float-left">
            <img src="{{ asset('images/websites/Group 2.png') }}" class="float-right img-responsive">
        </div>
    </div>

    <br />

    <div id="about-veco" class="w-100 mt-5">
        <div class="container">
            <header class="text-center">
                <br />
                <h2 class="mb-4">What is VeCo?</h2>
                <hr />
                <p class="mt-4">VeCo is Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
            </header>

            <footer class="mt-4">
                <div class="row">
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fa fa-television icon-card mb-4"></i>
                                <h3 class="card-title">Best Project</h3>
                                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card text-center">
                            <div class="card-body">
                                <i class="fa fa-chain icon-card mb-4"></i>
                                <h3 class="card-title">Best Project</h3>
                                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <div class="card w-100 text-center">
                            <div class="card-body">
                                <i class="fa fa-group icon-card mb-4"></i>
                                <h3 class="card-title">Best Project</h3>
                                <p class="card-text">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <div id="easy-goals" class="w-100">
        <header class="text-center mb-3">
            <h2>Reaching Your Goals is Easier with Us</h2>
            <hr />
        </header>

        <br />

        <content class="mt-3">
            <div class="row">
                <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 pl-5 pb-5 pr-5 text-left">
                    <h3>Rate Up Your Company</h3>
                    <hr class="float-left" />
                    <p class="float-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                </div>

                <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                    <img src="{{ asset('images/websites/Easy-1.jpg') }}" class="img-responsive w-100">
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                    <img src="{{ asset('images/websites/Easy-2.jpg') }}" class="img-responsive w-100">
                </div>

                <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 pl-5 pb-5 pr-5 text-right">
                    <h3>Make Your Connection Wider</h3>
                    <hr class="float-right" />
                    <p class="float-right">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                </div>
            </div>

            <br />

            <div class="row">
                <div class="col-7 col-sm-7 col-md-7 col-lg-7 col-xl-7 pl-5 pb-5 pr-5 text-left">
                    <h3>Publish and Work Together</h3>
                    <hr class="float-left" />
                    <p class="float-left">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                    tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                    consequat.</p>
                </div>

                <div class="col-5 col-sm-5 col-md-5 col-lg-5 col-xl-5">
                    <img src="{{ asset('images/websites/Easy-3.jpg') }}" class="img-responsive w-100">
                </div>
            </div>
        </content>
    </div>

    <br />

    <div id="contact" class="mt-4">
        <footer class="page-footer font-small unique-color-dark">
            <div class="container text-center text-md-left mt-3" style="padding-top: 30px;">
                <div class="row">
                    <div class="col-md-6 col-lg-7 col-xl-6 mx-auto mb-4 d-flex align-items-center">
                        <img src="{{ asset('images/websites/Logo_VeCo.png') }}" class="img-responsive" style="width: 12%">
                        <strong class="ml-3" style="font-size: 35px;">VeCo</strong>
                    </div>
                    <div class="col-md-6 col-lg-5 mx-auto mb-4">
                        <div class="row">
                            <div class="col-4">
                                <h6 class="footer-title">Account</h6>
                                <hr class="bg-light accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p class="sub-account">
                                    <a href="{{ route('companyLogin') }}">Company</a>
                                </p>
                                <p class="sub-account">
                                    <a href="{{ route('login') }}">Developer</a>
                                </p>
                            </div>

                            <div class="col-4" style="padding-right: 10px;">
                                <h6 class="footer-title">About Us</h6>
                                <hr class="bg-light accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p class="sub-account">
                                    <a href="#!"><i class="fa fa-twitter mr-1" aria-hidden="true"></i> @crazysmile</a>
                                </p>
                                <p class="sub-account">
                                    <a href="#!">Developer</a>
                                </p>
                            </div>
                  
                            <div class="col-4">
                                <h6 class="footer-title">Mobile Apps</h6>
                                <hr class="bg-light accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                                <p class="sub-account">
                                    <img src="{{ asset('images/websites/google_play.png') }}" class="img-google img-responsive">
                                </p>
                                <p class="sub-account">
                                    <img src="{{ asset('images/websites/app_store.png') }}" class="img-apple img-responsive">
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          
            <center>
                <hr class="accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 85%; background-color: white;">
            </center>
            
            <div class="container" style="padding-bottom: 40px;">
                <span class="">&reg; 2020 Alright Reserved by VeCo Team</span>
                <span class="social"> <i class="fa fa-telegram"></i></span>
                <span class="social"> <i class="fa fa-facebook"></i></span>
                <span class="social"> <i class="fa fa-instagram"></i></span>
                <span class="social">Follow us : </span>
                <div style="clear: both"></div>
            </div>
        </footer>
    </div>

    <div id="theme-toggler">
        <i class="fa fa-moon-o" id="themeIcon"></i>
    </div>
</body>
</html>