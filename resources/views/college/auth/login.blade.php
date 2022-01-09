<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LogIn</title>
    <link rel="stylesheet" href="{{ asset('admins/css/college.css')}}">
    
</head>
<body>

<div class="wrapper">
  <div class="container">
    <div class="col-left">
      <div class="login-text">
        <h2>Welcome Back</h2>
        <h2>Login in to<br>College</h2>
      </div>
    </div>
    <div class="col-right">
      <div class="login-form">
        <h2>Login</h2>
        @if($mess=Session::get('success'))
            <div class="alert alert-success">
                {{ $mess }}
            </div>
        @endif
        <form action="{{ route('college.login')}}" method="POST" id="loginform">
        @csrf
          <p>
            <label>Email address</label>
            <input type="email" name="email" class="{{ $errors->has('email')?'is-invalid':'' }}"  placeholder="Email Address" value="{{ old('email') }}">
            @if($errors->has('email'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('email') }}</strong>
                </span>
            @endif
          </p>
          <p>
            <label>Password</label>
            <input type="password" name="password" class="{{ $errors->has('password')?'is-invalid':'' }}" id="userpassword" placeholder="password" value="{{ old('password') }}" >
            @if($errors->has('password'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
            @endif
          </p>
          <p>
            <input type="submit" value="Sing In" />
          </p>
        </form>
      </div>
    </div>
  </div>
  <div class="credit">
    <!-- Designed by <a href="#">HTML Codex</a> -->
  </div>
</div>
<script src="{{ asset('admins/libs/jquery/jquery.min.js')}}"></script>
        <script src="{{ asset('admins/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
        <script src="{{ asset('admins/libs/metismenu/metisMenu.min.js')}}"></script>
        <script src="{{ asset('admins/libs/simplebar/simplebar.min.js')}}"></script>
        <script src="{{ asset('admins/libs/node-waves/waves.min.js')}}"></script>
        <script src="{{ asset('admins/libs/waypoints/lib/jquery.waypoints.min.js')}}"></script>
        <script src="{{ asset('admins/libs/jquery.counterup/jquery.counterup.min.js')}}"></script>
        <script src="{{ asset('admins/js/app.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.2/jquery.validate.min.js"></script>
        <script>
            $("#loginform").validate({
                rules:{
                    'email':{
                        required:true
                    },
                    'password': {
                        required: true
                    }
                },
                messages:{
                    'email':{
                        required:'The email field is required.'
                    },
                    'password':{
                        required:'The Password field is required.'
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