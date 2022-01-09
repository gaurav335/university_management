$(document).ready(function () {

    // change password From Validation and Ajax
    $("#change-password").validate({
        errorClass:"text-danger", 
        rules: {
            old_password: {
                required: true,
            },
            new_password: {
                required: true,
                minlength:8,
                pwcheck:true
            },
            confirm_password: {
                required: true,
                equalTo: "#new_password"
            }
        },
        messages: {
            old_password: {
                required: "Please enter old password"
            },
            new_password: {
                required: "Please enter new password",
                minlength:"Password minimum 8 character long",
                pwcheck:"Password should be least one Upper case,lower case and digit"
            },
            confirm_password: {
                required: "Please enter confirm password",
                confirmpassword: "Please enter confirm password Same as Password"

            }
        },
    });
    $.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
   })   
});

$('#notification-check').change(function () {
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_setting,
        dataType: "json",
        type: "PUT",
        data: '',
        success: function (data) {
            if (data.status == true) {
                flashMessage('success',data.message);
            } else {
                flashMessage('success',data.message);
            }
        },
        compelete: function () {

        }
    });
});