(function($,Drupal,drupalSettings) {
	Drupal.behaviors.Scope = {
		attach: function(context,settings) {
			var tab,scope,place;
			$('select.switchScope', context).change(function() {
				switch(('#scopeSelecter option:selected').val()) {
					case "Everything":
						tab = "Everything";
						scope = "mm_LibraryCatalog_and_CI";
						place = "Find articles, books, & more";
					break;
					case "SDCCDLibraryCatalog":
						tab = "SDCCDLibraryCatalog";
						scope = "mm_SDCCD_LibraryCatalog";
						place = "Find books & ebooks in SDCCD libraries";
					break;
					case "CourseReserves":
						tab = "mm_CourseReserves";
						scope = "mm_CourseReserves";
						place = "Find textbooks for your classes";
					break;
					default:
				}
				$("#primoTab").val(tab);
				$("#primoScope").val(scope);
				$("#primoQueryTemp").placeholder = attr('placeholder',place).placeholder();
			});
		}
	};
})(jQuery,Drupal,drupalSettings);

