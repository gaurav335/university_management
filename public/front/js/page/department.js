$(document).ready(function() {
	$('.category-toggle, .category-overlay').on('click', function(){
	$('.category-lists-data').toggleClass('active');
	$('.category-overlay').toggleClass('active');
	$('html').toggleClass('category-overflow-hdn');
	});
});


 $("#search-department").validate({
    submitHandler: function (form, event) {
        event.preventDefault();
       	var currentURL = window.location;
		var search =  $('#search').val();
		window.location.href = currentURL + "&search=" +search;
    },
});