
<!doctype html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>@yield('title')</title>

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset ('assets/backend/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset ('assets/backend/css/jquery-ui.css') }}">
  <link rel="stylesheet" href="{{ asset ('assets/backend/css/jquery.tagsinput-revisited.css') }}">
  <link rel="stylesheet" href="{{ asset ('assets/backend/css/jquerysctipttop.css') }}">
  <!-- google fonts -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

  {{-- text editor css --}}

</head>

<body class="sidebar-menu-collapsed">
  <!--<div class="se-pre-con"></div>-->
    <section>

        @include('admin.layouts.sitebar')
        @include('admin.layouts.header')
        @yield('content')

    </section>
    <!-- move top -->
    <button onclick="topFunction()" id="movetop" class="bg-primary" title="Go to top">
    <span class="fa fa-angle-up"></span>
    </button>
    <script>
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
    scrollFunction()
    };

    function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("movetop").style.display = "block";
        } else {
            document.getElementById("movetop").style.display = "none";
        }
    }

    // When the user clicks on the button, scroll to the top of the document
    function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
    </script>
    <!-- /move top -->

    <script src="{{ asset ('assets/backend/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ asset ('assets/backend/js/jquery-1.10.2.min.js') }}"></script>
    <!-- chart js -->
    {{-- <script src="{{ asset ('assets/backend/js/Chart.min.js') }}"></script> --}}
    <script src="{{ asset ('assets/backend/js/utils.js') }}"></script>
    <!-- //chart js -->
    <!-- Different scripts of charts.  Ex.Barchart, Linechart -->
    <script src="{{ asset ('assets/backend/js/bar.js') }}"></script>
    <script src="{{ asset ('assets/backend/js/linechart.js') }}"></script>
    <!-- //Different scripts of charts.  Ex.Barchart, Linechart -->
    <script src="{{ asset ('assets/backend/js/jquery.nicescroll.js') }}"></script>
    <script src="{{ asset ('assets/backend/js/scripts.js') }}"></script>
    <script src="{{ asset ('assets/backend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset ('assets/backend/js/jquery.tagsinput-revisited.js') }}"></script>
    <script>
        var closebtns = document.getElementsByClassName("close-grid");
        var i;
        for (i = 0; i < closebtns.length; i++) {
            closebtns[i].addEventListener("click", function () {
                this.parentElement.style.display = 'none';
            });
        }
    </script>
    <!-- //close script -->

    <!-- disable body scroll when navbar is in active -->
    <script>
        $(function () {
            $('.sidebar-menu-collapsed').click(function () {
                $('body').toggleClass('noscroll');
            })
        });
    </script>
    <!-- disable body scroll when navbar is in active -->

    <!-- loading-gif Js -->
    <script src="{{ asset ('assets/backend/js/modernizr.js') }}"></script>
    <script>
        $(window).load(function () {
            // Animate loader off screen
            $(".se-pre-con").fadeOut("slow");;
        });
    </script>
    <!--// loading-gif Js -->

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset ('assets/backend/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset ('assets/backend/js/tinymce.min.js') }}"></script>
    {{-- text editor js--}}

    @stack('js');
    @stack('hs_delete_speech');
</body>

</html>
