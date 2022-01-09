$(document).ready(function () {

    // Login Customer From Validation and Ajax
    $("form[data-form-validate='true']").each(function() {

        $(this).validate({
            errorClass: "text-danger",
            rules: {
                'email': {
                    required: true,
                    email: true,
                    remote: {
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url_GuestCheckEmail,
                        type: "post",
                        data: {
                            email: function () {
                                return $("#email").val();
                            }
                        }
    
                    }
                },
                'postcode': { required: true },
                'zipcode': { required: true },
            },
            messages: {
                'email': {
                    required: "Email is required",
                    email: "Email must have valid format",
                    remote: "Email already register"
                },
                'postcode': {
                    required: "Zipcode is required",
                },
                'zipcode': {
                    required: "This field is required",
                }
            },
            submitHandler: function (form, event) {
                event.preventDefault();
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url_guestLogin,
                    type: "POST",
                    data: new FormData(form),
                    processData: false,
                    contentType: false,
                    cache: false,
                    dataType: "json",
                    beforeSend: function () {
                        $(document).find('.loader-icon').show();
                    },
                    success: function (res) {
                        $(document).find('.loader-icon').hide();
                        if (res.status) {
                            window.location.href = res.url;
                        } else {
                            flashMessage('error', res.message);
                        }
                    },
                    compelete: function () {
                        $(document).find('.loader-icon').hide();
                    },
                    error: function (jqXHR, exception) {
                        $(document).find('.loader-icon').hide();
                        $.each(jqXHR.responseJSON.error, function (field_name, error) {
                            flashMessage('error', error);
                        });
                    }
                });
            },
        });
});
    
   
    $("#guest_loginmo").validate({
        errorClass: "text-danger",
        rules: {
            'email': {
                required: true,
                email: true,

            },
            'address': { required: true },
        },
        messages: {
            'email': {
                required: "Email is required",
                email: "Email must have valid format",
            },
            'zipcode': {
                required: "Zipcode is required",
            }
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            $.ajax({
                url: BASE_URL + "guestLogin",
                type: "POST",
                data: new FormData(form),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function () {
                    $(document).find('.loader-icon').show();
                },
                success: function (res) {
                    $(document).find('.loader-icon').hide();
                    if (res.status) {
                        window.location.href = res.url;
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
        },
    });

    $(document).on('keyup', '.location_search1', function () {
        $this = $(this);
        if ($(this).val().length >= 2) {
            $(".location_search1").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: url_location,
                        type: 'post',
                        dataType: "json",
                        data: { keyword: $this.val() },
                        beforeSend: function () {

                        },
                        success: function (data) {
                            response(data);
                        }
                    });
                },
                select: function (event, ui) {
                    $this.val(ui.item.label);
                    $this.parent().find('.postcode1').val(ui.item.value);
                    $this.parent().find('.code').val(ui.item.postcode);
                    return false;
                },
                search: function (e, u) {
                    $(document).find('.loader-icon').show();
                },
                response: function (e, u) {
                    $(document).find('.loader-icon').hide();
                }
            });
        }
    });
    $("#subscribeform").validate({
        errorClass: "text-danger",
        rules: {
            'email': {
                required: true,
                email: true,
            },
        },
        messages: {
            'email': {
                required: "Email is required",
                email: "Email must have valid format",
            },
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_subscribe_email,
                type: "POST",
                data: new FormData(form),
                processData: false,
                contentType: false,
                cache: false,
                dataType: "json",
                beforeSend: function () {
                    $(document).find('.loader-icon').show();
                },
                success: function (res) {
                    $(document).find('.loader-icon').hide();
                    if (res.status) {
                        $("#subscribeform").trigger('reset');
                        $("#subscriptionModal").modal('hide');
                        flashMessage('success', res.message);
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
        },
    });
});
