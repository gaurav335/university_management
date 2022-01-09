$(document).ready(function () {

    // Login Customer From Validation and Ajax
    $("#contact_us_frm").validate({
        errorClass:"text-danger", 
        rules: {
            'first_name' :{
                required: true,minlength:4 , lettersonly: true
            },
            'last_name' :{
                required: true,minlength:4 , lettersonly: true,
            },
            'email': {
                required: true,
                email:true,
            },
            'subject':{
                required:true
            },
            'message':{
                required:true,minlength:10 ,
            }
        },
        messages: {
            'first_name' :{
                required: "First name is required",
                 lettersonly: "First name only allow alphabets",
            },
            'last_name' :{
                required: "Last name is required",
                lettersonly: "Last name only allow alphabets",
            },
            'email': {
                required: "Email is required",
            },
            'subject':{
                required:"Subject is required"
            },
            'message':{
                required:" Message is required",
                lettersonly: "Only allow alphabets",
            }
        },
        submitHandler: function (form,event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_contactUs_post,
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
                        $("#contact_us_frm").trigger('reset');
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
                    $.each(jqXHR.responseJSON.error, function (field_name, error) {
                        flashMessage('error', error);
                    });
                }
            });
        },
    });
});


$.validator.addMethod("lettersonly", function (value, element) {
     return this.optional(element) || /^[a-z\s]+$/i.test(value);
})