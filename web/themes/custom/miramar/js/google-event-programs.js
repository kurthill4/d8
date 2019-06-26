/**
 * @file
 * Initialize multiselect.

 */
(function ($) {
	$('.slick__slide a').on('click',function(){ga('send','event','Program','Slider','Clickthrough')});
}(jQuery));

(function ($) {
	$('#selectProgram option').on('change',function(){ga('send','event','Program','Drop','Clickthrough')});
}(jQuery));

(function ($) {
	$('.numbers a').on('click',function(){ga('send','event','Numbers','By_The_Numbers','Clickthrough')});
}(jQuery));
