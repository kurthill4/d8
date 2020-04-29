// Custom _toggleArrow() function
/*function _toggleArrow(ele) {
  $(ele).toggleClass('fa-chevron-down').effect('pulsate', 'fast');
}*/
var pushDown = document.getElementById("push");




(function($) {
  $('a.mobile-menu').click(function(){
    $("#berder").toggleClass("fa-rotate-90");
    $("#mobilespace").toggleClass("pushspace");
    if($(pushDown).hasClass("push")){
      pushDown.className = "pushUp";
    }
    else{
      pushDown.className = "push";
    }
  })
}(jQuery));




/**

	Get browser version and do browser-dependent CSS settings\

**/

(function($) {
	var BrowserDetect = {
		init: function () {
		    this.browser = this.searchString(this.dataBrowser) || "Other";
		    this.version = this.searchVersion(navigator.userAgent) || this.searchVersion(navigator.appVersion) || "Unknown";
		},
		searchString: function (data) {
		    for (var i = 0; i < data.length; i++) {
		        var dataString = data[i].string;
		        this.versionSearchString = data[i].subString;

		        if (dataString.indexOf(data[i].subString) !== -1) {
		            return data[i].identity;
		        }
		    }
		},
		searchVersion: function (dataString) {
		    var index = dataString.indexOf(this.versionSearchString);
		    if (index === -1) {
		        return;
		    }

		    var rv = dataString.indexOf("rv:");
		    if (this.versionSearchString === "Trident" && rv !== -1) {
		        return parseFloat(dataString.substring(rv + 3));
		    } else {
		        return parseFloat(dataString.substring(index + this.versionSearchString.length + 1));
		    }
		},

		dataBrowser: [
		    {string: navigator.userAgent, subString: "Edge", identity: "MS Edge"},
		    {string: navigator.userAgent, subString: "MSIE", identity: "Explorer"},
		    {string: navigator.userAgent, subString: "Trident", identity: "Explorer"},
		    {string: navigator.userAgent, subString: "Firefox", identity: "Firefox"},
		    {string: navigator.userAgent, subString: "Opera", identity: "Opera"},  
		    {string: navigator.userAgent, subString: "OPR", identity: "Opera"},  
		    {string: navigator.userAgent, subString: "Chrome", identity: "Chrome"}, 
		    {string: navigator.userAgent, subString: "Safari", identity: "Safari"}       
		]
	    };
	    
	BrowserDetect.init();

	if(BrowserDetect.browser == 'Explorer') {
		$('.planning svg').attr({"width":"1377.73","height":"826.23175"});
	}
}(jQuery));



/*(function($) {
        $('.slick').slick({
	    arrows:true,
            prevArrow:"<button type='button' class='slick-prev pull-left'><i class='fa fa-chevron-left' aria-hidden='true'></i></button>",
            nextArrow:"<button type='button' class='slick-next pull-right'><i class='fa fa-angle-right' aria-hidden='true'></i></button>"
        });
    }(jQuery));*/

  // Searchbar show/hide controls.
(function ($) {
	Drupal.behaviors.toggleSearch = {
		attach: function(context,settings) {
			$('.top-links a.search').unbind('click').click(function() {
				$('.search-desktop').slideToggle();
				$('#edit-keys').focus();
			});
		}
	};
})(jQuery);

(function ($) {
	$('a.esars-prime').addClass('esars');
	$("a.esars").click(function(event){
		event.preventDefault();
	});
	$('#lastSemesterEnroll,#oneSemesterComplete,#termAgreement').click(function() {
		var last = $('#lastSemesterEnroll').prop('checked');
		var one = $('#oneSemesterComplete').prop('checked');
		var term = $('#termAgreement').prop('checked');
	    	if(last == true && one == true && term == true) {
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

/*
(function ($) {
	$('#esars').hide();
	$('#lastSemesterEnroll,#oneSemesterComplete,#termAgreement').click(function() {
		var last = $('#lastSemesterEnroll').prop('checked');
		var one = $('#oneSemesterComplete').prop('checked');
		var term = $('#termAgreement').prop('checked');
	    	if(last == true && one == true && term == true) {
			$('#esars').show();
		}
		else {
			$('#esars').hide();
		}
	  });
})(jQuery);
*/


/*
 (function ($, Drupal, settings) {

  "use strict";

  
  // Campus alert toggle.
  $('.campus-alert .fa-chevron-up').click(function() {
    $('.campus-alert, .ca-block').fadeToggle('slow');
  }
})(jQuery);

(function ($) {

  // Up/down arrow on mobile for Important Dates.
  $('.important-dates .fa-chevron-up').click(function() {
    $(this).next().next().slideToggle('fast', function() {
      _toggleArrow($(this).prev().prev());
    });
  }
})(jQuery);


  // Up/down arrow on mobile for News-and-Events and Most-recent-jobs-internships and ID block.
(function ($) {
  var i = 1;
  $('.news-block .fa-chevron-up, .recent-jobs .fa-chevron-up, .id-block .fa-chevron-up').click(function() {
    $(this).next().children().not(':first').slideToggle('fast', function() {
      if (i == 1)
        _toggleArrow($(this).parents('.container-fluid').prev());
      i++;
    }(jQuery));
    i = 1;
  }
})(jQuery);

  // Up/down arrow on mobile for Mission Statement and Recent Tweets.
(function ($) {
  $('.mr-block .fa-chevron-up').click(function() {
    $(this).parent().find('p').slideToggle('fast', function() {
       _toggleArrow($(this).parent().find('i'));
    }
  });
})(jQuery);*/
