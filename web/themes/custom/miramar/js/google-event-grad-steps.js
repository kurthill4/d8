/**
 * @file
 * Send event info to Google for Graduating Students pathway.
 *
 */

var step = [
	['/campus/counseling','Eligibility'],
	['/campus/graduation/steps-to-graduate','Apply To Graduate'],
	['/campus/graduation/getgear','Gear'],
	['/campus/graduation/checklist','Checklist'],
	['http://alumni.sdccd.edu/?page=Miramar','Alumni']
];

(function ($) {
	for(var i=0;i<step.length;i++) {
		url = step[i][0];
		action = step[i][1];
		label = 'Graduating Students Step ' + (i + 1);
		$('.step-desc a[href*="' + url + '"]').on('click',{a: action,l: label},function(e){ga('send','event',e.data.a,e.data.l);});
	}
}(jQuery));






