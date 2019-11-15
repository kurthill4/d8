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

(function ($) {
	$('.call-menu a').each(function() {
		label = $(this).text();
		$(this).on('click',{ a: label },function(e){ga('send','event','Call to Action--Nav Bar','Homepage',e.data.a)});
	});
}(jQuery));
(function ($) {
	$('.adbuttons a,.adtext a').each(function() {
		label = $(this).text();
		$(this).on('click',{ a: label },function(e){ga('send','event','Call to Action--Ad Button','Homepage',e.data.a)});
	});
}(jQuery));

