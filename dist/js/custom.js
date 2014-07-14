$('.navbar .dropdown').hover(function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(250).slideDown();
}, function() {
  $(this).find('.dropdown-menu').first().stop(true, true).delay(100).slideUp()
});

//making accordian anchor working
$(document).ready(function(e) {
    $(document).on('click', '.panel-custom a', function() { 
		$(this).void ();
	});
});