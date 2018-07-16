/**
 * @file
 * Initialize multiselect.

 */
(function ($) {
	$('.slick__slide a').on('click',function(){ga('send','Program','Slider','Clickthrough')});
}(jQuery));

(function ($) {
	$('#selectProgram option').on('change',function(){ga('send','Program','Drop','Clickthrough')});
}(jQuery));
