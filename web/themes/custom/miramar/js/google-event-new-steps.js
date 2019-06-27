/**
 * @file
 * Send event info to Google for Future Students pathway.
 *
 */

var step = [
	['/campus/outreach-office','Tour'],
	['apply.sdccd.edu','Apply'],
	['/campus/counseling/orientation','Orientation'],
	['/campus/assessment','Assessment'],
	['/campus/counseling/edplan','SEP'],
	['my.sdccd.edu','Register'],
	['/resources','Resources']
];

(function ($) {
	for(var i=0;i<step.length;i++) {
		j = i + 1;
		url = step[i][0];
		action = step[i][1];
		label = 'Future_Students_Step_' + j;
		stringOut = "'send','event','NewStudentSteps','" + action + "','" + label + "'";
		$('.step-desc a[href$="' + url + '"]').on('click',function(){ga(stringOut);});
	}
}(jQuery));




