require.config({
	shim: {
		'responsive_slides.min': ['jquery']
	},
    paths: {
		"requireLib": "../bower_lib/requirejs/require",
        "jquery": "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min",
        "bootstrap": "bootstrap",
        "biosciences": "biosciences",
        "responsive_slides.min": "responsive_slides.min"
    }
});

require([ 'jquery', 'responsive_slides.min','biosciences' ], function ($) {
	$(function() {
		$(".slider").responsiveSlides({
			speed: 800,
			timeout: 7000,
			pager: true,
			nav: true,
			pause: true,
			pauseControls: true,
			namespace: 'slides'
		});
	});
});

