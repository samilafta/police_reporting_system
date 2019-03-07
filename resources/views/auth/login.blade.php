<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login | GHPS</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.png') }}" type="image/x-icon">
    <!--end of global css-->
    <!--page level css starts-->
    <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" />
    <link href="{{ asset('assets/vendors/bootstrapvalidator/css/bootstrapValidator.min.css') }}" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/login/login.css') }}">
    <!--end of page level css-->
</head>

<body>
<div class="container">
    <!--Content Section Start -->
    <div class="row">
        <div class="box animation flipInX">
            <div class="box1">
                <img src="{{ asset('assets/images/custom/gps_logo_blue.png') }}" alt="logo" class="img-responsive mar">
                <h3 class="text-primary">Login</h3>
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <div class="form-group {{ $errors->first('username', 'has-error') }}">
                        <label class="sr-only"></label>
                        <input class="form-control" type="text" placeholder="Username" name="username" value="{{ old('email') }}" required autofocus />
                    </div>
                    <span class="help-block">{{ $errors->first('username', ':message') }}</span>

                    <div class="form-group {{ $errors->first('password', 'has-error') }}">
                        <label class="sr-only"></label>
                        <input class="form-control" name="password" type="password" placeholder="Password" required />
                    </div>
                    <span class="help-block">{{ $errors->first('password', ':message') }}</span>

                    <div class="checkbox text-left">
                        <label>
                            <input type="checkbox" name="remember">  Remember Password
                        </label>
                    </div>
                    <button type="submit" class="btn btn-block btn-primary">Log In</button>
                </form>
            </div>
            {{--<div class="bg-light animation flipInX">--}}
            {{--<a href="forgot.html">Forgot Password?</a>--}}
            {{--</div>--}}
        </div>
    </div>
    <!-- //Content Section End -->
</div>
<!--global js starts-->
<script type="text/javascript" src="{{ asset('assets/js/login/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/login/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/bootstrapvalidator/js/bootstrapValidator.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/iCheck/js/icheck.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/login/login_custom.js') }}"></script>
<!--global js end-->

<script>
    $(document).ready(function(){
        $("input[type='checkbox']").iCheck({
            checkboxClass: 'icheckbox_minimal-blue'
        });
    });
</script>

</body>

</html>
