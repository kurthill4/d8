/**
 * @file
 * Initialize multiselect.

 */

(function ($) {
	$('.call a, .callsmall a').each(function() {
		label = $(this).text();
		$(this).on('click',{ a: label },function(e){ga('send','event','Call to Action',window.location.pathname,e.data.a)});
	});
}(jQuery));

