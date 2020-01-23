(function($,Drupal,drupalSettings) {
	Drupal.behaviors.btnSubmit = {
		attach: function(context,settings) {
			$('#onesearch_submit').addClass('icon-only');
			$('#onesearch_submit').html('<span class="sr-only">Search</span><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span>');
		}
	};
})(jQuery,Drupal,drupalSettings);


 

