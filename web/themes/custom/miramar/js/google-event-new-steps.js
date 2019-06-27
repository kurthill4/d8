/**
 * @file
 * Send event info to Google for Future Students pathway.
 *
 */


(function ($) {
	$('.step-desc a[href*="/campus/outreach-office"]').on('click',function(){ga('send','event','NewStudentSteps','Tour','Future_Students_Step_1')});
}(jQuery));

(function ($) {
	$('.step-desc a[href$="apply.sdccd.edu"]').on('click',function(){ga('send','event','NewStudentSteps','Apply','Future_Students_Step_2')});
}(jQuery));

(function ($) {
	$('.step-desc a[href*="/campus/counseling/orientation"]').on('click',function(){ga('send','event','NewStudentSteps','Orientation','Future_Students_Step_3')});
}(jQuery));

(function ($) {
	$('.step-desc a[href*="/campus/assessment"]').on('click',function(){ga('send','event','NewStudentSteps','Assessment','Future_Students_Step_4')});
}(jQuery));

(function ($) {
	$('.step-desc a[href*="/campus/counseling/edplan"]').on('click',function(){ga('send','event','NewStudentSteps','SEP','Future_Students_Step_5')});
}(jQuery));

(function ($) {
	$('.step-desc a[href*="my.sdccd.edu"]').on('click',function(){ga('send','event','NewStudentSteps','Register','Future_Students_Step_6')});
}(jQuery));

(function ($) {
	$('.step-desc a[href*="/campus/resources"]').on('click',function(){ga('send','event','NewStudentSteps','Resources','Future_Students_Step_7')});
}(jQuery));



