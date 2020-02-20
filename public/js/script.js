/**
 * Created by ramil on 9/13/2019.
 */
(function ($) {
    'use strict';

    var browserWindow = $(window);

    // :: 1.0 Preloader Active Code
    browserWindow.on('load', function () {
        $('#preloader').fadeOut('slow', function () {
            $(this).remove();
        });
    });


    var touchSensitivity = 5;
    $(".carousel").on("touchstart", function (event) {
        var xClick = event.originalEvent.touches[0].pageX;
        $(this).one("touchmove", function (event) {
            var xMove = event.originalEvent.touches[0].pageX;
            if (Math.floor(xClick - xMove) > touchSensitivity) {
                $(this).carousel('next');
            } else if (Math.floor(xClick - xMove) < -(touchSensitivity)) {
                $(this).carousel('prev');
            }
        });
        $(".carousel").on("touchend", function () {
            $(this).off("touchmove");
        });
    });



    setTimeout(function () {
        $('.alert').hide('slow')

    },2000);


})(jQuery);
