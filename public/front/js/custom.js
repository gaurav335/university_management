//-------loader-----------
$(window).on('load', function () {
    $('.preloader').fadeOut('slow');
})



// --------header--------------
$(document).ready(function () {
    $('.toggle-btn').on('click', function () {
        $('.menu-part').css({"left": '0%'});
        $('.overlay-bg').css({"opacity": '1', "visibility": 'visible'});
        $('.account-sidebar').removeClass('active');
        $('.account-sidebar-overlay').removeClass('active');
        $('.category-lists-data').removeClass('active');
        $('.category-overlay').removeClass('active');
        $('html').removeClass('category-overflow-hdn');
    });
    $('.close-menu').on('click', function () {
        $('.menu-part').css({"left": '-100%'});
        $('.overlay-bg').css({"opacity": '0', "visibility": 'hidden'});
    });
    $('.overlay-bg').on('click', function () {
        $('.menu-part').css({"left": '-100%'});
        $(this).css({"opacity": '0', "visibility": 'hidden'});
    });
});



// ------------on scroll--add-class-header-sticky--------
$(window).on('scroll load', function () {
    var scroll = $(window).scrollTop();
    if (scroll < 50) {
        $(".header-wrapper").removeClass("sticky");
    } else {
        $(".header-wrapper").addClass("sticky");
    }
});




// --------------add active class-on another-page move----------
jQuery(document).ready(function ($) {
    // Get current path and find target link
    var path = window.location.pathname.split("/").pop();

    // Account for home page with empty path
    if (path == '') {
        path = 'index.html';
    }

    var target = $('.nav-bar ul li a[href="../' + path + '"]');
    // Add active class to target link
    target.parent().addClass('active');

    var target2 = $('.account-right ul li a[href="' + path + '"]');
    // Add active class to target2 link
    target2.parent().addClass('active');

    var target3 = $('.account-sidebar ul li a[href="../' + path + '"]');
    // Add active class to target2 link
    target3.parent().addClass('active');

});

$(".video-sec").click(function(){
    var src = $(this).attr('data-src');
    var regExp = /^.*((youtu.be\/)|(v\/)|(\/u\/\w\/)|(embed\/)|(watch\?))\??v?=?([^#&?]*).*/;
    var match = src.match(regExp);
    src =  (match&&match[7].length==11)? match[7] : false;
    $("#videomodal").find('iframe').attr('src','https://www.youtube.com/embed/'+src);
    $("#videomodal").modal('show');
});

// -------home-slider------------------
if ($('#home-slider').length) {
    $('#home-slider').owlCarousel({
        loop: false,
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        mouseDrag: false,
        nav: false,
        items: 1
    });
}

if ($('.store-double-slider').length) {
    $('.store-double-slider').owlCarousel({
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
                items: 3
            },
            992: {
                items: 4
            }
        }
    });
}


if ($(".fav-store-button").length) {
    $(".fav-store-button").click(function () {
        $(this).toggleClass("active");
    });
}


// -------products-slider-----------
if ($('.products-sliders').length) {
    $('.products-sliders').owlCarousel({
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
                items: 3
            },
            992: {
                items: 5
            }
        }
    });
}

