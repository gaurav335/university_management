<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
        <title>Dashboard</title>
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('admins/images/favicon.png') }}">

        <!-- Bootstrap Css -->
          <!-- Bootstrap Css -->
        <link href="{{asset('admins/css/bootstrap.min.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <link href="{{asset('admins/css/custom.css')}}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{asset('admins/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{asset('admins/css/app.min.css')}}" id="app-style" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="{{asset('admins/libs/twitter-bootstrap-wizard/prettify.css')}}">

        <link href="{{ asset('admins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
        <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
        <link href="http://kendo.cdn.telerik.com/2014.2.716/styles/kendo.common.min.css" rel="stylesheet" />
        <link href="http://kendo.cdn.telerik.com/2014.2.716/styles/kendo.default.min.css" rel="stylesheet" />

        <!-- <link rel="stylesheet" type="text/css" href="{{ asset('storage/chat/mailing-chat.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('storage/chat/custom.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('js/college/daterangepicker.css') }}"> -->
    </head>
    <body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="spinner-grow text-primary m-1" role="status">
                </div>
                <div class="spinner-grow text-danger m-1" role="status">
                </div>
                <div class="spinner-grow text-success m-1" role="status">
                </div>
            </div>
        </div>
    </div>
        <!-- Begin page -->
        <div id="layout-wrapper">


            @include('college-layout.header')
            <!-- ========== Left Sidebar Start ========== -->

            <!-- Left Sidebar End -->
            @include('college-layout.sidebar')

            <!-- Left Sidebar End -->
            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                @yield('content')
                <!-- End Page-content -->
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->

        <!-- /Right-bar -->

        <!-- Right bar overlay-->
        <div class="rightbar-overlay"></div>

        <!-- JAVASCRIPT -->
        <script src="{{ asset('admins/libs/jquery/jquery.min.js')}}"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
        <script src="{{ asset('admins/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admins/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('admins/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('admins/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{ asset('admins/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('admins/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>

        <!-- apexcharts -->
        <!-- <script src="{{ asset('admins/libs/apexcharts/apexcharts.min.js')}}"></script> -->

        <!-- <script src="{{ asset('admins/js/pages/dashboard.init.js')}}"></script> -->

        <script src="{{ asset('admins/js/app.js')}}"></script>
        <script src="{{ asset('admins/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admins/datatables/dataTables.bootstrap4.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

        <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
        <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
        <script src="http://kendo.cdn.telerik.com/2014.2.716/js/kendo.ui.core.min.js"></script>

        <!-- <script  src="{{ asset('js/college/moment-with-locales.min.js') }}"></script> -->
        <!-- <script src="{{ asset('js/college/daterangepicker.js') }}"></script> -->

        <!-- twitter-bootstrap-wizard js -->
        <script src="{{ asset('admins/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>

        <script src="{{ asset('admins/libs/twitter-bootstrap-wizard/prettify.js')}}"></script>

        <!-- form wizard init -->
        <script src="{{asset('admins/js/pages/form-wizard.init.js')}}"></script>
        @stack('college-script')
    </body>

</html>

            <!-- Start right Content here -->
