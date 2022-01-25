<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Academics | Home 2</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('student/img/favicon.png')}}">
    <!-- Normalize CSS -->

    <link rel="stylesheet" href="{{ asset('student/css/normalize.css')}}">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/main.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/bootstrap.min.css')}}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/animate.min.css')}}">
    <!-- Font-awesome CSS-->
    <link rel="stylesheet" href="{{ asset('student/css/font-awesome.min.css')}}">
    <!-- Owl Caousel CSS -->
    <link rel="stylesheet" href="{{ asset('student/vendor/OwlCarousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('student/vendor/OwlCarousel/owl.theme.default.min.css')}}">
    <!-- Main Menu CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/meanmenu.min.css')}}">
    <!-- nivo slider CSS -->
    <link rel="stylesheet" href="{{ asset('student/vendor/slider/css/nivo-slider.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{ asset('student/vendor/slider/css/preview.css')}}" type="text/css" media="screen" />
    <!-- Datetime Picker Style CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/jquery.datetimepicker.css')}}">
    <!-- Magic popup CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/magnific-popup.css')}}">
    <!-- Switch Style CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/hover-min.css')}}">
    <!-- ReImageGrid CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/reImageGrid.css')}}">
        <!-- Nouislider Style CSS -->
    <link rel="stylesheet" href="{{ asset('student/vendor/noUiSlider/nouislider.min.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('student/css/style.css')}}">
    <!-- Modernizr Js -->
        <!-- selecttor css -->
    <link href="{{ asset('student/css/select2.min.css') }}" rel="stylesheet" type="text/css" />


    <link rel="stylesheet" href="{{ asset('student/css/custom.css')}}">
    
    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <script src="{{ asset('student/js/modernizr-2.8.3.min.js')}}"></script>
</head>

<body>

    <div id="preloader"></div>
    <div id="wrapper">
        @include('student-layout.header')
        <div class="main-content">

            @yield('content')
        </div>
        @include('student-layout.footer')

    </div>
    <!-- jquery-->
    <script src="{{ asset('student/js/jquery-2.2.4.min.js')}}" type="text/javascript"></script>
    <!-- Plugins js -->
    <script src="{{ asset('student/js/plugins.js')}}" type="text/javascript"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('student/js/bootstrap.min.js')}}" type="text/javascript"></script>
    <!-- WOW JS -->
    <script src="{{ asset('student/js/wow.min.js')}}"></script>
    <!-- Nivo slider js -->
    <script src="{{ asset('student/vendor/slider/js/jquery.nivo.slider.js')}}" type="text/javascript"></script>
    <script src="{{ asset('student/vendor/slider/home.js')}}" type="text/javascript"></script>
    <!-- Owl Cauosel JS -->
    <script src="{{ asset('student/vendor/OwlCarousel/owl.carousel.min.js')}}" type="text/javascript"></script>
    <!-- Meanmenu Js -->
    <script src="{{ asset('student/js/jquery.meanmenu.min.js')}}" type="text/javascript"></script>
    <!-- Srollup js -->
    <script src="{{ asset('student/js/jquery.scrollUp.min.js')}}" type="text/javascript"></script>
    <!-- jquery.counterup js -->
    <script src="{{ asset('student/js/jquery.counterup.min.js')}}"></script>
    <script src="{{ asset('student/js/waypoints.min.js')}}"></script>
    <!-- Countdown js -->
    <script src="{{ asset('student/js/jquery.countdown.min.js')}}" type="text/javascript"></script>
    <!-- Isotope js -->
    <script src="{{ asset('student/js/isotope.pkgd.min.js')}}" type="text/javascript"></script>
    <!-- Nouislider Js -->
    <script src="{{ asset('student/vendor/noUiSlider/nouislider.min.js')}}" type="text/javascript"></script>
    <!-- Magic Popup js -->
    <script src="{{ asset('student/js/jquery.magnific-popup.min.js')}}" type="text/javascript"></script>
    <!-- wNumb Js -->
    <script src="{{ asset('student/js/wNumb.js')}}" type="text/javascript"></script>

    <!-- Gridrotator js -->
    <script src="{{ asset('student/js/jquery.gridrotator.js')}}" type="text/javascript"></script>
    <!-- Custom Js -->
    <script src="{{ asset('student/js/main.js')}}" type="text/javascript"></script>
    <!-- selcter js -->
    <script src="{{ asset('student/js/select2.min.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    @stack('student-script')
</body>

</html>