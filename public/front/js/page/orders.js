$(document).ready(function () {

    // check Validtion on place Order
    $('#palce-order').on('click', function (e) {
        e.preventDefault;
        var deliveryID = $("#delivery_address").val();
        var deliveryDate = $("#deliveryDate").val();
        var deliveryTime = $("#deliveryTime").val();
        var deliveryTimeId = $("#deliveryId").val();
        var promocode = $("#pcode").val();
        var order_type = $("#order_type").val();

        if (order_type == 1) {
            if ($(".address-detail-box-selection").length == 0) {
                flashMessage('error', 'Please add Delivery address');
                return false;
            }
            if (deliveryTime == "") {
                flashMessage('error', 'Please add Delivery Time');
                return false;
            }
        }
        $id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_manageDelivery,
            type: "POST",
            data: { deliveryID: deliveryID, deliveryTimeId: deliveryTimeId, deliveryDate: deliveryDate, deliveryTime: deliveryTime, promocode: promocode, order_type: order_type },
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
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



    $(document).on('click', '.address-radio-check', function () {
        $("#delivery_address").val($(this).data('id'));

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_checkCharge,
            type: "POST",
            data: { delivery_address: $("#delivery_address").val() },
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $("#all_chrages").html(res.data);
                $(document).find('.loader-icon').hide();
            },
            compelete: function () {
                $(document).find('.loader-icon').hide();
            },
            error: function (jqXHR, exception) {
                $(document).find('.loader-icon').hide();
                // flashMessage('error',jqXHR.statusText);
            }
        });
    });



    $(document).on('click', '.delivery-day-box', function () {
        $("#deliveryDate").val($(this).data('id'));
    });
    $(document).on('click', '.deliveryTime', function () {
        $("#deliveryTime").val($(this).data('time'));
        $("#deliveryId").val($(this).data('id'));
        var DeliveryCharge = $(this).data('charge');
        if (DeliveryCharge == 0 || DeliveryCharge == undefined) {
            var DeliveryCharge = 0;
            $('#deliveryCharge').html('$ 0.00');
        } else {
            $('#deliveryCharge').html('$ ' + (DeliveryCharge).toFixed(2));
        }
        // addDeliveryCharge(DeliveryCharge);
        getTotalDiscount()
    });

    $(document).on('hide.bs.modal', '#paymentconfirmmodal', function () {
        window.location.href = 'order-history';
    });


    if ($("#paymentFrm").length) {

        var elements = stripe.elements();
        var style = {
            base: {
                fontWeight: 400,
                fontFamily: '"Open Sans", sans-serif',
                fontSize: '15px',
                lineHeight: '25px',
                color: '#495057',

                '::placeholder': {
                    color: '#888',
                },
            },
            invalid: {
                color: '#ff3737',
            }
        };

        var cardElement = elements.create('cardNumber', {
            style: style
        });
        cardElement.mount('#card_number');

        var exp = elements.create('cardExpiry', {
            'style': style
        });
        exp.mount('#card_expiry');

        var cvc = elements.create('cardCvc', {
            'style': style
        });
        cvc.mount('#card_cvc');
        var resultContainer = document.getElementById('paymentResponse');
        cardElement.addEventListener('change', function (event) {
            if (event.error) {
                flashMessage('error', result.error.message);
                // alert(event.error.message)
                // resultContainer.innerHTML = '<p>'+event.error.message+'</p>';
            } else {
                // resultContainer.innerHTML = '';
            }
        });


        var form = document.getElementById('paymentFrm');

        setTimeout(function () {
            $("#paymentFrm").validate({
                errorClass: "text-danger",
                rules: {
                    'name': { required: true }
                },
                messages: {

                    "name": {
                        required: "name required"
                    }
                },
                submitHandler: function (form, event) {
                    event.preventDefault();
                    createToken();
                },
            });
        }, 1000)
        // form.addEventListener('submit', function(e) {
        //   e.preventDefault();
        //   createToken();
        // });

        function createToken() {
            stripe.createToken(cardElement).then(function (result) {
                if (result.error) {
                    flashMessage('error', result.error.message);
                    // alert(result.error.message)
                    // resultContainer.innerHTML = '<p>'+result.error.message+'</p>';
                } else {

                    stripeTokenHandler(result.token);
                }
            });
        }
        function stripeTokenHandler(token) {
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_payment_method_pay,
                type: "POST",
                data: { stripeToken: token.id, type: 1 },
                dataType: "json",
                beforeSend: function () {
                    $(document).find('.loader-icon').show();
                },
                success: function (res) {
                    if (res.status) {
                        if (res.type == 1) {

                            $("#order-delivery").attr('href','delivery-order-tracking/' + res.id);
                            $("#order-pickup").addClass('d-none');
                        } else {

                            $("#order-pickup").attr('href','pickup-order-tracking/' + res.id);
                            $("#order-delivery").addClass('d-none');
                        }
                        $("#paymentconfirmmodal").modal('show');
                    } else {
                        flashMessage('error', res.message);
                    }
                    $(document).find('.loader-icon').hide();
                },
                compelete: function () {
                    $(document).find('.loader-icon').hide();
                },
                error: function (jqXHR, exception) {
                    $(document).find('.loader-icon').hide();
                    flashMessage('error', jqXHR.statusText);
                }
            });
            // form.submit();
        }
    }

    $("#shpper_review_form").validate({
        errorClass: "text-danger",
        rules: {
            'ratting': {
                required: true,
                email: true,
            },
            'remark': { required: true },
        },
        messages: {
            'ratting': {
                required: "Ratting required",
            },
            'remark': {
                required: "Remarks required",
            }
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: url_shopperReview,
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
                        $('#reviewmodal').modal('hide');
                        flashMessage('success', res.message);
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

    $(document).on('show.bs.modal', '#reviewmodal', function (e) {
        $("#shpper_review_form").trigger('reset');
    });
    if ($("#myMaps").length != 0) {

        var map = null;
        var myMarker;
        var myLatlng;

        function initializeGMap(lat, lng) {
            myLatlng = new google.maps.LatLng(lat, lng);

            var myOptions = {
                zoom: 10,
                zoomControl: true,
                center: myLatlng,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };

            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

            myMarker = new google.maps.Marker({
                position: myLatlng
            });
            myMarker.setMap(map);
        }
        $('#myMaps').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            initializeGMap(button.data('lat'), button.data('lng'));
            $("#location-map").css("width", "100%");
            $("#map_canvas").css("width", "100%");
        });


        $('#myMaps').on('shown.bs.modal', function () {
            google.maps.event.trigger(map, "resize");
            map.setCenter(myLatlng);
        });
    }
});

