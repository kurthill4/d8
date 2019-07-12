/**
 * @file
 * Google code for tracking program clicks.

 */

(function ($) {
	$('.program a').each(function() {
		if($(this).has('img').length) {
			label = $(this).find('img').attr('alt');
		}
		else {
			label = $(this).text();
		}
		
		$(this).on('click',{ a: label },function(e){ga('send','event','Program','Programs_Page',e.data.a)});
	});
}(jQuery));

