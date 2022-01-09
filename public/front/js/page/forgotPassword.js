$(document).ready(function () {

    // Login Customer From Validation and Ajax
    $("#frm_forgotPassword").validate({
        errorClass:"text-danger", 
        rules: {
            'email': {
                required: true,
                email:true,
            }
        },
        messages: {
            'email': {
                required: "Email required",
                email:"Email must have valid format",
            }
        },
        submitHandler: function (form,event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_forgotPassword,
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
                        // window.location.href=res.url;
                        flashMessage('success',res.message);
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


});