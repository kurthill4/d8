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
		url = step[i][0];
		action = step[i][1];
		label = 'Future Students Step ' + (i + 1);
		$('.step-desc a[href*="' + url + '"]').on('click',{a: action,l: label},function(e){ga('send','event',e.data.a,e.data.l);});
	}
}(jQuery));