if(typeof(subdepartmentAll) !=="undefined") {
    for (var i = 0; i <= subdepartmentAll.length; i++) {
        this["sliderIdName_"+i]="";
        this["sliderIdNamepickup_"+i]="";
    }

    if(subdepartmentAll.length !=0) {
        subdepartmentAll = $.parseJSON(subdepartmentAll);
        for (var i = subdepartmentAll.length - 1; i >= 0; i--) {
            var  name = subdepartmentAll[i].name;
            window['sliderIdName_'+i] = $('.products-sliders-sub-store-'+name).owlCarousel({
                loop: false,
                nav: true,
                dots: false,
                margin: 30,
                slideBy:5,
                pagination:true,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right' data-name='"+name+"' data-silder='sliderIdName_"+i+"'></i>"],
                responsive: {
                    0: {
                        items: 1
                    },
                    430: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 5
                    }
                }
            });
            window['sliderIdNamepickup_'+i] = $('.products-sliders-sub-store-pickup-'+name).owlCarousel({
                loop: false,
                nav: true,
                dots: false,
                margin: 30,
                slideBy:5,
                pagination:true,
                navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right' data-name='pickup-"+name+"' data-silder='sliderIdNamepickup_"+i+"'></i>"],
                responsive: {
                    0: {
                        items: 1
                    },
                    430: {
                        items: 2
                    },
                    768: {
                        items: 3
                    },
                    992: {
                        items: 5
                    }
                }
            });

        }
    }
    $(document).on("click",".owl-next",function(e){
        e.preventDefault();
        var name    = $(this).find('i').attr('data-name');
        var silder      = $(this).find('i').attr('data-silder');
        var lastId  = $('.products-sliders-container-'+name).find("#lastId").val();
        var load_more   = $('.products-sliders-container-'+name).find("#load_more").val();
        var  sub_department_id  = $('.products-sliders-container-'+name).find("#sub_department_id").val();
        var department_id  = $('#department_id').val();
        var store_id  = $('#store_id').val();
        if(load_more!="false"){
            $.ajax({
                url: BASE_URL+'SubDepartment-products',
                type:"POST",
                dataType: 'json',
                data:{nextId:lastId,department_id:department_id,sub_department_id:sub_department_id},
                beforeSend: function(){
                    $(document).find('.loader-icon').show();
                },
                success: function(res) {
                    $(document).find('.loader-icon').hide();
                    $('.products-sliders-container-'+name).append(res.data);
                    $('.products-sliders-container-'+name).find("#lastId").val(res.nextId)
                    $('.products-sliders-container-'+name).find("#load_more").val(res.visible)
                    $.each(res.data, function(k, v) {
                        console.log(window[silder]);
                        window[silder].trigger('add.owl.carousel', [jQuery('<div class="store-contain-box store-product-contain-box viewProductDetails" data-node="'+v.enId+'"><!--<button data-id="'+v.id+'" onclick="AddToFavouriteProduct(this,'+v.id+')" class="fav-store-button '+v.isFavritesProductClass+'"><i class="far fa-heart"></i></button> --> <a href="javascript:void(0);" data-id="'+v.enId+'" class="productdetailmodal" data-toggle="modal" data-target="#productdetailmodal"><div class="shop-img-box "><img src="'+v.productImage+'" alt="" class="img-fluid"></div><div class="products-text-amnt-box"><div class="product-amt-detail"><h3>$'+v.price+'</h3><p>'+v.name+'</p></div><div class="products-view-pls" onclick="AddToCart(this,'+v.id+')"><button class="plus-prdct"><i class="feather icon-plus"></i></button></div></div></a></div>')]);
                    });
                    window[silder].trigger('refresh.owl.carousel');
                },
                compelete: function(){
                    $(document).find('.loader-icon').hide();
                },
                error: function(jqXHR, exception) {
                  $(document).find('.loader-icon').hide();
              }
          });
        }
    });
}




//--- home Page  Store  Silder 
// home-page-store-slider
if ($('.home-page-store-slider').length) {
    $('.home-page-store-slider').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        margin: 30,
        slideBy:4,
        pagination:true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            430: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });


    $(".home-page-store-slider .owl-next").click(function(){
       // $(".lat-items").trigger('owl.prev');
       // alert();
   });

}
//-----------product-slider-modal----------
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



// -------delivery-hours-slider-----------
if ($('#delivery-days-slider').length) {
    $('a[data-toggle="pill"]').on('shown.bs.tab', function () {
        $($(this).attr('href')).find('#delivery-days-slider').owlCarousel({
            loop: false,
            nav: true,
            dots: false,
            margin: 15,
            navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
            responsive: {
                0: {
                    items: 2
                },
                400: {
                    items: 3
                },
                480: {
                    items: 4
                },
                768: {
                    items: 3
                },
                992: {
                    items: 5
                },
                1200: {
                    items: 6
                }
            }
        })
    });
}



