(function(window, document, Modernizr) {
	'use strict';
	var inputAttrTests = Modernizr.input.required && Modernizr.input.pattern;
	var inputTypeTests = Modernizr.inputtypes.email && Modernizr.inputtypes.url;

	Modernizr.load({
		// media queries
		test: Modernizr.mq('only all'),
		nope: '/wp-content/themes/timber-biosciences/assets/vendor/respond/respond.min.js'
	},{
		// input attributes
		test: inputAttrTests,
		nope: 'webshims'
	},{
		// input types
		test: inputTypeTests,
		// use webshims api?
		nope: 'webshims'
	},{
		test: Modernizr.csstransforms,
		nope: 'transformie'

	},{
		test: Modernizr.localstorage
	},{
		test: Modernizr.svg
	},{
		test: Modernizr.textshadow
	},{
		test: Modernizr.video.h264 || Modernizr.video.webm
	},{
		test: Modernizr.audio.mp3 || Modernizr.audio.m4a
	});

})(window, document, Modernizr);