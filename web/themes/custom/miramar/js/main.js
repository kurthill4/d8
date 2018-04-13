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
/*
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
