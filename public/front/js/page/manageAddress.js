$(document).ready(function () {

    // Save  Address
    $("#saveAddress").validate({
        errorClass: "text-danger",
        rules: {
            'type': { required: true },
            'first_name': { required: true, lettersonly: true, minlength: 4 },
            'last_name': { required: true, lettersonly: true, minlength: 4 },
            'mobile': {
                required: true, minlength: 8,
                maxlength: 10, number: true
            },
            'email': { required: true, email: true },
            'address1': { required: true, minlength: 5 },
            'city': { required: true, minlength: 3 },
            'postcode': { required: true, number: true, minlength: 4 },
            'state': { required: true, minlength: 3 },
            'country': { required: true },
        },
        messages: {
            'type': {
                required: "Delivery address title required",
            },
            'first_name': {
                lettersonly: "First name only allow alphabets",
                required: "First name required",
                minlength: "Minimum 4 char. long last name",
                maxlength: "Maximum 20 char. long last name"
            },
            'last_name': {
                lettersonly: "Last name only allow alphabets",
                required: "Last name required",
                minlength: "Minimum 4 char. long last name",
                maxlength: "Maximum 20 char. long last name"
            },
            'email': {
                required: "Email required",
                email: "Email must have valid format",
            },
            'mobile': {
                required: "Mobile number required",
            },
            'address1': {
                required: "Address line 1 required",
            },
            'city': {
                required: "City required",
                lettersonly: "Only allow alphabets",
            },
            'postcode': {
                required: "Postcode required",
            },
            'state': {
                required: "State required",
                lettersonly: "Only allow alphabets",
            },
            'country': {
                required: "Country required",
            },
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            var method = $("#updateMethod").val() != "" ? 'PUT' : 'POST';
            var url_url = $("#updateMethod").val() != "" ? url_manage_address :url_manage_address_post;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_url,
                type: method,
                data: $("#saveAddress").serialize(),
                dataType: "json",
                beforeSend: function () {
                    $(document).find('.loader-icon').show();
                },
                success: function (res) {
                    $(document).find('.loader-icon').hide();
                    if (res.status) {
                        flashMessage('success', res.message);
                        $("#saveAddress").trigger('reset');
                        $("#updateMethod").removeAttr('name').val('');
                        window.location.reload();
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
    $('.address-toggle-btn').on('click', function () {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_profileInfo,
            type: "POST",
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $("#saveAddress").trigger('reset');
                $("#updateMethod").removeAttr('name').val('');
                $("#is_primary").removeAttr('checked')
                $("#title").html('Add');
                $(".add-address-sidebar").toggleClass("active");
                $('#first_name').val(res.profile.name);
                $('#last_name').val(res.profile.last_name);
                $('#email').val(res.profile.email);
                $('#mobile').val(res.profile.phone);
                $(".address-overlay").toggleClass("active");
                $(document).find('.loader-icon').hide();
            },
            compelete: function () {
                $(document).find('.loader-icon').hide();
            },
        });
    });

    $('.address-toggle-btn-edit').on('click', function () {
        $("#saveAddress").trigger('reset');
        $("#is_primary").removeAttr('checked')
        $id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_manageAddress_patch,
            type: "PATCH",
            data: { id: $id },
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                if (res.status) {
                    $("#updateMethod").val($id).attr('name', 'PUT');
                    $("#type").val(res.data.type);
                    $("#first_name").val(res.data.first_name);
                    $("#last_name").val(res.data.last_name);
                    $("#mobile").val(res.data.mobile);
                    $("#email").val(res.data.email);
                    $("#address1").val(res.data.address1);
                    $("#address2").val(res.data.address2);
                    $("#postcode").val(res.data.postcode);
                    $("#city").val(res.data.city);
                    $("#state").val(res.data.state);
                    $("#country").val(res.data.country);

                    $("#longitude").val(res.data.longitude);
                    $("#latitude").val(res.data.latitude);

                    if (res.data.is_primary == 1) {
                        $("#is_primary").attr('checked', 'checked');
                    }
                    $(document).find('.loader-icon').hide();
                    $("#title").html('Update');
                    $(".add-address-sidebar").toggleClass("active");
                    $(".address-overlay").toggleClass("active");
                } else {
                    $(document).find('.loader-icon').hide();
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

    });
    $('.delete-address').on('click', function () {

        if (confirm('are want to sure delete delivery Address ?')) {
            $id = $(this).data('id');
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_manageAddress_delete,
                type: "DELETE",
                data: { id: $id },
                dataType: "json",
                beforeSend: function () {
                    $(document).find('.loader-icon').show();
                },
                success: function (res) {
                    if (res.status) {
                        window.location.reload();
                        $(document).find('.loader-icon').hide();

                    } else {
                        $(document).find('.loader-icon').hide();
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
    $(document).on('click', '.viewProductDetails', function (e) {
        console.log("call");
        e.preventDefault();
        $.ajax({
            url: BASE_URL + "get-product",
            type: "POST",
            data: { nodeId: $(this).attr('data', 'node') },
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
    });

    $(document).on('click', '.today', function (e) {
        e.preventDefault();
        $("#deliveryDate").val($(this).data('id'));
        $('.all-time').addClass('hide');
        $('.today-time').removeClass('hide');
        $('.today-time').addClass('show');
        if ($('.today-time').hasClass('show')) {
            var DeliveryTime = $("input[name='customRadios']:checked").val();
            var DeliveryId = $("input[name='customRadios']:checked").data('id');
            var DeliveryCharge = $("input[name='customRadios']:checked").data('delivery-charge');
            $("#deliveryTime").val('');
            $("#deliveryTime").val(DeliveryTime);
            $("#deliveryId").val('');
            $("#deliveryId").val(DeliveryId);
            $("#deliveryCharge").html('');
            if (DeliveryCharge == 0 || DeliveryCharge == undefined) {
                var DeliveryCharge = 0;
                $('#deliveryCharge').html('$ 0.00');
            } else {
                $('#deliveryCharge').html('$ ' + (DeliveryCharge).toFixed(2));
            }
            getTotalDiscount();
        }
    });
    $(document).on('click', '.all', function (e) {
        e.preventDefault();
        $("#deliveryDate").val($(this).data('id'));
        $('.all-time').addClass('hide');
        $('.today-time').addClass('hide');
        $('#deliveryTimeShow' + $(this).data('day')).addClass('show').removeClass('hide');
        if ($('#deliveryTimeShow' + $(this).data('day')).hasClass('show')) {
            var name = 'customRadio_' + $(this).data('day');
            var DeliveryTime = $("input[name=" + name + "]:checked").val();
            var DeliveryId = $("input[name=" + name + "]:checked").data('id');
            var DeliveryCharge = $("input[name=" + name + "]:checked").data('delivery-charge');
            $("#deliveryTime").val('');
            $("#deliveryTime").val(DeliveryTime);
            $("#deliveryId").val('');
            $("#deliveryId").val(DeliveryId);
            $("#deliveryCharge").html('');
            if (DeliveryCharge == 0 || DeliveryCharge == undefined) {
                var DeliveryCharge = 0;
                $('#deliveryCharge').html('$ 0.00');
            } else {
                $('#deliveryCharge').html('$ ' + (DeliveryCharge).toFixed(2));
            }
            getTotalDiscount();
        }

    });
});

$(document).ready(function (e) {

    $('.today-time').removeClass('hide');
    $('.today-time').addClass('show');
    if ($('.today-time').hasClass('show')) {
        var DeliveryTime = $("input[name='customRadios']:checked").val();
        var DeliveryId = $("input[name='customRadios']:checked").data('id');
        var DeliveryCharge = $("input[name='customRadios']:checked").data('delivery-charge');
        $("#deliveryTime").val('');
        $("#deliveryTime").val(DeliveryTime);
        $("#deliveryId").val('');
        $("#deliveryId").val(DeliveryId);
        $("#deliveryCharge").html('');
        if (DeliveryCharge == 0 || DeliveryCharge == undefined) {
            var DeliveryCharge = 0;
            $('#deliveryCharge').html('$ 0.00');
        } else {
            $('#deliveryCharge').html('$ ' + (DeliveryCharge).toFixed(2));
        }
        // addDeliveryCharge(DeliveryCharge);
        getTotalDiscount()
    }
});

$.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
})

//  $(document).on('keyup', '#postcode', function () {
//     $this = $(this);
//     $this.parent().parent().parent().find('#city').val('');
//     $this.parent().parent().parent().find('#state').val('');
//     if ($(this).val().length >= 2) {
//         $("#postcode").autocomplete({
//             source: function (request, response) {
//                 $.ajax({
//                     url: BASE_URL + "location",
//                     type: 'post',
//                     dataType: "json",
//                     data: {keyword: $this.val()},
//                     beforeSend: function () {

//                     },
//                     success: function (data) {
//                         response(data);
//                     }
//                 });
//             },
//             select: function (event, ui) {
//                 var names = ui.item.label;
//                 var nameArr = names.split(',');
//                 $this.val(ui.item.postcode);
//                 $this.parent().parent().parent().find('#city').val(nameArr[0]);
//                 $this.parent().parent().parent().find('#state').val(nameArr[1]);
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
//
//

// let placeSearch;
// let autocomplete;
// const componentForm = {
//   street_number: "short_name",
//   route: "long_name",
//   locality: "long_name",
//   administrative_area_level_1: "long_name",
//   country: "long_name",
//   postal_code: "short_name",
// };

// function initAutocomplete() {
//     var options = {
//         componentRestrictions: {country: "au"}
//     };
//     searchBox = new google.maps.places.Autocomplete(document.getElementById("address1"),options);
//     searchBox.addListener("places_changed", () => {
//         const place = searchBox.getPlaces();

//         if (place.length == 0) {
//             return;
//         }
//         // $("#longitude").val(place[0].geometry.location.lng());
//         // $("#latitude").val(place[0].geometry.location.lat());

//         for (const component of place[0].address_components) {
//             const addressType = component.types[0];

//             if (componentForm[addressType]) {
//               const val = component[componentForm[addressType]];
//               if(addressType == 'postal_code')
//                 $("#postcode").val(val);
//             if(addressType == 'locality')
//                 $("#city").val(val)
//             if(addressType == 'administrative_area_level_1')
//                 $("#state").val(val);
//             if(addressType == 'route')
//                 $("#address2").val(val);

//         }

//     }
// });
// }
// initAutocomplete();
//
let placeSearch;
let autocomplete;
const componentForm = {
    street_number: "short_name",
    route: "long_name",
    locality: "long_name",
    administrative_area_level_1: "short_name",
    country: "long_name",
    postal_code: "short_name",
};
function initAutocomplete() {
    autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("address1"),
        {
            types: ["geocode"],
            componentRestrictions: { country: "au" }
        },
    );

    autocomplete.setFields(["address_component"]);
    autocomplete.addListener("place_changed", fillInAddress);
}

function fillInAddress() {
    const place = autocomplete.getPlace();
    if (place.length == 0) {
        return;
    }

    // $("#longitude").val(place[0].geometry.location.lng());
    // $("#latitude").val(place[0].geometry.location.lat());

    for (const component of place.address_components) {
        const addressType = component.types[0];

        if (componentForm[addressType]) {
            const val = component[componentForm[addressType]];
            if (addressType == 'postal_code')
                $("#postcode").val(val);
            if (addressType == 'locality')
                $("#city").val(val)
            if (addressType == 'administrative_area_level_1')
                $("#state").val(val);

            if (addressType == 'route')
                $("#address2").val(val);

        }

    }
}
initAutocomplete();