$('#applyPromoCode').click(function () {
    if ($('#code').val() == '') {
        event.preventDefault()
        flashMessage('error', 'Please enter code.');
    } else {
        $('#promoValue').remove();
        var code = $('#code').val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_addPromocode,
            type: "POST",
            data: { code: code, action: 1 },
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();
                if (res.status) {
                    $("#promocode_frm").trigger('reset');
                    getTotalDiscount();
                    $("#appliedCode").html(res.html);
                    // $("#appliedCode").find('.promo-apply').text('Remove');
                    // $("#appliedCode").find('.promo-apply').addClass('promo-remove').removeClass('code-apply');
                    $('.close-promo').click();
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
    }
});

// apply Promocode  
$('.code-apply').click(function () {
    var $that = $(this);
    var promo_id = $that.data('id');
    var promo_code = $that.data('promo');

    $.ajax({
        url: BASE_URL + "add-promocode",
        type: "POST",
        data: { code: promo_code, action: 1 },
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $("#promocode_frm").trigger('reset');
            $(document).find('.loader-icon').hide();
            if (res.status == true) {
                // promoAmount = parseFloat(res.promoValue);
                // total = parseFloat($('#total').attr('data-value'));
                // finalToal = (total-promoAmount).toFixed(2);
                // $('#total').html('$'+finalToal.toFixed(2));
                // $('#total').attr('data-value',finalToal).html('$'+finalToal);
                getTotalDiscount();
                $("#appliedCode").html($("#promo" + promo_code).html()).removeClass('d-none');
                $("#appliedCode").find('.promo-apply').text('Remove');
                $("#appliedCode").find('.promo-apply').addClass('promo-remove').removeClass('code-apply');
                $('.close-promo').click();
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
});


$(document).on('click', '.promo-remove', function () {
    var $that = $(this);
    var promo_id = $that.data('id');
    var promo_code = $that.data('promo');

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_addPromocode,
        type: "POST",
        data: { code: promo_code, action: 0 },
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $("#promocode_frm").trigger('reset');
            $(document).find('.loader-icon').hide();
            if (res.status) {
                $("#appliedCode").html('').addClass('d-none');
                // promoAmount = parseFloat(res.promoValue);
                // total = parseFloat($('#total').attr('data-value'));
                // finalToal = (total+promoAmount).toFixed(2);
                // $('#total').attr('data-value',finalToal).html('$'+finalToal);
                getTotalDiscount();
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
});

$('.close-promo').click(function () {
    $("#code").val("");
})

if ($("#digitalwalletFrm").length) {

    var elements = stripe.elements();
    var style = {
        base: {
            fontWeight: 400,
            fontFamily: '"Open Sans", sans-serif',
            fontSize: '15px',
            lineHeight: '25px',
            color: '#495057',

            '::placeholder': {
                color: '#888',
            },
        },
        invalid: {
            color: '#ff3737',
        }
    };

    var cardElement = elements.create('cardNumber', {
        style: style
    });
    cardElement.mount('#c_number');

    var exp = elements.create('cardExpiry', {
        'style': style
    });
    exp.mount('#c_expiry');

    var cvc = elements.create('cardCvc', {
        'style': style
    });
    cvc.mount('#c_cvc');
    var resultContainer = document.getElementById('paymentResponse');
    cardElement.addEventListener('change', function (event) {
        if (event.error) {
            resultContainer.innerHTML = '<p>' + event.error.message + '</p>';
        } else {
            resultContainer.innerHTML = '';
        }
    });

    var form = document.getElementById('digitalwalletFrm');

    $(document).on('click', '#digitalwalletFrm', function (e) {
        e.preventDefault();
        createToken();
    });
    function createToken() {
        stripe.createToken(cardElement).then(function (result) {
            if (result.error) {
                resultContainer.innerHTML = '<p>' + result.error.message + '</p>';
            } else {

                stripeTokenHandler(result.token);
            }
        });
    }
    function stripeTokenHandler(token) {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_payment_method_pay,            type: "POST",
            data: { stripeToken: token.id, type: 5 },
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                if (res.status) {
                    // $("#order-delivery").attr('href', BASE_URL+'delivery-order-tracking/'+res.id);
                    $("#order-pickup").attr('href', BASE_URL + 'pickup-order-tracking/' + res.id);
                    $("#order-delivery").addClass('d-none');
                    $("#paymentconfirmmodal").modal('show');
                } else {
                    flashMessage('error', res.message);
                }
                $(document).find('.loader-icon').hide();
            },
            compelete: function () {
                $(document).find('.loader-icon').hide();
            },
            error: function (jqXHR, exception) {
                $(document).find('.loader-icon').hide();
                flashMessage('error', jqXHR.statusText);
            }
        });
        // form.submit();
    }
}


$("#walletfrm").validate({

    submitHandler: function (form, event) {
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_payment_method_pay,
            type: "POST",
            data: { type: 5 },
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                if (res.status) {
                    if (res.type == 1) {

                        $("#order-delivery").attr('href', 'delivery-order-tracking/' + res.id);
                        $("#order-pickup").addClass('d-none');
                    } else {

                        $("#order-pickup").attr('href', 'pickup-order-tracking/' + res.id);
                        $("#order-delivery").addClass('d-none');
                    }
                    $("#paymentconfirmmodal").modal('show');
                } else {
                    flashMessage('error', res.message);
                }
                $(document).find('.loader-icon').hide();
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

$('.order-type').on('click', function () {
    var type = $(this).hasClass('active');
    var type_id = $(this).data('id');

    if (type_id == 2) {
        var DeliveryCharge = 0;
        $('#deliveryCharge').html('$ 0.00');
        $("#delivery_tip_div").addClass('d-none');
        getTotalDiscount(2);
        var deliveryID = $("#delivery_address").val();

        if ($(".address-detail-box-selection").length == 0) {
            flashMessage('error', 'Please add Current address');
            return false;
        }
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_getPickUpLocation,
            type: "POST",
            data: { deliveryID: deliveryID },
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $('#pills-pickup').html('');
                $('#pills-pickup').html(res.data);
                $(document).find('.loader-icon').hide();
            },
            compelete: function () {
                $(document).find('.loader-icon').hide();
            },
            error: function (jqXHR, exception) {
                $(document).find('.loader-icon').hide();
                flashMessage('error', jqXHR.statusText);
            }
        });
    } else {
        $("#delivery_tip_div").removeClass('d-none');
        $('.today').trigger('click');
    }
    if (type == true) {
        $('#order_type').val(type_id);
    } else {
        $('#order_type').val(type_id);
    }
});


$("#driver_review_form").validate({
    errorClass: "text-danger",
    rules: {
        'ratting': {
            required: true,
            email: true,
        },
        'remark': { required: true },
    },
    messages: {
        'ratting': {
            required: "Ratting required",
        },
        'remark': {
            required: "Remarks required",
        }
    },
    submitHandler: function (form, event) {
        event.preventDefault();
        $.ajax({
            url: BASE_URL + "driver-review",
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
                    $('#reviewShopperModal').modal('hide');
                    flashMessage('success', res.message);
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

function addDeliveryTip() {
    $("#deliveryTipModal").modal('show');
}

$("#delivery_tip").keyup(function (event) {
    this.value = this.value.replace(/[^0-9\.]/g, '');
    console.log(this.value);
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_add_delivery_tip,
        type: "POST",
        data: { delivery_tip: $("#delivery_tip").val() },
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status) {
                getTotalDiscount();

                // flashMessage('success',res.message);
            } else {

                // flashMessage('error',res.message);
            }
        },
        compelete: function () {
            $(document).find('.loader-icon').hide();
        },
        error: function (jqXHR, exception) {
            $(document).find('.loader-icon').hide();
            // flashMessage('error',jqXHR.statusText);
        }
    });
});


$("#delivery_tip").focusout(function (event) {
    if ($("#delivery_tip").val() != "") {
        getTotalDiscount();
    }
});

//  $("#delivery_tip_frm").validate({
//   errorClass:"text-danger", 
//   rules: {
//     'delivery_tip': {
//       required: true,
//       number:true,
//     },
//   },
//   messages: {
//     'delivery_tip': {
//       required: "Delivery Tip is required",
//     },
//   },
//   submitHandler: function (form,event) {
//     event.preventDefault();
//     $.ajax({
//       url: BASE_URL + "add-delivery-tip",
//       type: "POST",
//       data:new FormData(form),
//       processData:false,
//       contentType:false,
//       cache:false,
//       dataType: "json",
//       beforeSend: function(){
//         $(document).find('.loader-icon').show();
//       },
//       success:function(res) {
//         $(document).find('.loader-icon').hide();
//         if(res.status){
//           // total = parseFloat($('#total').attr('data-value'));
//           if($("#deliveryTipAmount").val()!=0){
//             $('#delivery_tip').html('$ ' + res.delivery_tip.toFixed(2));
//             // delivery_tip = parseFloat(res.delivery_tip);

//           //   finalToal = (total+delivery_tip).toFixed(2);
//         } else {
//           //   finalToal = (total-delivery_tip).toFixed(2);
//           $('#delivery_tip').html('$ ' + 0.00);
//           //   delivery_tip = parseFloat(0);
//         }
//           // $('#total').attr('data-value',finalToal).html('$'+finalToal);
//           getTotalDiscount();
//           $('#deliveryTipModal').modal('hide');
//           flashMessage('success',res.message);
//         } else {
//           flashMessage('error',res.message);
//         }
//       },
//       compelete: function(){
//         $(document).find('.loader-icon').hide();
//       },
//       error: function(jqXHR, exception) {
//         $(document).find('.loader-icon').hide();
//         flashMessage('error',jqXHR.statusText);
//       }
//     });
//   },
// });



function getTotalDiscount(isType = null) {

    var deliveryDate = $("#deliveryDate").val();
    var deliveryTime = $("#deliveryTime").val();
    var delivery_address = $("#delivery_address").val();

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_checkCharge,
        type: "POST",
        dataType: "json",
        data: { delivery_address: delivery_address, deliveryDate: deliveryDate, deliveryTime: deliveryTime, isType: isType },
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            $("#delivery_tip_after").html(res.data);
            $('#total').html('$' + res.total);
            $('#total').attr('data-value', res.total);
            $('#all_service_fee').attr('data-value', res.total);
            if (res.html != 0) {
                $("#appliedCode").html(res.html).removeClass('d-none');
            }

        },
        compelete: function () {
            $(document).find('.loader-icon').hide();
        },
        error: function (jqXHR, exception) {
            $(document).find('.loader-icon').hide();
            // flashMessage('error',jqXHR.statusText);
        }
    });
}
$("#js-validation-cancelOrder").validate({
    errorClass: "text-danger",
    rules: {
        'cancel_reason_id': {
            required: true,
        },
        'comments': {
            required: true,
            lettersonly: true
        },
    },
    messages: {
        'comments': {
            required: "comments is required",
            lettersonly: "Only allow alphabets",
        },
        'cancel_reason_id': {
            required: "Cancle reason is required",

        }
    },
    submitHandler: function (form, event) {
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_cancel_order,
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
                window.location.reload();
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
$.validator.addMethod("lettersonly", function (value, element) {
    return this.optional(element) || /^[a-z\s]+$/i.test(value);
})

$('.store-review-edit').click(function () {
    var review_id = $(this).data('store-review-id');
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_getStoreReview,
        type: "POST",
        data: { review_id: review_id },
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            if (res.status == true) {
                $('#store_remark').html(' ');
                $("#shpper_review_form").trigger('reset');
                $(document).find('.loader-icon').hide();
                var stars = $('#stars li').parent().children('li.star');
                for (i = 0; i < res.data.review; i++) {
                    $(stars[i]).addClass('selected');
                }
                $('#store_review_id').val(res.data.id);
                $("#store_id").attr("disabled", "disabled");
                $("#store_id option[value=" + res.data.store_id + "]").attr('selected', 'selected');
                $('#store_remark').html(res.data.remark);
                $('#reviewmodal').modal('show');
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
})

$('.driver-review-edit').click(function () {
    var review_id = $(this).data('driver-review-id');
    $.ajax({
        url: BASE_URL + "get-driver-review",
        type: "POST",
        data: { review_id: review_id },
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            if (res.status == true) {
                $('#driver_remark').html(' ');
                $("#driver_review_form").trigger('reset');
                $(document).find('.loader-icon').hide();
                var stars = $('#shopperStars li').parent().children('li.star');
                for (i = 0; i < res.data.review; i++) {
                    $(stars[i]).addClass('selected');
                }
                $('#driver_review_id').val(res.data.id);
                $('#driver_remark').html(res.data.remark);
                $('#reviewShopperModal').modal('show');
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
})

function addDeliveryCharge(DeliveryCharge) {
    deliveryDate = $("#deliveryDate").val();
    deliveryTime = $("#deliveryTime").val();

    $.ajax({
        url: BASE_URL + "add-delivery-charge",
        type: "POST",
        data: { DeliveryCharge: DeliveryCharge, deliveryDate: deliveryDate, deliveryTime: deliveryTime },
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            // getTotalDiscount();
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

$('#order-cancel-btn').on('click', function () {
    var service_fee = $(this).data('service_fee');
    var total = $(this).data('total');
    var delivery_fee = $(this).data('delivery_fee');
    var refunded = total - service_fee - delivery_fee;
    $('#service_fee').html(service_fee);
    $('#total').html(total);
    $('#refunded').html(refunded);
    $('#delivery_fee').html(delivery_fee);
    $('#cancelordermodal').modal('show');
});
