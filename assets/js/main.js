(function(window, document, $){
    'use strict';

    $('#slider').responsiveSlides({
        auto: true,             // Boolean: Animate automatically, true or false
        speed: 500,            // Integer: Speed of the transition, in milliseconds
        timeout: 6000,          // Integer: Time between slide transitions, in milliseconds
        pager: true,           // Boolean: Show pager, true or false
        nav: false,             // Boolean: Show navigation, true or false
        random: false,          // Boolean: Randomize the order of the slides, true or false
        pause: false,           // Boolean: Pause on hover, true or false
        pauseControls: true,    // Boolean: Pause when hovering controls, true or false
        prevText: 'Previous',   // String: Text for the "previous" button
        nextText: 'Next',       // String: Text for the "next" button
        maxwidth: '',           // Integer: Max-width of the slideshow, in pixels
        navContainer: '',       // Selector: Where controls should be appended to, default is after the 'ul'
        manualControls: '',     // Selector: Declare custom pager navigation
        namespace: 'slides',   // String: Change the default namespace used
        before: function(){},   // Function: Before callback
        after: function(){}     // Function: After callback
    });
    var $toggleTheaterInfo = $('#js-toggle-details');
    var $detailsIcon = $toggleTheaterInfo.find('.icon-collapse');
    if($toggleTheaterInfo){
        $toggleTheaterInfo.on('click', function(e) {
            $detailsIcon.toggleClass('icon-collapse icon-collapse-top');
            e.preventDefault();
            $('.theater__info').slideToggle(400);
        });
    }
})(window, document, jQuery);