//popular-products-sliders on store  details page
if ($('.popular-products-sliders').length) {
    var popular_products_isLoadmore =true;
    var popular_products_owl = $('.popular-products-sliders').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        margin: 30,
        slideBy:4,
        pagination:true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            430: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });
    $(".popular-products-sliders > .owl-nav > .owl-next").click(function(){
        var lastId  = $('.popular-products-sliders-container').find("#lastId").val();
        var store_id  = $('#store_id').val();
        if(popular_products_isLoadmore){
            $.ajax({
                url: BASE_URL+'popular-products',
                type:"POST",
                dataType: 'json',
                data:{nextId:lastId,store_id:store_id},
                beforeSend: function(){
                    $(document).find('.loader-icon').show();
                },
                success: function(res) {
                    $(document).find('.loader-icon').hide();
                    $('.popular-products-sliders-container').append(res.data);
                    $('.popular-products-sliders').find("#lastId").val(res.nextId)
                    popular_products_isLoadmore = res.visible;
                    $.each(res.data, function(k, v) {
                        popular_products_owl.trigger('add.owl.carousel', [jQuery('<div class="store-contain-box store-product-contain-box viewProductDetails" data-node="'+v.enId+'"><!--<button data-id="'+v.id+'" onclick="AddToFavouriteProduct(this,'+v.id+')" class="fav-store-button '+v.isFavritesProductClass+'"><i class="far fa-heart"></i></button>-->  <a href="javascript:void(0);" data-id="'+v.enId+'" class="productdetailmodal" data-toggle="modal" data-target="#productdetailmodal"><div class="shop-img-box "><img src="'+v.productImage+'" alt="" class="img-fluid"></div><div class="products-text-amnt-box"><div class="product-amt-detail"><h3>$'+v.price+'</h3><p>'+v.name+'</p></div><div class="products-view-pls" onclick="AddToCart(this,'+v.id+')"><button class="plus-prdct"><i class="feather icon-plus"></i></button></div></div></a></div>')]);
                    });
                    popular_products_owl.trigger('refresh.owl.carousel');
                },
                compelete: function(){
                    $(document).find('.loader-icon').hide();
                },
                error: function(jqXHR, exception) {
                  $(document).find('.loader-icon').hide();
              }
          });
        }
    });

}
if ($('.popular-products-sliders-pickup').length) {
    var popular_products_isLoadmore =true;
    var popular_products_pickup_owl = $('.popular-products-sliders-pickup').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        margin: 30,
        slideBy:4,
        pagination:true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            430: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });
    $(".popular-products-sliders-pickup > .owl-nav > .owl-next").click(function(){
        var lastId  = $('.popular-products-sliders-container-pickup').find("#lastId").val();
        var store_id  = $('#store_id').val();
        if(popular_products_isLoadmore){
            $.ajax({
                url: BASE_URL+'popular-products',
                type:"POST",
                dataType: 'json',
                data:{nextId:lastId,store_id:store_id},
                beforeSend: function(){
                    $(document).find('.loader-icon').show();
                },
                success: function(res) {
                    $(document).find('.loader-icon').hide();
                    $('.popular-products-sliders-container-pickup').append(res.data);
                    $('.popular-products-sliders-pickup').find("#lastId").val(res.nextId)
                    popular_products_isLoadmore = res.visible;
                    $.each(res.data, function(k, v) {
                        popular_products_pickup_owl.trigger('add.owl.carousel', [jQuery('<div class="store-contain-box store-product-contain-box viewProductDetails" data-node="'+v.enId+'"><!--<button data-id="'+v.id+'" onclick="AddToFavouriteProduct(this,'+v.id+')" class="fav-store-button '+v.isFavritesProductClass+'"><i class="far fa-heart"></i></button>-->  <a href="javascript:void(0);" data-id="'+v.enId+'" class="productdetailmodal" data-toggle="modal" data-target="#productdetailmodal"><div class="shop-img-box "><img src="'+v.productImage+'" alt="" class="img-fluid"></div><div class="products-text-amnt-box"><div class="product-amt-detail"><h3>$'+v.price+'</h3><p>'+v.name+'</p></div><div class="products-view-pls" onclick="AddToCart(this,'+v.id+')"><button class="plus-prdct"><i class="feather icon-plus"></i></button></div></div></a></div>')]);
                    });
                    popular_products_pickup_owl.trigger('refresh.owl.carousel');
                },
                compelete: function(){
                    $(document).find('.loader-icon').hide();
                },
                error: function(jqXHR, exception) {
                  $(document).find('.loader-icon').hide();
              }
          });
        }
    });

}

