<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title> Blank | Josh Admin Template</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <!-- global css -->
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet" type="text/css" />
    <!-- end of global css -->
    <!--page level css -->
    <!--end of page level css-->
</head>

<body class="skin-josh">
<header class="header">
    <a href="index.html" class="logo">
        <img src="{{ asset('assets/img/logo.png') }}" alt="logo">
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
                        <img src="{{ asset('assets/img/authors/avatar3.jpg') }}" width="35" class="img-circle img-responsive pull-left" height="35" alt="riot">
                        <div class="riot">
                            <div>
                                Riot
                                <span>
                                        <i class="caret"></i>
                                    </span>
                            </div>
                        </div>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header bg-light-blue">
                            <img src="{{ asset('assets/img/authors/avatar3.jpg') }}" width="90" class="img-circle img-responsive" height="90" alt="User Image" />
                            <p class="topprofiletext">Riot Zeast</p>
                        </li>
                        <!-- Menu Body -->
                        <li>
                            <a href="view_user.html"> <i class="livicon" data-name="user" data-s="18"></i> My Profile </a>
                        </li>
                        <li role="presentation"></li>
                        <li>
                            <a href="user_profile.html"><i class="livicon" data-name="gears" data-s="18"></i> Account Settings </a>
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="lockscreen.html"> <i class="livicon" data-name="lock" data-s="18"></i> Lock </a>
                            </div>
                            <div class="pull-right">
                                <a href="login.html"> <i class="livicon" data-name="sign-out" data-s="18"></i> Logout </a>
                            </div>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
</header>