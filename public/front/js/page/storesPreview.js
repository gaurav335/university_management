$(document).ready(function () {

    // Add Customer From Validation and Ajax
    $("#frm_register").validate({
        errorClass: "text-danger",
        rules: {
            'zipcode': {required: true},
            'email': {
                required: true,
                email: true,
                remote: {
                    url: BASE_URL + "checkemail",
                    type: "post",
                    data: {
                        email: function () {
                            return $("#email").val();
                        }
                    }

                }
            },
            'name': {required: true},
            'last_name': {required: true},
            'phone': {required: true,
                remote: {
                    url: BASE_URL + "checkmobile",
                    type: "post",
                    data: {
                        phone: function () {
                            return $("#phone").val();
                        }
                    }

                }
            },
           
            'password': {required: true, minlength: 8, pwcheck: true},
        },
        messages: {
            'zipcode': {
                required: "Postcode required",
            },
            'name': {
                required: "First name required",
            },
            'last_name': {
                required: "Last name required",
            },
            'email': {
                required: "Email required",
                email: "Email must have valid format",
                remote: "Email already register"
            },
            'phone': {
                required: "Mobile number required",
                remote: "Mobile number Already register"
            },
            'password': {
                required: "Password required",
                minlength: "Password minimum 8 character long",
                pwcheck: "Password should be least one upper case,lower case and digit"

            }
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            $.ajax({
                url: BASE_URL + "register",
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
    $.validator.addMethod("pwcheck", function (value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
                && /[a-z]/.test(value) // has a lowercase letter
                && /\d/.test(value) // has a digit
    });

    $(".toggle-btn-active-set").click(function () {
        $(this).toggleClass("active");
    });




    // Product Search  
    $(document).on('keyup', '#location_search', function () {
        if ($(this).val().length >= 1) {
            $("#location_search").autocomplete({
                source: function (request, response) {
                    $.ajax({
                        url: BASE_URL + "location",
                        type: 'post',
                        dataType: "json",
                        data: {keyword: $('#location_search').val(), '_token': $('meta[name="_token"]').attr('content')},
                        beforeSend: function () {

                        },
                        success: function (data) {
                            console.log(data);
                            response(data);
                        }
                    });
                },
                select: function (event, ui) {
                    $('#location_search_text').html(ui.item.labelpostcode);
                    $('#location_search').val(ui.item.labelpostcode);
                    window.location.href = window.location.origin + window.location.pathname + '?location=' + ui.item.value;

                    $('#postcode').val(ui.item.value);
                    return false;
                },
                search: function (e, u) {
                    // $(document).find('.loader-icon').show();
                },
                response: function (e, u) {
                    // $(document).find('.loader-icon').hide();
                }
            });
        }
    });


    //Open Product Modal
    $('.productdetailmodal').click(function () {

        $id = $(this).data('id');
        console.log('id >> ' + $id);
        $.ajax({
            url: BASE_URL + "getProductDetail",
            type: "POST",
            data: {id: $id},
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();
                console.log(res);

                if (res)
                {
                    $('.product-details').html('');
                    $('.product-details').html(res.data);
                    // --------product-main-detail-slider---------
                    if ($('#product-detail-slider').length) {
                        $('#product-detail-slider').owlCarousel({
                            loop: true,
                            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                            nav: true,
                            dots: false,
                            items: 1,
                            autoHeight: true
                        });
                    }

                    if ($('.products-sliders-modal').length) {
                        $('.products-sliders-modal').owlCarousel({
                            loop: false,
                            nav: true,
                            dots: false,
                            margin: 30,
                            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
                            responsive: {
                                0: {
                                    items: 1
                                },
                                430: {
                                    items: 2
                                },
                                768: {
                                    items: 2
                                },
                                992: {
                                    items: 3
                                },
                                1200: {
                                    items: 5
                                }
                            }
                        });
                    }
                }

//            if (res.data.discount)
//            {
//                $('#productdetailmodal .product-dis').show();
//                $('#productdetailmodal .product-dis').html(res.data.discount + '%');
//            }
//            $('#productdetailmodal .store-name-deails h2').html(res.data.name);
//            $('#productdetailmodal .store-name-deails h2').html(res.data.name);
//            $('#productdetailmodal .product-price').html('$' + res.data.price + '<span>/kg</span>');
//            $('#productdetailmodal .product-desc').html(res.data.description);
//            $('#productdetailmodal .product-detail-dec p').html('$' + res.data.min_order_amount + '.00 cart minimum to order');
//            $('#productdetailmodal .product-main-img').attr('src', res.data.productImage);
// 
            }
        });

    });
});

function AddToFavouriteProduct(obj, id)
{


    $class = $(obj).attr('class');
    console.log($class);
    $id = id;
    $type = 'active';

    if ($class == 'fav-store-button active' || $class == 'btn-outline-organge toggle-btn-active-set active')
    {
        $(obj).toggleClass("active");
        $type = 'inactive';
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_FavoriteProduct,
        type: "POST",
        data: {id: $id, type: $type},
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status)
            {
                if ($type == 'inactive')
                {
                    $(obj).removeClass("active");

                }
                else
                {
                    $(obj).addClass("active");

                }
                flashMessage('success', res.message);
            }
            else {
                flashMessage('error', res.message);
            }
        }
    });

}



function AddToFavouriteStore(obj, id)
{
//    console.log(id);
    $class = $(obj).attr('class');
    console.log($class);
    $id = id;
    $type = 'active';
    if ($class == 'fav-store-button active' || $class == 'btn-outline-organge toggle-btn-active-set active')
    {
        $type = 'inactive';
    }

    $.ajax({
        url: BASE_URL + "front/Favorite/manageFavoriteStore",
        type: "POST",
        data: {id: $id, type: $type},
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status)
            {
                flashMessage('success', res.message);
            }
            else {
                flashMessage('error', res.message);
            }
        }
    });
} 