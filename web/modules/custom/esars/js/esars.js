(function ($) {
	$('a.esars-prime').addClass('esars');
	$("a.esars").click(function(event){
		event.preventDefault();
	});
	$('#haveSDCCDApp,#haveTranscripts,#termAgreement').click(function() {
		var app = $('#haveSDCCDApp').prop('checked');
		var trans = $('#haveTranscripts').prop('checked');
		var term = $('#termAgreement').prop('checked');
		
	    if(app == true && trans == true && term == true) {
			$('a.esars-prime').removeClass('esars');
			$('a.esars-prime').off('click');
		}
		else {
			$('a.esars-prime').addClass('esars');
			$("a.esars").click(function(event){
			  event.preventDefault();
			});
		}
	  });
})(jQuery);

