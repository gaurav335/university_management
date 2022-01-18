@extends('student-layout.master')
<title>Student | Update Profile</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Update Profile</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Update Profile</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Registration Page Area Start Here -->
<div class="registration-page-area">
    <div class="container">
        <h2 class="sidebar-title">Update Profile</h2>
        <div class="registration-details-area inner-page-padding">
            <form id="rag_update_form" method="post">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">User Name *</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">Date Of Birth *</label>
                            <input type="text" name="dob" id="dob" value="{{$user->dob}}" class="form-control"
                                placeholder="yy-mm-dd">
                            <span id="dobErrMsg"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="email">E-mail Address *</label>
                            <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="phone">Phone *</label>
                            <input type="number" name="contact_no" id="contact_no" value="{{$user->contact_no}}" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Adhaar Card No</label>
                        <input type="number" name="adhaar_card_no" value="{{$user->adhaar_card_no}}" id=""
                            class="form-control">
                        <span id="addarErrMsg"></span>
                    </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <div class="custom-select">
                                <select name="gender" class='select2'>
                                    <option>--Select Your Gender--</option>
                                    <option value="M" {{ $user->gender == 'M' ? 'selected' : '' }} >Male</option>
                                    <option value="F" {{ $user->gender == 'F' ? 'selected' : '' }}  >Female</option>
                                    <option value="O" {{ $user->gender == 'O' ? 'selected' : '' }}  >Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <textarea name="address" class="form-control" rows="5">{{$user->address}}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="pLace-order mt-30">
                            <button class="view-all-accent-btn disabled" id="submit" type="submit">Submit&nbsp;<i class="fa fa-spinner fa-spin loader" style="font-size:18px; display:none;"></i></button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@push('student-script')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
$(document).ready(function() {
    var maxBirthdayDate = new Date();
maxBirthdayDate.setFullYear( maxBirthdayDate.getFullYear() - 15 );
maxBirthdayDate.setMonth(11,31);
    $("#dob").datepicker({
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true,
        maxDate: maxBirthdayDate,
        yearRange: '1900:'+maxBirthdayDate.getFullYear(),
    });
});
$.validator.addMethod("Aadharcardno", function(value, element) {
    var aadhar = document.getElementById("Aadharcardno").value;
    var adharcardTwelveDigit = /^\d{12}$/;
    var adharSixteenDigit = /^\d{16}$/;
    if (aadhar != '') {
        if (aadhar.match(adharcardTwelveDigit)) {
            return true;
        } else if (aadhar.match(adharSixteenDigit)) {
            return true;
        } else {
            addarErrMsg.innerHTML = " ";
            return false;
        }
    }
});

$(document).ready(function() {
    $('#rag_update_form').validate({

        rules: {
            'name': {
                required: true
            },
            'email': {
                required: true,
                email: true,
            },
            'dob': {
                required: true,
            },
            'contact_no': {
                required: true,
                maxlength: 15,
                minlength: 10,
            },
            'gender': {
                required: true
            },
            'adhaar_card_no': {
                required: true,
            },
            'address': {
                required: true
            },
        },
        messages: {
            'name': {
                required: 'The Course name is required'
            },
            'contact_no': {
                required: 'The Contact No is required',
                maxlength: "Please Enter Maximum 15 number!",
                minlength: "Please Enter Maximum 10 number!",
            },
            'email': {
                required: 'The Email Address is required',
                email: "Email must have valid format",
            },
            'dob': {
                required: 'The Date Of Birth is required',
            },
            'password': {
                required: 'The Password is required',
                pwcheck: "Password must contain one capital letter,one numerical and one special character",
                minlength: "Please Enter Minimim 8 Character!"
            },
            'gender': {
                required: 'The Gender is required'
            },
            'adhaar_card_no': {
                required: 'The Adhaar Card No is required',
            },
            'address': {
                required: 'The Address is required'
            },
        },
        submitHandler: function(form) {
            ragupdateForm(form);
        },
        highlight: function highlight(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function unhighlight(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }

    });

    function ragupdateForm(form) {
        $('.text-strong').html('');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: 'post',
            url: '{{ route("updateprofile") }}',
            contentType: false,
            processData: false,
            data: new FormData(form),
            beforeSend:function(msg){
                $(document).find('.loader').show();
            },
            success: function(res) {
                if (res == 1) {
                    var $toast = toastr.success("Your Your Profile Update Successfully!");
                    setTimeout(function() {
                        $toast.fadeOut(4000);
                        location.reload();
                    }, 5000)
                }
            },
            error: function(response) {

                $.each(response.responseJSON.errors, function(field_name, error) {

                    $('[name=' + field_name + ']').after(
                        '<span class="text-strong" style="color:red">' + error +
                        '</span>')
                })
            }

        })
    }
});
</script>
@endpush