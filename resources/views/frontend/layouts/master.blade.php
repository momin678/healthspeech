<!doctype html>
<html class="no-js " lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

<title>@yield('title','Health Speech')</title>
<meta name="keywords" content="@yield('meta_keywords','Health Speech')">
<meta name="tages" content="@yield('meta_tages','Health Speech')">
<meta name="description" content="@yield('meta_description','Health Speech')">
<link rel="canonical" href="{{url()->current()}}"/>
<!-- Favicon-->

<link rel="shortcut icon" href="https://mominul.aplusit.com.bd/images/healthspeech-logo.ico" />
<link rel="stylesheet" href="{{asset('assets/frontend/assets/plugins/bootstrap/css/bootstrap.min.css')}}">
<!-- Custom Css -->
<link rel="stylesheet" href="{{asset('assets/frontend/light/assets/css/main.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/light/assets/css/blog.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/light/assets/css/color_skins.css')}}">
<link rel="stylesheet" href="{{asset('assets/frontend/assets/plugins/bootstrap-select/css/bootstrap-select.css')}}" />
<!-- google fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Roboto:wght@100;400&display=swap" rel="stylesheet">

<link rel="stylesheet" href="{{asset('assets/fontawesome-free-5.15.3-web/css/all.css')}}">
</head>
<body class="theme-cyan">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="m-t-30"><img class="zmdi-hc-spin" src="https://thememakker.com/templates/oreo/hospital/html/assets/images/logo.svg" width="48" height="48" alt="Health Speech"></div>
            <p>Please wait...</p>
        </div>
    </div>
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- Top Bar -->
    @include('frontend.layouts.header')
    <!-- Left Sidebar -->
    @include('frontend.layouts.leftsidebar')
    <!-- Right Sidebar -->
    @include('frontend.layouts.rightsidebar')
    {{-- include content or page --}}
    @yield('content')
    @include('frontend.layouts.footer')

<!-- Jquery Core Js -->
<script src="{{asset('assets/frontend/light/assets/bundles/libscripts.bundle.js')}}"></script>
<!-- Lib Scripts Plugin Js -->
<script src="{{asset('assets/frontend/light/assets/bundles/vendorscripts.bundle.js')}}"></script>
<!-- Lib Scripts Plugin Js -->
<script src="{{asset('assets/frontend/light/assets/bundles/mainscripts.bundle.js')}}"></script>
{{-- Sweet Alert Js --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.10.1/dist/sweetalert2.all.min.js"></script>
@stack('script')
</body>

</html>
