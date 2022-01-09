$(document).ready(function () {

    //  From Validation and Ajax
    $("#frm_resetPassword").validate({
        errorClass:"text-danger", 
        rules: {
            'password': {required: true,minlength:8,pwcheck:true},
            'cpassword': {required: true,equalTo:"#passwordchage"},
        },
        messages: {
            'password': {
                required: "Password required",
                minlength:"Password minimum 8 character long",
                pwcheck:"Password should be least one Upper case,Lower case and digit"
            },
            'cpassword': {
                required: "Confirm password required",
                equalTo:"Password and confirm password should be same"
            }
        },
        submitHandler: function (form,event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_changePassword_post,
                type: "POST",
                data:new FormData(form),
                processData:false,
                contentType:false,
                cache:false,
                dataType: "json",
                beforeSend: function(){
                    $(document).find('.loader-icon').show();
                },
                success:function(res) {
                    $(document).find('.loader-icon').hide();
                    if(res.status){
                        $("#frm_resetPassword").trigger('reset');
                        flashMessage('success',res.message);
                        setTimeout(function(){
                            window.location.href= res.url;
                        },2000)
                    } else {
                        flashMessage('error',res.message);
                    }
                },
                compelete: function(){
                    $(document).find('.loader-icon').hide();
                },
                error: function(jqXHR, exception) {
                    $(document).find('.loader-icon').hide();
                    flashMessage('error',jqXHR.statusText);
                }
            });
        },
    });
    $.validator.addMethod("pwcheck", function(value) {
   return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
   });
});