//on-sale-products-sliders on store  details page
if ($('.on-sale-products-sliders').length) {
    var on_saleOwl_load_more = true;
    var on_saleOwl = $('.on-sale-products-sliders').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        margin: 30,
        slideBy:4,
        pagination:true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            430: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });

    $(".on-sale-products-sliders >.owl-nav > .owl-next").click(function(){
        var lastId  = $('.on-sale-products-sliders-container').find("#lastId").val();
        var store_id  = $('#store_id').val();
        if(on_saleOwl_load_more){
            $.ajax({
                url: BASE_URL+'onSale-products',
                type:"POST",
                dataType: 'json',
                data:{nextId:lastId,store_id:store_id,filter_id:'1'},
                beforeSend: function(){
                    $(document).find('.loader-icon').show();
                },
                success: function(res) {
                    $(document).find('.loader-icon').hide();
                    $('.on-sale-products-sliders-container').append(res.data);
                    $('.on-sale-products-sliders-container').find("#lastId").val(res.nextId)
                    on_saleOwl_load_more = res.visible;
                    $.each(res.data, function(k, v) {
                        on_saleOwl.trigger('add.owl.carousel', [jQuery('<div class="store-contain-box store-product-contain-box viewProductDetails" data-node="'+v.enId+'"><button data-id="'+v.id+'" onclick="AddToFavouriteProduct(this,'+v.id+')" class="fav-store-button '+v.isFavritesProductClass+'"><i class="far fa-heart"></i></button>  <a href="javascript:void(0);" data-id="'+v.enId+'" class="productdetailmodal" data-toggle="modal" data-target="#productdetailmodal"><div class="shop-img-box "><img src="'+v.productImage+'" alt="" class="img-fluid"></div><div class="products-text-amnt-box"><div class="product-amt-detail"><h3>$'+v.price+'</h3><p>'+v.name+'</p></div><div class="products-view-pls" onclick="AddToCart(this,'+v.id+')"><button class="plus-prdct"><i class="feather icon-plus"></i></button></div></div></a></div>')]);
                    });
                    on_saleOwl.trigger('refresh.owl.carousel');
                },
                compelete: function(){
                    $(document).find('.loader-icon').hide();
                },
                error: function(jqXHR, exception) {
                  $(document).find('.loader-icon').hide();
              }
          });
        }
    });

}
if ($('.on-sale-products-sliders-pickup').length) {
    var on_saleOwl_load_more_pickup = true;
    var on_saleOwl_pickup = $('.on-sale-products-sliders-pickup').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        margin: 30,
        slideBy:4,
        pagination:true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            430: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });

    $(".on-sale-products-sliders-pickup >.owl-nav > .owl-next").click(function(){
        var lastId  = $('.on-sale-products-sliders-container-pickup').find("#lastId").val();
        var store_id  = $('#store_id').val();
        if(on_saleOwl_load_more_pickup){
            $.ajax({
                url: BASE_URL+'onSale-products',
                type:"POST",
                dataType: 'json',
                data:{nextId:lastId,store_id:store_id,filter_id:'1'},
                beforeSend: function(){
                    $(document).find('.loader-icon').show();
                },
                success: function(res) {
                    $(document).find('.loader-icon').hide();
                    $('.on-sale-products-sliders-container-pickup').append(res.data);
                    $('.on-sale-products-sliders-container-pickup').find("#lastId").val(res.nextId)
                    on_saleOwl_load_more_pickup = res.visible;
                    $.each(res.data, function(k, v) {
                        on_saleOwl_pickup.trigger('add.owl.carousel', [jQuery('<div class="store-contain-box store-product-contain-box viewProductDetails" data-node="'+v.enId+'"><button data-id="'+v.id+'" onclick="AddToFavouriteProduct(this,'+v.id+')" class="fav-store-button '+v.isFavritesProductClass+'"><i class="far fa-heart"></i></button>  <a href="javascript:void(0);" data-id="'+v.enId+'" class="productdetailmodal" data-toggle="modal" data-target="#productdetailmodal"><div class="shop-img-box "><img src="'+v.productImage+'" alt="" class="img-fluid"></div><div class="products-text-amnt-box"><div class="product-amt-detail"><h3>$'+v.price+'</h3><p>'+v.name+'</p></div><div class="products-view-pls" onclick="AddToCart(this,'+v.id+')"><button class="plus-prdct"><i class="feather icon-plus"></i></button></div></div></a></div>')]);
                    });
                    on_saleOwl_pickup.trigger('refresh.owl.carousel');
                },
                compelete: function(){
                    $(document).find('.loader-icon').hide();
                },
                error: function(jqXHR, exception) {
                  $(document).find('.loader-icon').hide();
              }
          });
        }
    });

}

