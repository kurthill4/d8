(function($,Drupal,drupalSettings) {
	Drupal.behaviors.btnSubmit = {
		attach: function(context,settings) {
//			$('form#simple').insertBefore('<img src="/modules/custom/onesearch/images/onesearch-logo.png" alt="OneSearch" />');
			$('#onesearch_submit').addClass('icon-only');
			$('#onesearch_submit').html('<span class="sr-only">Search</span><span class="icon glyphicon glyphicon-search" aria-hidden="true"></span>');
		}
	};
})(jQuery,Drupal,drupalSettings);

 
 

