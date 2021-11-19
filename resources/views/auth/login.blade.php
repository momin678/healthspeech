<!doctype html>
<html class="no-js " lang="en">

<!-- Mirrored from thememakker.com/templates/oreo/hospital/html/light/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 18:20:04 GMT -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">

    <title>:: Oreo Hospital :: Sign In</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/frontend/light/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/light/assets/css/authentication.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/light/assets/css/color_skins.css')}}">
</head>

<body class="theme-cyan authentication sidebar-collapse">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-transparent">
        <div class="container">
            <div class="navbar-translate n_logo">
                <a class="navbar-brand" href="{{url('/')}}" title="" target="_blank">Health Speech</a>
                <button class="navbar-toggler" type="button">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
            </div>
            <div class="navbar-collapse">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{url('/')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="javascript:void(0);">Search Result</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Follow us on Twitter" href="javascript:void(0);" target="_blank">
                            <i class="zmdi zmdi-twitter"></i>
                            <p class="d-lg-none d-xl-none">Twitter</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Like us on Facebook" href="javascript:void(0);" target="_blank">
                            <i class="zmdi zmdi-facebook"></i>
                            <p class="d-lg-none d-xl-none">Facebook</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" title="Follow us on Instagram" href="javascript:void(0);" target="_blank">
                            <i class="zmdi zmdi-instagram"></i>
                            <p class="d-lg-none d-xl-none">Instagram</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-white btn-round" href="{{ route('register') }}">SIGN UP</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="page-header">
        <div class="page-header-image" style="background-image:url({{asset('assets/frontend/assets/images/login.jpg') }})"></div>
        <div class="container">
            <div class="col-md-12 content-center">
                <div class="card-plain">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="header">
                            <div class="logo-container">
                                <img src="https://thememakker.com/templates/oreo/hospital/html/assets/images/logo.svg" alt="">
                            </div>
                            <h5>Log in</h5>
                        </div>
                        <div class="content">
                            <div class="input-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" autocomplete="off">
                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-addon">
                                <i class="zmdi zmdi-account-circle"></i>
                            </span>
                            </div>
                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <span class="input-group-addon">
                                <i class="zmdi zmdi-lock"></i>
                            </span>
                            </div>
                        </div>
                        <div class="footer text-center">
                            <button type="submit" class="btn btn-primary btn-round btn-block  ">SIGN IN</button>
                            @if (Route::has('password.request'))
                            <h5><a href="{{ route('password.request') }}" class="link">Forgot Password?</a></h5>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery Core Js -->
    <script src="{{asset('assets/frontend/light/assets/bundles/libscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->
    <script src="{{asset('assets/frontend/light/assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

    <!-- Lib Scripts Plugin Js -->

    <script>
        $(".navbar-toggler").on('click', function() {
            $("html").toggleClass("nav-open");
        });
        //=============================================================================
        $('.form-control').on("focus", function() {
            $(this).parent('.input-group').addClass("input-group-focus");
        }).on("blur", function() {
            $(this).parent(".input-group").removeClass("input-group-focus");
        });
    </script>
</body>

<!-- Mirrored from thememakker.com/templates/oreo/hospital/html/light/sign-in.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 24 Feb 2021 18:20:04 GMT -->

</html>
