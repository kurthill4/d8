(function (Drupal, $) {
  Drupal.fta_entitybrowser = function EditHeader(options) {
    var view = {

      defaults: {},

      init: function (options) {
        $.extend(view.defaults, options);
        view.item = $(options.el);

        this._addClickHandlers();
        this._addCheckboxWatcher();
      },

      _addClickHandlers: function () {
        _.each(view.item.find('.view-content .views-row'), function (row) {
          $(row).click(function () {
            var checkbox = $(this).find('.form-checkbox');
            checkbox.prop('checked', !checkbox.prop('checked'));
            $(this).toggleClass('active');
          });
        });
      }
    };

    view.init(options);

    return view;
  };

  $(function () {
    var el = $('html.entity-browser .entity-browser-form');
    if (el.length) {
      new Drupal.fta_entitybrowser({el: el});
    }
  });
}(Drupal, jQuery));
