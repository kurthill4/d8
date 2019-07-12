/**
 * @file
 * Send event info to Google.

 */
(function ($) {
	$('a[href*="apply.sdccd.edu"]').not("div.step-desc a").not('.call-menu a').on('click',function(){ga('send','event','Apply Now','Apply Nonstep',window.location.pathname)});
}(jQuery));

(function ($) {
	$('.view-homepage-news-features a').on('click',function(){ga('send','event','News','News Feature',window.location.pathname)});
}(jQuery));

