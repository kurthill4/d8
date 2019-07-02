/**
 * @file
 * Send event info to Google for Current Students pathway.
 *
 */

var step = [
	['/campus/careerservices','Career'],
	['/campus/counseling/edplan','SEP'],
	['/campus/transfer','Transfer'],
	['/campus/counseling/orientation','Orientation'],
	['/campus/counseling','Counseling'],
	['/campus/studentaffairs/asg','StudentLife'],
	['/graduating-students','Graduation']
];

(function ($) {
	for(var i=0;i<step.length;i++) {
		url = step[i][0];
		action = step[i][1];
		label = 'Current_Students_Step_' + (i + 1);
		$('.step-desc a[href*="' + url + '"]').on('click',{a: action,l: label},function(e){ga('send','event',e.data.a,e.data.l);});
	}
}(jQuery));






