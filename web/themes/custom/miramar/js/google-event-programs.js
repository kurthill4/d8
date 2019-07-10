/**
 * @file
 * Initialize multiselect.

 */

(function ($) {
	$('.slick__slide a').each(function() {
		if($(this).has('img').length) {
			label = $(this).find('img').attr('alt');
		}
		else {
			label = $(this).text();
		}
		
		$(this).on('click',{ a: label },function(e){ga('send','event','Program','Slider',e.data.a)});
	});
}(jQuery));

(function ($) {
	$('a.numbers').each(function() {
		label = $(this).find('img').attr('alt');
		$(this).on('click',{ a: label },function(e){ga('send','event','Numbers','By_The_Numbers',e.data.a)});
	});
}(jQuery));

(function ($) {
	$('#selectProgram').on('change',{ a: $('#selectProgram :selected').text() },function(e){ga('send','event','Program','Dropdown',e.data.a)});
}(jQuery));

