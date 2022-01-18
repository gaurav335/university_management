@extends('student-layout.master')
<title>Student | Ragistrtion</title>
@section('content')
<div class="inner-page-banner-area" style="background-image: url('student/img/banner/5.jpg');">
    <div class="container">
        <div class="pagination-area">
            <h1>Registration</h1>
            <ul>
                <li><a href="{{ route('home')}}">Home</a> -</li>
                <li>Registration</li>
            </ul>
        </div>
    </div>
</div>
<!-- Inner Page Banner Area End Here -->
<!-- Registration Page Area Start Here -->
<div class="registration-page-area">
    <div class="container">
        <h2 class="sidebar-title">Registration</h2>
        <div class="registration-details-area inner-page-padding">
            <form id="rag_form" method="post">
                @csrf
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">User Name *</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">Date Of Birth *</label>
                            <input type="text" name="dob" id="dob"  class="form-control" placeholder="yy-mm-dd">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="email">E-mail Address *</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="phone">Phone *</label>
                            <input type="number" name="contact_no" id="contact_no" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label" for="first-name">Password *</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Gender</label>
                            <div class="custom-select">
                                <select name="gender" class='select2'>
                                    <option>--Select Your Gender--</option>
                                    <option value="M">Male</option>
                                    <option value="F">Female</option>
                                    <option value="O">Other</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                    <div class="form-group">
                        <label class="control-label">Adhaar Card No</label>
                        <input type="number" name="adhaar_card_no" id="Aadharcardno"
                            class="form-control">
                        <span id="addarErrMsg"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="control-label">Address</label>
                            <textarea name="address" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="pLace-order mt-30">
                            <button class="view-all-accent-btn disabled" id="submit_btn" type="submit">Submit&nbsp;<i class="fa fa-spinner fa-spin loader" style="font-size:18px; display:none;"></i></button>
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
    //show password
$('#check').click(function() {
    if (document.getElementById('check').checked) {
        $('#password').get(0).type = 'text';
    } else {
        $('#password').get(0).type = 'password';
    }
});

//strong Password
$.validator.addMethod("pwcheck", function(value, element) {
    return this.optional(element) || /^(?=.*\d)(?=.*[A-Z])(?=.*\W).*$/i.test(value);
});


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
    $('#rag_form').validate({

        rules: {
            'name': {
                required: true
            },
            'email': {
                required: true,
                email: true,
                remote: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url: "{{ route('checkstudentemail') }}",
                    type: "POST",
                    data: {
                        email: function() {
                            return $("#email").val();
                        }
                    }
                },
            },
            'dob': {
                required: true,
            },
            'contact_no': {
                required: true,
                maxlength: 15,
                minlength: 10,
                remote: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    },
                    url: "{{ route('checkstudentphone') }}",
                    type: "POST",
                    data: {
                        email: function() {
                            return $("#contact_no").val();
                        }
                    }
                },
            },
            'password': {
                required: true,
                pwcheck: true,
                minlength: 8,
            },
            'gender': {
                required: true
            },
            'adhaar_card_no': {
                required: true,
                Aadharcardno: true,
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
                remote: "Contact No already register"
            },
            'email': {
                required: 'The Email Address is required',
                email: "Email must have valid format",
                remote: "Email already register"
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
                Aadharcardno: 'Enter valid Aadhar Number'
            },
            'address': {
                required: 'The Address is required'
            },
        },
        submitHandler: function(form) {
            ragForm(form);
        },
        highlight: function highlight(element, errorClass, validClass) {
            $(element).parents("div.form-control").addClass(errorClass).removeClass(validClass);
        },
        unhighlight: function unhighlight(element, errorClass, validClass) {
            $(element).parents(".error").removeClass(errorClass).addClass(validClass);
        }

    });

    function ragForm(form) {
        $('.text-strong').html('');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            type: 'post',
            url: '{{ route("studentrag") }}',
            contentType: false,
            processData: false,
            data: new FormData(form),
            beforeSend:function(msg){
                $(document).find('.loader').show();
                $('#submit_btn').attr('disabled', true);
            },
            success: function(res) {
                if (res == 1) {
                    var $toast = toastr.success("Your Ragistration Has been Successfully!");
                    setTimeout(function() {
                        $toast.fadeOut(4000);
                        window.location = "../";
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