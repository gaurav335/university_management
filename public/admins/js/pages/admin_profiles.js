// Login
$("#js-validation-adminLogin").validate({
    rules: {
        email: {
            required: true,
            email: true
        },
        password: {
            required: true,
        }
    },
    messages: {
        email: {
            required: "Please enter email"
        },
        password: {
            required: "Please enter password",
        }
    },
    errorElement: "p",
    errorPlacement: function (error, element) {
        // Add the `help-block` class to the error element
        error.addClass("help-block");
        if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
        } else {
            error.insertAfter(element);
        }
    },
    highlight: function (element, errorClass, validClass) {
        $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
    }
});

// Update Profile
$("#js-validation-adminProfile").validate({
    rules: {
        username:{
            required:true
        },
        name: {
            required: true
        },
        contact: {
            required: true,
            number: true,
            minlength:8,
            maxlength:10,
        }
    },
    messages: {
        username:{
            required:"Please enter username"
        },
        name: {
            required: "Please enter name"
        },
        contact: {
            required: "Please enter phone number",
            number: "Please enter valid phone number"
        }
    },
    errorElement: "span",
    errorPlacement: function (error, element) {
        // Add the `help-block` class to the error element
        error.addClass("help-block");
        if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
        } else {
            error.insertAfter(element);
        }
    },
    highlight: function (element, errorClass, validClass) {
        $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
    }
});


// Change Password
$("#js-validation-change-password").validate({
    rules: {
        old_password: {
            required: true,
        },
        new_password: {
            required: true,
        },
        confirm_new_password: {
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
        },
        confirm_new_password: {
            required: "Please enter confirm password",
            confirmpassword: "Please enter Confirm Password Same as Password"

        }
    },
    errorElement: "p",
    errorPlacement: function (error, element) {
        // Add the `help-block` class to the error element
        error.addClass("help-block");
        if (element.prop("type") === "checkbox") {
            error.insertAfter(element.parent("label"));
        } else {
            error.insertAfter(element);
        }
    },
    highlight: function (element, errorClass, validClass) {
        $(element).parents(".form-group").addClass("has-error").removeClass("has-success");
    },
    unhighlight: function (element, errorClass, validClass) {
        $(element).parents(".form-group").addClass("has-success").removeClass("has-error");
    }
});