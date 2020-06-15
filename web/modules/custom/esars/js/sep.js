(function($) {
	hideLink();

	$('#haveSDCCDApp,#haveFirst,#haveOrientation,#haveVideo').click(function() {
		app = $('#haveSDCCDApp').prop('checked');
		first = $('#haveFirst').prop('checked');
		orie = $('#haveOrientation').prop('checked');
		video = $('#haveVideo').prop('checked');

		if(app == true && first == true && orie == true && video == true) { 
			if(source1 == true && $('#termAgreement').prop('checked') == true) {
				showLink();
			}
		}
		else {
			hideLink();
		}
	});

	$('input:radio[name=source]').click(function () {
		source1 = $(this).prop('checked');
		if(source1 == true && app == true && first == true && orie == true && video == true && $('#termAgreement').prop('checked') == true) {
			$( "#termAgreement" ).trigger( "click" );
			$('#termAgreement').prop('checked',true);
			showLink();
		}
	});

	$('#termAgreement').click(function() {
		
		if(app == true && first == true && orie == true && video == true && source1 == true && $(this).prop('checked') == true) { 
			showLink();
		}
		else {
			hideLink();
		}

	});
	
	function hideLink() {
		$('a.sep-prime').addClass('sep');
		$("a.sep").click(function(event) {
		  event.preventDefault();
		});
	}

	function showLink() {
		$('a.sep-prime').removeClass('sep');
		$('a.sep-prime').off('click');
	}

})(jQuery);

