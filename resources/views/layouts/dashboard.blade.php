<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <title> @yield('title') | GHPS </title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of global css -->

    @yield('header_styles')

    @notify_css
    @notify_js
    <!--page level css -->
    <!--end of page level css-->
</head>

<body class="skin-josh">
<header class="header">
    <a href="{{ route('home') }}" class="logo">
        <img src="{{ asset('assets/images/custom/gps_logo_white.png') }}" alt="logo">
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <div>
            <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                <div class="responsive_nav"></div>
            </a>
        </div>
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset(Auth::user()->profile->avatar) }}" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                        <div class="riot">
                            <div>
                                {{  Auth::user()->username }}
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="{{ asset(Auth::user()->profile->avatar) }}" width="90" class="img-circle img-responsive" height="90" alt="User Image" />
                            <p class="topprofiletext">{{ Auth::user()->profile->full_name }}</p>
                        </li>
                        <!-- Menu Body -->
                        <li>
                            <a href="{{route('users.profile')}}"> <i class="livicon" data-name="user" data-s="18"></i> My Profile </a>
                        </li>
                        <li role="presentation"></li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="lockscreen.html"> <i class="livicon" data-name="lock" data-s="18"></i> Lock </a>
                            </div>
                            <div class="pull-right">
                                <a href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <i class="livicon" data-name="sign-out" data-s="18"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->

    @include('includes.sidebar')

    <aside class="right-side">

        @yield('dashboard')

    </aside>
    <!-- right-side -->


</div>

<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Return to top" data-toggle="tooltip" data-placement="left">
    <i class="livicon" data-name="plane-up" data-size="18" data-loop="true" data-c="#fff" data-hc="white"></i>
</a>
<!-- global js -->
<script src="{{ asset('assets/js/app.js') }}" type="text/javascript"></script>
<!-- end of global js -->

@notify_render

@yield('footer_scripts')


<!-- begining of page level js -->
<!-- end of page level js -->
</body>

</html>
