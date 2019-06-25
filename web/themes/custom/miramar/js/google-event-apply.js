/**
 * @file
 * Send event info to Google.

 */
(function ($) {
	$('a[href*="http://apply.sdccd.edu"]').on('click',function(){ga('send','event','OpenCCCApply','ApplyNow','Apply_Now_Link')});
}(jQuery));

(function ($) {
	$('a[href*="https://apply.sdccd.edu"]').on('click',function(){ga('send','event','OpenCCCApply','ApplyNow','Apply_Now_Link')});
}(jQuery));


