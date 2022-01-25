<!doctype html>
<html lang="en">

<head>

    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesbrand" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('admins/images/favicon.png') }}">

    <!-- Sweet Alert-->
    <link href="{{ asset('admins/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('admins/css/bootstrap-dark.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('admins/css/custom.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />

    {{-- popupscss --}}
    <link href="{{ asset('admins/css/megnifitepopup.css') }}" rel="stylesheet" type="text/css" />

    {{-- wizard --}}

    <!-- Icons Css -->
    <link href="{{ asset('admins/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('admins/css/app-dark.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="{{ asset('admins/libs/twitter-bootstrap-wizard/prettify.css') }}">

    <link href="{{ asset('admins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('admins/datatables/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admins/datatables/custom_button.css') }}">
    <!-- selecttor css -->
    <link href="{{ asset('admins/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
    {{-- smscss --}}
    <link href="{{ asset('admins/css/sms.css') }}" rel="stylesheet" type="text/css" />

    {{-- //daterangepicker --}}
    <link href="{{ asset('admins/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" type="text/css" href="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <link href="http://kendo.cdn.telerik.com/2014.2.716/styles/kendo.common.min.css" rel="stylesheet" />
    <link href="http://kendo.cdn.telerik.com/2014.2.716/styles/kendo.default.min.css" rel="stylesheet" />


    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"> --}}

</head>


<body>

    <!-- <body data-layout="horizontal" data-topbar="colored"> -->

    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="spinner-border text-primary m-1" role="status">
                </div>
                <div class="spinner-border text-danger m-1" role="status">
                </div>
                <div class="spinner-border text-success m-1" role="status">
                </div>
            </div>
        </div>
    </div>

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('admin-layout.header')
        <!-- ========== Left Sidebar Start ========== -->

        <!-- Left Sidebar End -->
        @include('admin-layout.sidebar')

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



    <script src="{{ asset('admins/libs/jquery/jquery.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-3.0.0.min.js"></script>
    {{-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script> --}}

    {{-- //datetange --}}
    <script src="{{ asset('admins/js/datdepickermoment.min.js') }}"></script>
    <!-- JAVASCRIPT -->
    <script src="{{ asset('admins/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('admins/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('admins/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('admins/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('admins/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('admins/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset ('admins/libs/sweetalert2/sweetalert2.min.js')}}"></script>

    <!-- apexcharts -->
    <!-- <script src="{{ asset('admins/libs/apexcharts/apexcharts.min.js') }}"></script> -->

    <!-- <script src="{{ asset('admins/js/pages/dashboard.init.js') }}"></script> -->

    <script src="{{ asset('admins/js/app.js') }}"></script>
    <!-- selcter js -->
    <script src="{{ asset('admins/js/select2.min.js') }}"></script>

    {{-- popupcssmage --}}
    <script src="{{ asset('admins/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('admins/js/lightbox.init.js') }}"></script>


    <script src="{{ asset('admins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admins/datatables/dataTables.bootstrap4.min.js') }}"></script>



    <script src="http://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.2/js/toastr.min.js"></script>
    <script src="http://kendo.cdn.telerik.com/2014.2.716/js/kendo.ui.core.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>


    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

    {{-- //datepicker --}}
    <script src="{{ asset('admins/js/daterangepicker.js') }}"></script>

    <!-- twitter-bootstrap-wizard js -->
    <script src="{{ asset('admins/libs/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>

    <script src="{{ asset('admins/libs/twitter-bootstrap-wizard/prettify.js') }}"></script>

    <!-- form wizard init -->
    <script src="{{ asset('admins/js/pages/form-wizard.init.js') }}"></script>

    {{-- ckeditore --}}
    <script src="{{ asset('admins/ckeditor/ckeditor.js') }}"></script>


    @stack('admin-script')

</body>

</html>
