// Custom _toggleArrow() function
function _toggleArrow(ele) {
  $(ele).toggleClass('fa-chevron-down').effect('pulsate', 'fast');
}


(function($) {
  // Mobile Menu controls.
  /*$('.mobile-nav').hide();
  $('a.mobile-menu').click(function() {
    $('.mobile-nav').slideToggle('fast',function() {
      $('a.mobile-menu').toggleClass('collapsed');
    });
  })*/

/*

  $('.mobile-nav').hide();
  $('a.mobile-menu').click(function() {
    $('.mobile-nav').slideToggle('fast',function() {
      $('a.mobile-menu').toggleClass('collapsed');
    });
  })

*/

  // Searchbar show/hide controls.

	Drupal.behaviors.toggleSearch = {
		attach: function(context,settings) {
			$('.top-links .search').click(function() {
				$('.search-desktop').toggle();
			});
		}
	};

  $('.search-desktop a.close-x').click(function() {
    $(this).parent().fadeToggle();
  })(jQuery);

  // Campus alert toggle.
  $('.campus-alert .fa-chevron-up').click(function() {
    $('.campus-alert, .ca-block').fadeToggle('slow');
  });

  // Up/down arrow on mobile for Important Dates.
  $('.important-dates .fa-chevron-up').click(function() {
    $(this).next().next().slideToggle('fast', function() {
      _toggleArrow($(this).prev().prev());
    });
  });

  // Up/down arrow on mobile for News-and-Events and Most-recent-jobs-internships and ID block.
  var i = 1;
  $('.news-block .fa-chevron-up, .recent-jobs .fa-chevron-up, .id-block .fa-chevron-up').click(function() {
    $(this).next().children().not(':first').slideToggle('fast', function() {
      if (i == 1)
        _toggleArrow($(this).parents('.container-fluid').prev());
      i++;
    }(jQuery));
    i = 1;
  });

  // Up/down arrow on mobile for Mission Statement and Recent Tweets.
  $('.mr-block .fa-chevron-up').click(function() {
    $(this).parent().find('p').slideToggle('fast', function() {
       _toggleArrow($(this).parent().find('i'));
    });
  });
})(jQuery);
