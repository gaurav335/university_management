<!doctype html>
<html lang="en">

    <head>

        <meta charset="utf-8" />
    <title>College | Change PAasword</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}">

        <!-- Bootstrap Css -->
        <link href="{{ asset('admins/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
        <!-- Icons Css -->
        <link href="{{ asset('admins/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
        <!-- App Css-->
        <link href="{{ asset('admins/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    </head>


    <body class="authentication-bg">

        <div class="home-btn d-none d-sm-block">
            <a href="index.html" class="text-dark"><i class="mdi mdi-home-variant h2"></i></a>
        </div>
        <div class="account-pages my-5  pt-sm-5">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div>

                            <a href="index.html" class="mb-5 d-block auth-logo">
                                <img src="assets/images/logo-dark.png" alt="" height="22" class="logo logo-dark">
                                <img src="assets/images/logo-light.png" alt="" height="22" class="logo logo-light">
                            </a>
                            <div class="card">

                                <div class="card-body p-4">

                                    <div class="text-center mt-2">
                                        <h5 class="text-primary">College Reset Password</h5>
                                    </div>
                                    <div class="p-2 mt-4">

                                        <form action="{{ route('college.resetpassword') }}" method="POST" id="changepasswordform">
                                            @csrf
                                            <div class="form-group">
                                                <label for="useremail">Old Password</label>
                                                <input type="password" class="form-control"  placeholder="old password" name="oldpassword" value="{{ old('oldpassword') }}">
                                                    @error('oldpassword')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                                    @if($mess=Session::get('danger'))
                                                        <div class="alert alert-danger">
                                                            {{$mess}}
                                                        </div>
                                                    @endif
                                            </div>

                                            <div class="form-group">
                                                <label for="useremail">New Password</label>
                                                <input type="password" class="form-control"  placeholder="new password" name="newpassword" id="newpassword">
                                                  @error('newpassword')
                                                        <div class="alert alert-danger">
                                                            {{ $message }}
                                                        </div>
                                                    @enderror
                                            </div>

                                            <div class="form-group">
                                                <label for="useremail">Confirm Password</label>
                                                <input type="password" class="form-control"  placeholder="confirm password" name="confirmpassword">
                                                @error('confirmpassword')
                                                         <div class="alert alert-danger">
                                                             {{ $message }}
                                                         </div>
                                                     @enderror
                                            </div>

                                            <div class="mt-3 text-right">
                                                <button class="btn btn-primary w-sm waves-effect waves-light" type="submit">Reset</button>
                                            </div>



                                        </form>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>

         <script src="{{ asset('admins/libs/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('admins/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('admins/libs/metismenu/metisMenu.min.js') }}"></script>
        <script src="{{ asset('admins/libs/simplebar/simplebar.min.js') }}"></script>
        <script src="{{ asset('admins/libs/node-waves/waves.min.js') }}"></script>
        <script src="{{ asset('admins/libs/waypoints/lib/jquery.waypoints.min.js') }}"></script>
        <script src="{{ asset('admins/libs/jquery.counterup/jquery.counterup.min.js') }}"></script>

        <script src="{{ asset('admins/js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>

        <script>
            $("#changepasswordform").validate({
                rules:{
                    'oldpassword':{
                        required:true
                    },
                    'newpassword': {
                        required: true
                    },
                    'confirmpassword': {
                        required: true,
                        equalTo:'#newpassword'
                    }

                },
                messages:{
                    'oldpassword':{
                        required:'The old password field is Required.'
                    },
                    'newpassword':{
                        required:'The new password field is  Required.'
                    },
                     'confirmpassword':{
                        required:'The confirm password field is  Required.',
                        equalTo:'confirm password does not match with new password'
                    }
                },
                highlight: function highlight(element, errorClass, validClass) {
                    $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
                },
                unhighlight: function unhighlight(element, errorClass, validClass) {
                    $(element).parents(".error").removeClass(errorClass).addClass(validClass);
                }
             });
        </script>
    </body>
</html>
