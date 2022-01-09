//-------loader-----------
$(window).on('load', function() {
	$('.preloader').fadeOut('slow');
})



// --------header--------------
$(document).ready(function() {
	$('.toggle-btn').on('click', function(){
		$('.menu-part').css({"left":'0%'});
		$('.overlay-bg').css({"opacity":'1', "visibility":'visible'});
		$('.account-sidebar').removeClass('active');
		$('.account-sidebar-overlay').removeClass('active');
		$('html').toggleClass('menu-sidebar-overflow-hdn');
		$('html').removeClass('account-sidebar-overflow-hdn');
		$('.category-lists-data').removeClass('active');
		$('.category-overlay').removeClass('active');
		$('html').removeClass('category-overflow-hdn');
	});
	$('.close-menu').on('click', function(){
		$('.menu-part').css({"left":'-100%'});
		$('.overlay-bg').css({"opacity":'0', "visibility":'hidden'});
		$('html').toggleClass('menu-sidebar-overflow-hdn');
	});
	$('.overlay-bg').on('click', function(){
		$('.menu-part').css({"left":'-100%'});
		$(this).css({"opacity":'0', "visibility":'hidden'});
		$('html').toggleClass('menu-sidebar-overflow-hdn');
	});
});



// ------------on scroll--add-class-header-sticky--------
$(window).on('scroll load',function() {    
	var scroll = $(window).scrollTop();
	if (scroll < 50) {
		$(".header-wrapper").removeClass("sticky");
	}else{
		$(".header-wrapper").addClass("sticky");
	}
});




// --------------add active class-on another-page move----------
jQuery(document).ready(function($){
	// Get current path and find target link
	var path = window.location.pathname.split("/").pop();

	// Account for home page with empty path
	if ( path == '' ) {
		path = 'index.html';
	}

	var target = $('.nav-bar ul li a[href="'+path+'"]');
	// Add active class to target link
	target.parent().addClass('active');

	var target2 = $('.account-right ul li a[href="'+path+'"]');
	// Add active class to target2 link
	target2.parent().addClass('active');

	var target3 = $('.account-sidebar ul li a[href="'+path+'"]');
	// Add active class to target2 link
	target3.parent().addClass('active');
	
});



// -------home-slider------------------
if ($('#home-slider').length) {
	$('#home-slider').owlCarousel({
	    loop:true,
	    animateOut: 'fadeOut',
	    animateIn: 'fadeIn',
	    mouseDrag: false,
	    touchDrag:false,
	    nav:false,
	    items:1
	});
}

if ($('.store-double-slider').length) {
	$('.store-double-slider').owlCarousel({
	    loop:true,
	    nav:true,
	    dots: false,
	    margin: 30,
	    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	    responsive:{
	        0:{
	            items:1
	        },
	        430:{
	            items:2
	        },
	        768:{
	            items:3
	        },
	        992:{
	            items:4
	        }
	    }
	});
}


if ($(".fav-store-button").length) {
	$(".fav-store-button").click(function(){
		$(this).toggleClass("active");
	});
}


// -------products-slider-----------
if ($('.products-sliders').length) {
	$('.products-sliders').owlCarousel({
	    loop:true,
	    nav:true,
	    dots: false,
	    margin: 30,
	    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	    responsive:{
	        0:{
	            items:1
	        },
	        430:{
	            items:2
	        },
	        768:{
	            items:3
	        },
	        992:{
	            items:5
	        }
	    }
	});
}


//-----------product-slider-modal----------
if ($('.products-sliders-modal').length) {
	$('.products-sliders-modal').owlCarousel({
	    loop:true,
	    nav:true,
	    dots: false,
	    margin: 30,
	    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	    responsive:{
	        0:{
	            items:1
	        },
	        430:{
	            items:2
	        },
	        768:{
	            items:2
	        },
	        992:{
	            items:3
	        },
	        1200:{
	            items:5
	        }
	    }
	});
}




// -------delivery-hours-slider-----------
if ($('#delivery-days-slider').length) {
	$('a[data-toggle="pill"]').on('shown.bs.tab', function() {	
		$($(this).attr('href')).find('#delivery-days-slider').owlCarousel({
			loop:false,
		    nav:true,
		    dots: false,
		    margin: 15,
		    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
		    responsive:{
		        0:{
		            items:2
		        },
		        400:{
		            items:3
		        },
		        480:{
		            items:4
		        },
		        768:{
		            items:3
		        },
		        992:{
		            items:5
		        },
		        1200:{
		            items:6
		        }
		    }
		})
	});
}




if ($('.custom-scrollbar').length) {
  	$('.custom-scrollbar').perfectScrollbar({
  		wheelSpeed: 0.5
  	});
}



// ---------Quantity Increase and Decrease
var buttonPlus  = $(".qty-btn-plus");
var buttonMinus = $(".qty-btn-minus");

var incrementPlus = buttonPlus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  $n.val(Number($n.val())+1 );
});

