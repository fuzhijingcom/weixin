// PAGE-HEADER DROP MENU @soulteary 2013.7.9
;
(function ($) {
    $.fn.extend({
        "dropmenu": function (params) {
            params = $.extend({
                menu: 'div#applist-drop',
                list: 'ul#my-applist',
                title: '',
                btmtext: '',
                data: [],
                url: '',
                hover: 'hover',
                spec: 0
            }, params);

            var target = $(this);

            $(document).ready(function () {
                var isActive = false;
                target.hover(function () {
                    $(this).addClass('hover');
                    var x = target.offset().left;
                    var y = target.offset().top + target.outerHeight() - 1;
                    $(params.menu).show();
                    if (params.spec != 'sidebar') {
                        $(params.menu).css({
                            'left': x,
                            'top': y
                        });
                    }
                }, function () {
                    $(this).removeClass('hover');
                    if (isActive == false) {
                        $(params.menu).delay(100).hide();
                    }
                });

                $(params.menu).hover(function () {
                    isActive = true;
                    target.addClass('hover');

                    var x = target.offset().left;
                    var y = target.offset().top + target.outerHeight() - 1;

                    if (params.spec == 'account') {
                        x = target.offset().left;
                        y = target.offset().top + target.outerHeight();
                    }
                    $(this).show();
                    if (params.spec != 'sidebar') {
                        $(this).css({
                            'top': y,
                            'left': x
                        });
                    }

                }, function () {
                    isActive = false;
                    target.removeClass('hover');
                    $(params.menu).delay(100).hide();
                });
            });
            return this;
        }
    });
})(jQuery);
