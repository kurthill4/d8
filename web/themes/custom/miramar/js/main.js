// Custom _toggleArrow() function
function _toggleArrow(ele) {
  $(ele).toggleClass('fa-chevron-down').effect('pulsate', 'fast');
}
var pushDown = document.getElementById("push");




(function($) {
  $('a.mobile-menu').click(function(){
    if($(pushDown).hasClass("push")){
      pushDown.className = "pushUp";
    }
    else{
      pushDown.className = "push";
    }
  })
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
	Drupal.behaviors.closeSearch = {
		attach: function(context,settings) {
		  $('.search-desktop a.close-x').unbind('click').click(function() {
		    $(this).parent().fadeToggle();
		    $('#edit-keys').blur();
		  });
		}
	};
})(jQuery);

(function ($) {
	$('a.sched').click(function(evt) {
		evt.preventDefault();

/*var data = {
    "SSR_CLSRCH_WRK_CAMPUS$1": "MIRA"
}

	fetch("https://myportal.sdccd.edu/psp/CSGUEST/EMPLOYEE/SA/c/COMMUNITY_ACCESS.CLASS_SEARCH.GBL?X_DEF_OPT=CLASS_SRCH_WRK2_ACAD_CAREER%24268%24&X_DEF_VAL=UGRD", {
		mode: "no-cors",
		method: "POST",
		body:  JSON.stringify(data)
	})
	.then(res => res.ok ? res.json() : Promise.reject(res));*/
                $.ajax({
                  type: 'POST',
                  crossDomain: true,
                  beforeSend: function(request) {
                    request.setRequestHeader('Allow-Control-Allow-Origin', '*.sdmiramar.edu');
                    //request.setRequestHeader('Access-Control-Allow-Origin', '*');
                  },
                  url: 'https://myportal.sdccd.edu/psp/CSGUEST/EMPLOYEE/SA/c/COMMUNITY_ACCESS.CLASS_SEARCH.GBL?X_DEF_OPT=CLASS_SRCH_WRK2_ACAD_CAREER%24268%24&X_DEF_VAL=UGRD',
                  //    data: {'SSR_CLSRCH_WRK_CAMPUS$1': 'MIRA','SSR_CLSRCH_WRK_SRCH$2': 'AVIA'}
                  data: { 'SSR_CLSRCH_WRK_CAMPUS$1':'MIRA'}
                });
	});
})(jQuery);

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
