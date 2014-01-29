(function() {
    'use strict';
    var minHeight = 100;

    $(document).ready(function () {
        setOnestopHeights();
    });

    $(window).resize(function () {
        setOnestopHeights();
        //
    });

    var setOnestopHeights = function() {
        var height = $(window).height();

        // Offset from first image element to top
        var offset = $('.onestop__element-real:first').offset().top;

        var margins = 150;

        // Set img heights respectively
        // (height - offset - margins) / 3
        var imgHeight = Math.max((height - offset - margins) / 3, minHeight);

        $('.onestop__element-real img').css('height', imgHeight);
    };
})();