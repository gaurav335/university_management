$(document).ready(function () {

    // Save  Address
    $("#frm_refferal").validate({
        errorClass: "text-danger",
        errorElement: 'div',
        errorLabelContainer: '.errorTxt',
        rules: {
            'email': {required: true, email: true},
        },
        messages: {
            'email': {
                required: "Email required",
                email: "Email must have valid format",
            },
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_invite_friend,
                type: "POST",
                data: {email: $('#email').val()},
                dataType: "json",
                beforeSend: function () {
                    $(document).find('.loader-icon').show();
                },
                success: function (res) {
                    $(document).find('.loader-icon').hide();
                    if (res.status) {
                        window.location.reload();
                        flashMessage('success', res.message);
                        $("#frm_refferal").trigger('reset');
                    } else {
                        flashMessage('error', res.message);
                    }
                },
                compelete: function () {
                    $(document).find('.loader-icon').hide();
                },
                error: function (jqXHR, exception) {
                    $(document).find('.loader-icon').hide();
                    flashMessage('error', jqXHR.statusText);
                }
            });
        }
    });

    $('.copyref1').click(function ()
    {
//        $(".copyref1").text($(".copyref1").text() === "Copy" ? "Copied" : "Copy");
        $('.copyref1').text('Copied');
        $('.copyref2').text('Copy');


    });

    $('.copyref2').click(function ()
    {
        $('.copyref1').text('Copy');
        $('.copyref2').text('Copied');
    });

});
 