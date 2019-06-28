/**
 * @file
 * Send event info to Google.

 */
(function ($) {
	$('a[href*="apply.sdccd.edu"]').not("div.step-desc a").on('click',function(){ga('send','event','Apply_NonStep','ApplyNow','Apply_Now_Link')});
}(jQuery));

