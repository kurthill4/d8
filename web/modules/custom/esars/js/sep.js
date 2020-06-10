(function ($) {
	$('a.sep-prime').addClass('sep');
	$("a.sep").click(function(event){
		event.preventDefault();
	});
	$('#haveSDCCDApp,#haveTranscripts,#termAgreement').click(function() {
		var app = $('#haveSDCCDApp').prop('checked');
		var trans = $('#haveTranscripts').prop('checked');
		var term = $('#termAgreement').prop('checked');
	    	if(app == true && trans == true && term == true) {
			$('a.sep-prime').removeClass('sep');
			$('a.sep-prime').off('click');
		}
		else {
			$('a.sep-prime').addClass('sep');
			$("a.sep").click(function(event){
			  event.preventDefault();
			});
		}
	  });
})(jQuery);

