/*jshint undef:false, newcap: false */
(function(window, document, Modernizr, $){
    'use strict';

    $(function() {
        FastClick.attach(document.body);
    });

    window.TestSlider = $('#slider').responsiveSlides({
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
    // touch nav
    $('.nav__item').on('click', '.js-navDropdown', function(event) {
        if(window.innerWidth <= 850 || window.Modernizr.touch) {
            event.stopPropagation();
            event.preventDefault();
            $('.subnav').removeClass('is_open');
            $(this).siblings('.subnav').toggleClass('is_open');
        }
    });
    $('.nav__item').on('click', '.js-closeSubNav', function(event) {
        event.stopPropagation();
        event.preventDefault();
        var $currentSubNav = $(event.target).closest('.subnav');
        $currentSubNav.removeClass('is_open');
    });

    // off canvas nav
    var $nav = $('.nav__right');
    $('#openNavButton').on('click', function() {
        event.preventDefault();
        event.stopPropagation();
        $nav.addClass('is_open');
    });

    var useHammer = true;
    if (/MSIE (\d+\.\d+);/.test(navigator.userAgent)){ //test for MSIE;
        var ieversion = new Number(RegExp.$1);
        if(ieversion <= 8){
            useHammer = false;
        }
    }

    if(useHammer) {
        Hammer(document.body, {
            stop_browser_behavior: {
                userSelect: 'text'
            }
        }).on('swipeleft', function() {
            event.preventDefault();
            event.stopPropagation();
            $nav.addClass('is_open');
        });
    }

    $('#closeNavButton').on('click', function() {
        event.preventDefault();
        event.stopPropagation();
        $nav.removeClass('is_open');
    });

    if(useHammer){
        Hammer(document.body, {
            stop_browser_behavior: {
                userSelect: 'text'
            }
        }).on('swiperight', function() {
            event.preventDefault();
            event.stopPropagation();
            $nav.removeClass('is_open');
        });
    }

    // search
    $('.js-search').on('click', function(event) {
        event.stopPropagation();
        event.preventDefault();
        $('.wp_search').slideToggle(500);
    });

    if(!Modernizr.input.placeholder){
        $('[placeholder]').focus(function() {
            var input = $(this);
            if (input.val() === input.attr('placeholder')) {
                input.val('');
                input.removeClass('placeholder');
            }
        }).blur(function() {
            var input = $(this);
            if (input.val() === '' || input.val() === input.attr('placeholder')) {
                input.addClass('placeholder');
                input.val(input.attr('placeholder'));
            }
        }).blur();
        $('[placeholder]').parents('form').submit(function() {
            $(this).find('[placeholder]').each(function() {
                var input = $(this);
                if (input.val() === input.attr('placeholder')) {
                    input.val('');
                }
            });
        });
    }


})(window, document, Modernizr, jQuery);
