@extends('student-layout.master')
<title>Student | Login</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Change Password</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Change Password</li>
            </ul>
        </div>
    </div>
</div>

<div class="section-space accent-bg">
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                <form class="form-horizontal" id="changepasswordform" method="post" action="{{ route('resetpassword')}}">
                    @csrf
                    <div class="profile-details tab-content">
                        <div class="tab-pane tab-item animated fadeIn show active" id="menu-1" role="tabpanel"
                            aria-labelledby="menu-1-tab">
                            <h3 class="title-section title-bar-high mb-40">Change Password</h3>
                            <div class="personal-info">
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Old Password Address</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" placeholder="old password"
                                            name="oldpassword" value="{{ old('oldpassword') }}">
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
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">New Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" placeholder="new password"
                                            name="newpassword" id="newpassword">
                                        @error('newpassword')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-3 control-label">Confirm Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" placeholder="confirm password"
                                            name="confirmpassword">
                                        @error('confirmpassword')
                                        <div class="alert alert-danger">
                                            {{ $message }}
                                        </div>
                                        @enderror
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
$("#changepasswordform").validate({
    rules: {
        'oldpassword': {
            required: true
        },
        'newpassword': {
            required: true
        },
        'confirmpassword': {
            required: true,
            equalTo: '#newpassword'
        }

    },
    messages: {
        'oldpassword': {
            required: 'The old password field is Required.'
        },
        'newpassword': {
            required: 'The new password field is  Required.'
        },
        'confirmpassword': {
            required: 'The confirm password field is  Required.',
            equalTo: 'confirm password does not match with new password'
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