//recommended-products-sliders on store  details page
if ($('.recommended-products-sliders').length) {
    var recommendedOwl_load_more = true;
    var recommendedOwl = $('.recommended-products-sliders').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        margin: 30,
        slideBy:4,
        pagination:true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            430: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });


    $(".recommended-products-sliders >.owl-nav > .owl-next").click(function(){
        var lastId  = $('.recommended-products-sliders-container').find("#lastId").val();
        var store_id  = $('#store_id').val();
        if(recommendedOwl_load_more){
            $.ajax({
                url: BASE_URL+'onSale-products',
                type:"POST",
                dataType: 'json',
                data:{nextId:lastId,store_id:store_id,filter_id:'-1'},
                beforeSend: function(){
                    $(document).find('.loader-icon').show();
                },
                success: function(res) {
                    $(document).find('.loader-icon').hide();
                    $('.recommended-products-sliders-container').append(res.data);
                    $('.recommended-products-sliders-container').find("#lastId").val(res.nextId)
                    recommendedOwl_load_more = res.visible;
                    $.each(res.data, function(k, v) {
                        recommendedOwl.trigger('add.owl.carousel', [jQuery('<div class="store-contain-box store-product-contain-box viewProductDetails" data-node="'+v.enId+'"><button data-id="'+v.id+'" onclick="AddToFavouriteProduct(this,'+v.id+')" class="fav-store-button '+v.isFavritesProductClass+'"><i class="far fa-heart"></i></button>  <a href="javascript:void(0);" data-id="'+v.enId+'" class="productdetailmodal" data-toggle="modal" data-target="#productdetailmodal"><div class="shop-img-box "><img src="'+v.productImage+'" alt="" class="img-fluid"></div><div class="products-text-amnt-box"><div class="product-amt-detail"><h3>$'+v.price+'</h3><p>'+v.name+'</p></div><div class="products-view-pls" onclick="AddToCart(this,'+v.id+')"><button class="plus-prdct"><i class="feather icon-plus"></i></button></div></div></a></div>')]);
                    });
                    recommendedOwl.trigger('refresh.owl.carousel');
                },
                compelete: function(){
                    $(document).find('.loader-icon').hide();
                },
                error: function(jqXHR, exception) {
                  $(document).find('.loader-icon').hide();
              }
          });
        }
    });

}
if ($('.recommended-products-sliders-pickup').length) {
    var recommendedOwl_load_more_pickup = true;
    var recommendedOwl_pickup = $('.recommended-products-sliders-pickup').owlCarousel({
        loop: false,
        nav: true,
        dots: false,
        margin: 30,
        slideBy:4,
        pagination:true,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 1
            },
            430: {
                items: 2
            },
            768: {
                items: 3
            },
            992: {
                items: 4
            }
        }
    });


    $(".recommended-products-sliders-pickup >.owl-nav > .owl-next").click(function(){
        var lastId  = $('.recommended-products-sliders-container-pickup').find("#lastId").val();
        var store_id  = $('#store_id').val();
        if(recommendedOwl_load_more_pickup){
            $.ajax({
                url: BASE_URL+'onSale-products',
                type:"POST",
                dataType: 'json',
                data:{nextId:lastId,store_id:store_id,filter_id:'-1'},
                beforeSend: function(){
                    $(document).find('.loader-icon').show();
                },
                success: function(res) {
                    $(document).find('.loader-icon').hide();
                    $('.recommended-products-sliders-container-pickup').append(res.data);
                    $('.recommended-products-sliders-container-pickup').find("#lastId").val(res.nextId)
                    recommendedOwl_load_more_pickup = res.visible;
                    $.each(res.data, function(k, v) {
                        recommendedOwl_pickup.trigger('add.owl.carousel', [jQuery('<div class="store-contain-box store-product-contain-box viewProductDetails" data-node="'+v.enId+'"><button data-id="'+v.id+'" onclick="AddToFavouriteProduct(this,'+v.id+')" class="fav-store-button '+v.isFavritesProductClass+'"><i class="far fa-heart"></i></button>  <a href="javascript:void(0);" data-id="'+v.enId+'" class="productdetailmodal" data-toggle="modal" data-target="#productdetailmodal"><div class="shop-img-box "><img src="'+v.productImage+'" alt="" class="img-fluid"></div><div class="products-text-amnt-box"><div class="product-amt-detail"><h3>$'+v.price+'</h3><p>'+v.name+'</p></div><div class="products-view-pls" onclick="AddToCart(this,'+v.id+')"><button class="plus-prdct"><i class="feather icon-plus"></i></button></div></div></a></div>')]);
                    });
                    recommendedOwl_pickup.trigger('refresh.owl.carousel');
                },
                compelete: function(){
                    $(document).find('.loader-icon').hide();
                },
                error: function(jqXHR, exception) {
                  $(document).find('.loader-icon').hide();
              }
          });
        }
    });

}



if ($('.custom-scrollbar').length) {
    $('.custom-scrollbar').perfectScrollbar();
}



// ---------Quantity Increase and Decrease
var buttonPlus = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

var incrementPlus = buttonPlus.click(function () {
    var $n = $(this)
    .parent(".qty-container")
    .find(".input-qty");
    // $n.val(Number($n.val()) + 1);
});

var incrementMinus = buttonMinus.click(function () {
    var $n = $(this)
    .parent(".qty-container")
    .find(".input-qty");
    var amount = Number($n.val());
    if (amount > 1) {
        // $n.val(amount - 1);
    }
});







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



// -------cart-sidebar-toggle-------
$(document).ready(function () {
    $(document).on('click', '.toggle-cart-btn, .cart-overlay', function () {
        $(".add-to-cart-sidebar").toggleClass("active");
        $(".cart-overlay").toggleClass("active");
        $('.account-sidebar').removeClass('active');
        $('.account-sidebar-overlay').removeClass('active');
        $('.category-lists-data').removeClass('active');
        $('.category-overlay').removeClass('active');
        $('html').removeClass('category-overflow-hdn');
    });
});



//-------time-selection-slider-------
if ($('#time-selection-slider').length) {
    $('#time-selection-slider').owlCarousel({
        loop: false,
        nav: false,
        dots: false,
        margin: 20,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 2
            },
            400: {
                items: 3
            },
            768: {
                items: 4
            },
            1200: {
                items: 5
            }
        }
    });
}




