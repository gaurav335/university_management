@extends('student-layout.master')
<title>Student | Login</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Login</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Login</li>
            </ul>
        </div>
    </div>
</div>

<div class="section-space accent-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <form class="form-horizontal" id="loginform" method="post" action="{{ route('login')}}">
                    @csrf
                    <div class="profile-details tab-content">
                        <div class="tab-pane tab-item animated fadeIn show active" id="menu-1" role="tabpanel"
                            aria-labelledby="menu-1-tab">
                            <h3 class="title-section title-bar-high mb-40">Login</h3>
                            <div class="personal-info">
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Email Address</label>
                                    <div class="col-md-9">
                                        <input type="email" name="email" id="email"
                                            class="form-control {{ $errors->has('email')?'is-invalid':'' }}"
                                            placeholder="Email Address" value="{{ old('email') }}">
                                        @if($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Password</label>
                                    <div class="col-md-9">
                                        <input type="password" name="password"
                                            class="form-control {{ $errors->has('password')?'is-invalid':'' }}"
                                            id="userpassword" placeholder="password" value="{{ old('password') }}">
                                        @if($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group row mb-none">
                                    <div class="offset-md-3 col-md-9">
                                        <button class="view-all-accent-btn disabled col-md-9" type="submit"
                                            value="Login">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@push('student-script')
<script>
$("#loginform").validate({
    rules: {
        'email': {
            required: true,
        },
        'password': {
            required: true,
        },
    },
    messages: {
        'email': {
            required: 'The email field is required.',
        },
        'password': {
            required: 'The Password field is required.',
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
@endpush