var incrementMinus = buttonMinus.click(function() {
  var $n = $(this)
  .parent(".qty-container")
  .find(".input-qty");
  var amount = Number($n.val());
  if (amount > 1) {
    $n.val(amount-1);
  }
});







// --------product-main-detail-slider---------
if ($('#product-detail-slider').length) {
	$('#product-detail-slider').owlCarousel({
	    loop:true,
	    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	    nav:true,
	    dots: false,
	    items:1,
	    autoHeight:true
	});
}



// -------cart-sidebar-toggle-------
$(document).ready(function() {
	$('.toggle-cart-btn, .cart-overlay').on('click', function(){
		$(".add-to-cart-sidebar").toggleClass("active");
		$(".cart-overlay").toggleClass("active");
		$('.account-sidebar').removeClass('active');
		$('.account-sidebar-overlay').removeClass('active');
		$('html').toggleClass('cart-sidebar-overflow-hdn');
		$('html').removeClass('account-sidebar-overflow-hdn');
		$('.category-lists-data').removeClass('active');
		$('.category-overlay').removeClass('active');
		$('html').removeClass('category-overflow-hdn');
	});
});



//-------time-selection-slider-------
if ($('#time-selection-slider').length) {
	$('#time-selection-slider').owlCarousel({
	    loop:false,
	    nav:false,
	    dots: false,
	    margin: 20,
	    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	    responsive:{
	        0:{
	            items:2
	        },
	        400:{
	            items:3
	        },
	        768:{
	            items:4
	        },
	        1200:{
	            items:5
	        }
	    }
	});
}




// -------address-sidebar-toggle-------
$(document).ready(function() {
	$('.address-toggle-btn, .address-overlay').on('click', function(){
		$(".add-address-sidebar").toggleClass("active");
		$(".address-overlay").toggleClass("active");
		$('html').toggleClass('address-sidebar-overflow-hdn');
	});
});



//-------store-process-slider-------
if ($('.store-process-slider').length) {
	$('.store-process-slider').owlCarousel({
	    loop:false,
	    nav:false,
	    dots: false,
	    margin: 15,
	    navText : ["<i class='fa fa-chevron-left'></i>","<i class='fa fa-chevron-right'></i>"],
	    responsive:{
	        0:{
	            items:3
	        },
	        480:{
	            items:5
	        },
	        768:{
	            items:6
	        },
	        1200:{
	            items:7
	        }
	    }
	});
}






// -------------rating-star---------
$(document).ready(function(){
 
 /* 1. Visualizing things on Hover - See next part for action on click */
 $('#stars li').on('mouseover', function(){
	 var onStar = parseInt($(this).data('value'), 10); // The star currently mouse on
 
	 // Now highlight all the stars that's not after the current hovered star
	 $(this).parent().children('li.star').each(function(e){
		 if (e < onStar) {
			 $(this).addClass('hover');
		 }
		 else {
			 $(this).removeClass('hover');
		 }
	 });
	 
 }).on('mouseout', function(){
	 $(this).parent().children('li.star').each(function(e){
		 $(this).removeClass('hover');
	 });
 });
 
 /* 2. Action to perform on click */
 $('#stars li').on('click', function(){
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
});
// for-remove-selcted-class---------
//$("#stars li").removeClass("selected");

// -----------star-rating-end------------------




// ------------account-sidebar-javascript
$(document).ready(function() {
	$('.account-sidebar-toggle, .account-sidebar-overlay').on('click', function(){
		$('.account-sidebar').toggleClass('active');
		$('.account-sidebar-overlay').toggleClass('active');
		$('html').toggleClass('account-sidebar-overflow-hdn');
	});
});





// ----------profile-image-update---------
function readURL(input) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();
		
		reader.onload = function(e) {
			$('#imgpreviewPrf').attr('src', e.target.result);
		}
		
		reader.readAsDataURL(input.files[0]); // convert to base64 string
	}
}

$("#imgInp").change(function() {
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

	clipboard.on('success', function(e) {
	   //alert('Copied');
	});

	clipboard.on('error', function(e) {
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
$(document).ready(function(e) {
  	$('.edit-button-store, .search-close-icon').click(function(event) {
    	$(".serach-store-box").toggleClass("active");
    	event.stopPropagation();
  	});
  	$(".serach-store-box").click(function(event) {
  		event.stopPropagation();
  	});
  	$(document).click(function(event) {
    	if (!$(event.target).hasClass('active')) {
      		$(".serach-store-box").removeClass("active");
    	}
  	});
});




// -----store-tracking-slider------------
if ($('#store-track-slider').length) {
	$('#store-track-slider').owlCarousel({
	    loop:true,
	    nav:false,
	    dots: false,
	    autoplay:true,
    	autoplayTimeout: 1500,
    	autoplayHoverPause:true,
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






// ------------category-javascript
$(document).ready(function() {
	$('.category-toggle, .category-overlay').on('click', function(){
		$('.category-lists-data').toggleClass('active');
		$('.category-overlay').toggleClass('active');
		$('html').toggleClass('category-overflow-hdn');
	});
});