// -------address-sidebar-toggle-------
$(document).ready(function () {
    $('.address-overlay').on('click', function () {
        $(".add-address-sidebar").toggleClass("active");
        $(".address-overlay").toggleClass("active");
    });
});



//-------store-process-slider-------
if ($('.store-process-slider').length) {
    $('.store-process-slider').owlCarousel({
        loop: false,
        nav: false,
        dots: false,
        margin: 15,
        navText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"],
        responsive: {
            0: {
                items: 3
            },
            480: {
                items: 5
            },
            768: {
                items: 6
            },
            1200: {
                items: 7
            }
        }
    });
}






// -------------rating-star---------
$(document).ready(function () {

    /* 1. Visualizing things on Hover - See next part for action on click */
    $('#stars li').on('mouseover', function () {
        var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on

        // Now highlight all the stars that's not after the current hovered star
        $(this).parent().children('li.star').each(function (e) {
            if (e < onStar) {
                $(this).addClass('hover');
            }
            else {
                $(this).removeClass('hover');
            }
        });

    }).on('mouseout', function () {
        $(this).parent().children('li.star').each(function (e) {
            $(this).removeClass('hover');
        });
    });

    /* 2. Action to perform on click */
    $('#stars li').on('click', function () {
        var onStar = parseInt($(this).data('value'), 10); // The star currently selected
        var stars = $(this).parent().children('li.star');

        for (i = 0; i < stars.length; i++) {
            $(stars[i]).removeClass('selected');
        }

        for (i = 0; i < onStar; i++) {
            $(stars[i]).addClass('selected');
        }

        // JUST RESPONSE (Not needed)
        // var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
        // var msg = "";
        // if (ratingValue > 1) {
        //     msg = "Thanks! You rated this " + ratingValue + " stars.";
        // }
        // else {
        //     msg = "We will improve ourselves. You rated this " + ratingValue + " stars.";
        // }
        // responseMessage(msg);

    });

    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    $('#rate_input').val(ratingValue);
});
// for-remove-selcted-class---------
//$("#stars li").removeClass("selected");

// -----------star-rating-end------------------




// ------------account-sidebar-javascript
$(document).ready(function () {
    $('.account-sidebar-toggle, .account-sidebar-overlay').on('click', function () {
        $('.account-sidebar').toggleClass('active');
        $('.account-sidebar-overlay').toggleClass('active');
    });
});





// ----------profile-image-update---------
function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#imgpreviewPrf').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
}

$("#imgInp").change(function () {
    readURL(this);
});



// ------profile-scroll-----
$("a[href^='#edit-profile-link']").on('click', function (e) {
    e.preventDefault();
    var hash = this.hash;
    $(this).addClass('active');
    $('html, body').animate({
        scrollTop: ($(hash).offset().top - 90)
    }, 500);
});




//-------------clip-borad-
if ($('.copy-letter-button').length) {
    var clipboard = new Clipboard('.copy-letter-button');

    clipboard.on('success', function (e) {
        //alert('Copied');
    });

    clipboard.on('error', function (e) {
        //alert("Failed");
    });
}


//------------chat-scrollbar---------
if ($('.chat-scrollbar').length) {
    $('.chat-scrollbar').perfectScrollbar({
        wheelSpeed: 0.5
    });
    var scrollbottompos = $('.order-chat-list-sec').last().position().top;
    $('.chat-scrollbar').animate({scrollTop: scrollbottompos}, 1000);
}



// --------search-store-box---------
$(document).ready(function (e) {
    $('.edit-button-store, .search-close-icon').click(function (event) {
        $(".serach-store-box").toggleClass("active");
        event.stopPropagation();
    });
    $(".serach-store-box").click(function (event) {
        event.stopPropagation();
    });
    $(document).click(function (event) {
        if (!$(event.target).hasClass('active')) {
            $(".serach-store-box").removeClass("active");
        }
    });

    $(document).on('click', '.delivery-day-box', function (e) {

        $(".delivery-day-box").removeClass('active');
        $(".delivery-free-box").addClass('d-none');
        $(this).addClass('active');
        var nodeId = $(this).data('node');
        $("#" + nodeId).removeClass('d-none');
    });

});

function AddToCart(obj, id) {
    $product_id = id;
    $class = $(obj).attr('class');
    if ($class == 'products-view-pls')
    {
        $qty = 1;
    }
    else {
        $qty = $('#product-qty').val();
    }

    if($class == 'btn-add-cart mr-2 toggle-cart-btn fav')
    {
        $qty = 1;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_addToCart,
        type: "POST",
        data: {product_id: $product_id, qty: $qty},
        dataType: "json",
        async:false,
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status == true) {
                flashMessage('success', res.message);
                getCartData();
            } else {
                flashMessage('error', res.message);
                return false;
            }
        }
    });
}

