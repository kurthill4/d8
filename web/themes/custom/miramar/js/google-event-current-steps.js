/**
 * @file
 * Send event info to Google for Current Students pathway.
 *
 */

var step = [
	['/campus/careerservices','Career'],
	['/campus/counseling/edplan','SEP'],
	['/campus/transfer','transfer'],
	['/campus/counseling/orientation','Orientation'],
	['/campus/counseling','Counseling'],
	['/campus/studentaffairs/asg','StudentLife'],
	['/graduating-students','Graduation']
];

(function ($) {
	for(var i=0;i<step.length;i++) {
		j = i + 1;
		url = step[i][0];
		action = step[i][1];
		label = 'Current_Students_Step_' + j;
		stringOut = "'send','event','CurrStudentSteps','" + action + "','" + label + "'";
		$('.step-desc a[href$="' + url + '"]').on('click',function(){ga(stringOut);});
	}
}(jQuery));




