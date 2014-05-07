$(document).ready(function() {
	$('button.navbar-toggle').on('click', function() {
		if($('.nav-collapse').hasClass('collapse')) {
			$('.nav-collapse').removeClass('collapse');
		} else {
			$('.nav-collapse').addClass('collapse');			
		}
	});
});