$('.home-head-small-btn').click(function ()
{
    getCartData();
});


function getCartData()
{
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_cart,
        type: "POST",
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status) {              
                $('.add-to-cart-sidebar').html('');
                $('.add-to-cart-sidebar').html(res.data);
                if(res.count!=0)
                    $(document).find('.cart-badge').html(res.count).removeClass('d-none ');
                else
                    $(document).find('.cart-badge').addClass('d-none');
            }
        }
    });
}


$(document).on('click', '.add-qty', function () {
    $this = $(this);
    var product_id = $(this).data('product_id');
    var record_id = $(this).data('id');
    var title = this.title;
    var qty = $(this).parent().find('.txtRegulars').val();
    if (title == 'Down' && qty == 1) {
        removeProduct(record_id);
        return false;
    }
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: url_RemoveCart,
        data: {'id': record_id, 'title': title, 'product_id': product_id},
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            // flashMessage('success', res.message);   
            var price = parseFloat(res.price) * parseFloat(res.qty);
            $this.parent().parent().find('#price').html('');
            $this.parent().find('.txtRegulars').val("");
            $this.parent().find('.txtRegulars').val(res.qty);
            $this.parent().parent().find('#price').html('$ ' + price.toFixed(2));
            totalPrice();
        }
    });
});
function cartCheck(){
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type: "POST",
        url: url_checkStoreAmount,
        data: '',
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            if(res.status == true) {
                window.location.href='../manage-delivery';
            } else {
                $(document).find('.loader-icon').hide();
                flashMessage('error', res.message);
            }
        }
    });
}

function removeProduct(record_id)
{
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_removeProductCart,
        type: "POST",
        data: {id: record_id},
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status) {
                flashMessage('success', res.message);
                getCartData();
            } else {
                flashMessage('error', res.message);
            }
        }
    });
}

function totalPrice()
{
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_cartTotalPrice,
        type: "POST",
        dataType: "json",
        beforeSend: function () {
            $(document).find('.loader-icon').show();
        },
        success: function (res) {
            $(document).find('.loader-icon').hide();
            $('#total_price').html("");
            $('#total_price').html('$ ' + (res.total_price).toFixed(2));
            $('.total_price').html('$ ' + (res.total_price).toFixed(2));
        }
    });
}

$(document).on('click', '.product-qty', function () {
    var title = $(this).data('title');
    if (title == 'Up') {
        var $n = $(this).parent(".qty-container").find(".input-qty");
        $('#product-qty').val(Number($n.val()) + 1);
    } else {
        var $n = $(this).parent(".qty-container").find(".input-qty");
        var amount = Number($n.val());
        if (amount > 1) {
            $('#product-qty').val(amount - 1);
        }
    }
})


$('#stars li').on('click', function () {
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#stars li.selected').last().data('value'), 10);
    $('#rate_input').val(ratingValue);
});


$('#shopperStars li').on('click', function () {
    var onStar = parseInt($(this).data('value'), 10); // The star currently selected
    var stars = $(this).parent().children('li.star');

    for (i = 0; i < stars.length; i++) {
        $(stars[i]).removeClass('selected');
    }

    for (i = 0; i < onStar; i++) {
        $(stars[i]).addClass('selected');
    }

    // JUST RESPONSE (Not needed)
    var ratingValue = parseInt($('#shopperStars li.selected').last().data('value'), 10);
    $('#rate').val(ratingValue);
});

$('#reviewShopperModal').on('show.bs.modal', function(event) {
    $('#rate_input').val(2);
    $('#driver_review_form').trigger('reset');;
});

$('#reviewmodal').on('show.bs.modal', function(event) {
    $('#rate').val(2);
    $('#shpper_review_form').trigger('reset');
});

function emailsubscribe()
{
    $("#subscriptionModal").modal('show');
}

$("#subscribeform").validate({
    errorClass:"text-danger", 
    rules: {
        'email': {
            required: true,
            email:true,
        },
    },
    messages: {
        'email': {
            required: "Email is required",
            email:"Email must have valid format",
        },
    },
    submitHandler: function (form,event) {
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_subscribe_email,
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
                    $("#subscribeform").trigger('reset');
                    $("#subscriptionModal").modal('hide');
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

function addAllToCart(obj, ids) {
    $product_ids = ids;
    $class = $(obj).attr('class');
    $qty = 1;
    $.ajax({
        url: BASE_URL + "addAllToCart",
        type: "POST",
        data: {product_ids: $product_ids, qty: $qty},
        dataType: "json",
        success: function (res) {
            $(document).find('.loader-icon').hide();
            if (res.status == true) {
                flashMessage('success', res.message);
                getCartData();
            } else {
                flashMessage('error', res.message);
                return false;
            }
        }
    });
}

$("#becomepartnerform").validate({
    errorClass:"text-danger", 
    rules: {
        'email': {
            required: true,
            email:true,
        },
        'name' :{
            required :true,minlength:4 , lettersonly: true
        },
        'store_name':{
            required:true,
        },
        'store_address':{
            required:true
        },
        'mobile':{
            required:true,
            number:true,
            minlength:8,
            maxlength:10,
        }
    },
    messages: {
        'email': {
            required: "Email field is required",
            email:"Email must have valid format",
        },
        'name': {
            required:"Name field is required"
        },
        'store_name' :{
            required:"Store name field is required"
        },
        'store_address' :{
            required:"Store address field is required"
        },
    },
    submitHandler: function (form,event) {
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_become_partner,
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
                    $("#becomePartnerForm").trigger('reset');
                    $("#becomePartnerModal").modal('hide');
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
                // flashMessage('error',jqXHR.statusText);
            }
        });
    },
});

