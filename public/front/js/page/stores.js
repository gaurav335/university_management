$(document).ready(function () {

    // Add Customer From Validation and Ajax
    // $("#frm_register").validate({
    //     errorClass: "text-danger",
    //     rules: {
    //         'zipcode': { required: true },
    //         'email': {
    //             required: true,
    //             email: true,
    //             remote: {
    //                 url: "checkemail",
    //                 type: "post",
    //                 data: {
    //                     email: function () {
    //                         return $("#email").val();
    //                     }
    //                 }

    //             }
    //         },
    //         'name': { required: true },
    //         'last_name': { required: true },
    //         'phone': {
    //             required: true,
    //             remote: {
    //                 url: "checkmobile",
    //                 type: "post",
    //                 data: {
    //                     phone: function () {
    //                         return $("#phone").val();
    //                     }
    //                 }

    //             },
    //             minlength: 8,
    //             maxlength: 10,
    //             number: true,
    //         },
    //         'password': { required: true, minlength: 8, pwcheck: true },
    //     },
    //     messages: {
    //         'zipcode': {
    //             required: "Postcode required",
    //         },
    //         'name': {
    //             required: "First Name required",
    //         },
    //         'last_name': {
    //             required: "Last Name required",
    //         },
    //         'email': {
    //             required: "Email required",
    //             email: "Email must have valid format",
    //             remote: "Email already register"
    //         },
    //         'phone': {
    //             required: "Mobile number required",
    //             remote: "Mobile number already register"
    //         },
    //         'password': {
    //             required: "Password required",
    //             minlength: "Password minimum 8 character long",
    //             pwcheck: "Password should be least one upper case,lower case and digit"

    //         }
    //     },
    //     submitHandler: function (form, event) {
    //         event.preventDefault();
    //         $.ajax({
    //             url: "register",
    //             type: "POST",
    //             data: new FormData(form),
    //             processData: false,
    //             contentType: false,
    //             cache: false,
    //             dataType: "json",
    //             beforeSend: function () {
    //                 $(document).find('.loader-icon').show();
    //             },
    //             success: function (res) {
    //                 $(document).find('.loader-icon').hide();
    //                 if (res.status) {
    //                     window.location.href = res.url;
    //                 } else {
    //                     flashMessage('error', res.message);
    //                 }
    //             },
    //             compelete: function () {
    //                 $(document).find('.loader-icon').hide();
    //             },
    //             error: function (jqXHR, exception) {
    //                 $(document).find('.loader-icon').hide();
    //                 flashMessage('error', jqXHR.statusText);
    //             }
    //         });
    //     },
    // });
    $.validator.addMethod("pwcheck", function (value) {
        return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
            && /[a-z]/.test(value) // has a lowercase letter
            && /\d/.test(value) // has a digit
    });

    $(".toggle-btn-active-set").click(function () {
        $(this).toggleClass("active");
    });




    // Product Search
    $(document).on('keyup', '#location_search_2', function () {
        // if ($(this).val().length >= 2) {
        $("#location_search_2").autocomplete({
            source: function (request, response) {
                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: url_location,
                    type: 'post',
                    dataType: "json",
                    data: { keyword: $('#location_search_2').val(), '_token': $('meta[name="_token"]').attr('content') },
                    beforeSend: function () {

                    },
                    success: function (data) {
                        response(data);
                    }
                });
            },
            select: function (event, ui) {
                $('#location_search_text').html(ui.item.labelpostcode);
                $('#location_search_2').val(ui.item.labelpostcode);
                $('#postcode').val(ui.item.value);
                if (confirm('Are you want to sure change location \nYou may loss your current cart item(s) if location not matched ?')) {
                    window.location.href = window.location.origin + window.location.pathname + '?location=' + ui.item.value;
                }
                return false;
            },
            search: function (e, u) {
                // $(document).find('.loader-icon').show();
            },
            response: function (e, u) {
                // $(document).find('.loader-icon').hide();
            }
        });
        // }
        $('#postcode').val($(this).val());
    });


    //Open Product Modal
    $(document).on('click', '.productdetailmodal', function () {

        $id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_getProductDetails,
            type: "POST",
            data: { id: $id },
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();

                if (res) {
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


    // Load more Product on Order History
    $("#loadMoreOrderHistory").on('click', function () {

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_order_history_load_more,
            type: "POST",
            dataType: "json",
            data: { lastId: $("#lastId").val() },
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();
                if (res.status) {
                    $("#order-history-listing").append(res.data);
                    $("#lastId").val(res.nextId)
                    if (res.visible == false) {
                        $("#loadMoreOrderHistory").addClass('d-none')
                    }

                } else {

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
    // Load more Single Cate Products
    $("#loadMoreSingleCategoryProduct").on('click', function () {
        var sub_department_id = $("#sub_department_id").val();
        var department_id = $('#department_id').val();
        var sub_sub_department_id = $('#sub_sub_department_id').val();
        var store_id = $('#store_id').val();
        $.ajax({
            url: BASE_URL + 'SubDepartment-products?search=' + $('#search').val(),
            type: "POST",
            dataType: "json",
            data: { nextId: $('#lastId').val(), department_id: department_id, sub_department_id: sub_department_id, store_id: store_id, isSingle: 1, sub_sub_department_id: sub_sub_department_id },
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();
                if (res.status) {
                    $.each(res.data, function (k, v) {
                        $("#load-More-Single-Category").append('<div class="col-md-3"><div class="dmt-container"><div class="store-contain-box store-product-contain-box viewProductDetails" data-node="' + v.enId + '"><!--<button data-id="' + v.id + '" onclick="AddToFavouriteProduct(this,' + v.id + ')" class="fav-store-button ' + v.isFavritesProductClass + '"><i class="far fa-heart"></i></button>-->  <a href="javascript:void(0);" data-id="' + v.enId + '" class="productdetailmodal" data-toggle="modal" data-target="#productdetailmodal"><div class="shop-img-box "><img src="' + v.productImage + '" alt="" class="img-fluid"></div><div class="products-text-amnt-box"><div class="product-amt-detail"><h3>$' + v.price + '</h3><p>' + v.name + '</p></div><div class="products-view-pls" onclick="AddToCart(this,' + v.id + ')"><button class="plus-prdct"><i class="feather icon-plus"></i></button></div></div></a></div></div></div>');
                    });
                    $("#lastId").val(res.nextId)
                    if (res.visible == false) {
                        $("#loadMoreSingleCategoryProduct").addClass('d-none')
                    }

                } else {

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
});

function AddToFavouriteProduct(obj, id) {


    $class = $(obj).attr('class');
    $id = id;
    $type = 'active';

    if ($class == 'fav-store-button active' || $class == 'btn-outline-organge toggle-btn-active-set active') {
        $(obj).toggleClass("active");
        $type = 'inactive';
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_FavoriteProduct,
        type: "POST",
        data: { id: $id, type: $type },
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status) {
                if ($type == 'inactive') {
                    $(obj).removeClass("active");

                }
                else {
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



function AddToFavouriteStore(obj, id) {
    //    console.log(id);
    $class = $(obj).attr('class');
    $id = id;
    $type = 'active';
    if ($class == 'fav-store-button active' || $class == 'btn-outline-organge toggle-btn-active-set active') {
        $type = 'inactive';
    }

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_FavoriteStore,
        type: "POST",
        data: { id: $id, type: $type },
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status) {
                flashMessage('success', res.message);
            }
            else {
                flashMessage('error', res.message);
            }
        }
    });
}

$('.delete_favorite_product').click(function () {
    var favCount = $('.f-product').length;

    if (confirm("Are You Sure Delete Favorite Product?")) {
        $id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_deleteFavoriteProduct,
            type: "POST",
            data: {id: $id},
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();
                if (res.status)
                {
                    if(favCount == 1) {
                        $('#pills-delivery').append('<div class="products-empty">'+'<img src='+img_FavoriteProductEmpty+'>'
                                +'<h4>You havent added any favorite products.</h4>'+'</div>');
                        $('.favorite-product-' + $id).remove();
                    } else {
                        $('.favorite-product-' + $id).remove();
                        flashMessage('success', res.message);
                    }
                }
                else {
                    flashMessage('error', res.message);
                }
            }
        });
    }
    return false;
});

$('.delete_favorite_store').click(function () {
    if (confirm("Are You Sure Delete Favorite Store?")) {
        $id = $(this).data('id');
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_deleteFavoriteStore,
            type: "POST",
            data: {id: $id},
            dataType: "json",
            beforeSend: function () {
                $(document).find('.loader-icon').show();
            },
            success: function (res) {
                $(document).find('.loader-icon').hide();
                if (res.status)
                {
                    $('.favorite-store-' + $id).remove();
                    flashMessage('success', res.message);
                }
                else {
                    flashMessage('error', res.message);
                }
            }
        });
    }
    return false;
});
