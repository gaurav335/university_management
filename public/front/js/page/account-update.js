$(document).ready(function () {
    jQuery.validator.addMethod("noSpace", function(value, element) { 
        return value.indexOf(" ") < 0 && value != ""; 
      }, "No space please and don't leave it empty");
    // Add Customer From Validation and Ajax
    $("#edit-profile").validate({
        errorClass:"text-danger", 
        rules: {
            'email': {
                required: true,
                email:true,
                remote: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url_checkemail,
                    type: "post",
                    data: {
                        email: function() {
                            return $( "#email" ).val();
                        }
                    }

                } 
            },
            'name': {required: true,minlength:2,maxlength:20,noSpace:true},
            'last_name': {required: true,minlength:2,maxlength:20,noSpace:true},
            'phone': {required: true,
                remote: {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url_checkmobile,
                    type: "post",
                    data: {
                        phone: function() {
                            return $( "#phone" ).val();
                        }
                    }

                },
                minlength:8,
                maxlength:10,
                number: true
            },
        },
        messages: {
            'name': {
                required: "First name required",
                minlength: "Minimum 2 char. long last name",
                maxlength: "Maximum 20 char. long last name"
            },
            'last_name': {
                required: "Last name required",
                minlength: "Minimum 2 char. long last name",
                maxlength: "Maximum 20 char. long last name"
            },
            'email': {
                required: "Email required",
                email:"Email must have valid format",
                remote:"Email already register"
            },
            'phone': {
                required: "Mobile number required",
                remote:"Mobile number already register"
            }, 
        },
    });
    // $(document).on('keyup', '#zone_area_id', function () {

    //     if ($(this).val().length >= 2) {
    //         $("#zone_area_id").autocomplete({
    //             source: function (request, response) {
    //                 $.ajax({
    //                     url: BASE_URL + "location",
    //                     type: 'post',
    //                     dataType: "json",
    //                     data: {keyword: $("#zone_area_id").val()},
    //                     success: function (data) {
    //                         response(data);
    //                     }
    //                 });
    //             },
    //             select: function (event, ui) {
    //                 console.log(ui.item.label);
    //                 $("#zone_area_id").val(ui.item.label);
    //                 $('#postcode').val(ui.item.value);
    //                 return false;
    //             },
    //             search: function (e, u) {
    //                 $(document).find('.loader-icon').show();
    //             },
    //             response: function (e, u) {
    //                 $(document).find('.loader-icon').hide();
    //             }
    //         });
    //     }
    // });
});