$('#becomeShopperAddressForm').validate({
    errorClass:"text-danger", 
    rules: {
        'zipcode': {
            required: true,
        },
    },
    messages: {
        'zipcode': {
            required: "Postcode is required",
        },
    },
    submitHandler: function (form,event) {
        var data = new FormData(form);
        var zipcode =  data.get('zipcode');
        event.preventDefault();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url_check_postcode,
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
                if(res.status == true){
                    $('#postdata').text(zipcode);
                    $('#becomeShopperAddressModal').modal('hide');
                    $('#becomeshopperform').trigger('reset');
                    $('#becomeShopperModal').modal('show');
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

$('#becomeshopperform').validate({
    errorClass:"text-danger", 
    rules: {
        'email': {
            required: true,
            email:true
        },
        mobile:{
            required:true,
            number:true,
            minlength:8,
            maxlength:10,
        },
        'first_name':{
           required :true,minlength:3 , lettersonly: true
       },
       'last_name':{
           required :true,minlength:3 , lettersonly: true
       }
   },
   messages: {
    'email': {
        required: "Email is required",
    },
    'mobile' :{
        required:"Mobile is required"
    },
    'first_name':{
        required:"First Name is required"
    },
    'last_name':{
        required:"Last Name is required"  
    }
},
submitHandler: function (form,event) {
    event.preventDefault();
    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: url_become_shopper,
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
                $("#becomeShopperForm").trigger('reset');
                $("#becomeShopperModal").modal('hide');
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
            });        }
    });
},
});

$.validator.addMethod("lettersonly", function (value, element) {
   return this.optional(element) || /^[a-z\s]+$/i.test(value);
})
    // -----store-tracking-slider------------
    $(window).on('load resize',function(){


        if ($('#store-track-slider').length) {
            $('#store-track-slider').owlCarousel({
                loop:true,
                nav:false,
                dots: false,
                // autoplay:true,
                // autoplayTimeout: 1500,
                // autoplayHoverPause:true,
                navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
                responsive:{
                    0:{
                        items:3
                    },
                    480:{
                        items:5
                    },
                    768:{
                        items:2
                    },
                    1200:{
                        items:2
                    }
                }
            });
        }
    });

    // $(document).ready(function(){
    //     var html = '';   
    //     var owl = $('.owl-carousel').owlCarousel({
    //         loop:true,
    //         smartSpeed: 100,
    //         autoplay: true,
    //         autoplaySpeed: 100,
    //         mouseDrag: false,
    //         margin:10,
    //         animateIn: 'slideInUp',
    //         animateOut: 'fadeOut',
    //         nav:false,
    //         responsive:{
    //             0:{
    //                 items:1
    //             },
    //             600:{
    //                 items:1
    //             },
    //             1000:{
    //                 items:1
    //             }
    //         }
    //     });
    //     $.ajax({
    //       url: 'https://randomuser.me/api/?results=20&gender=male&nat=us',
    //       dataType: 'json',
    //       success: function(data) {
    //         console.log(data.results);
    //         $.each(data.results, function(k, v) {
    //             var random_num =  Math.floor(Math.random()*60);
    //             owl.trigger('add.owl.carousel', [jQuery('<div class="notification-message"> <img src="'+v.picture.thumbnail+'" class="user-image" alt=""> <div class="user-name">'+ v.name.first+' '+v.name.last+' <span class="lighter">from '+v.location.city+'</span></div> <div class="bought-details">Bought This <br>'+random_num+' minutes ago</div> </div>')]);
    //         });
    //         owl.trigger('refresh.owl.carousel');





    //     }
    // });

    // });




    $( '.section-scroll' ).on( 'click', function(e){
      var href = $(this).attr( 'href' );
      $( 'html, body' ).animate({
        scrollTop: $( href ).offset().top - 62.2
    }, '300' );
      e.preventDefault();

  });