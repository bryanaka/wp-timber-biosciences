<?php

require_once BIOSCIENCES_PATH.'/lib/navigation_menus.php';

function to_underscored ($string) {
	$underscored_string = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $string ));
	return $underscored_string;
}

spl_autoload_register(function ($class) {
	$new_class = str_replace('\\', '/', $class);
	$underscored_class = to_underscored($new_class);
	$file_path = BIOSCIENCES_PATH . '/lib/' . $underscored_class . '.php';
	if( file_exists($file_path) ){
		require_once $file_path;
	}
});

Bootstrap\Grid::initialize();
Bootstrap\ResponsiveUtilities::initialize();

function biosciences_script_loading() {
	$styles_path = get_template_directory_uri().'/assets/css';
	$script_path = get_template_directory_uri().'/assets/js/';
	$vendor_path = get_template_directory_uri().'/assets/vendor/';
	$in_footer = true;

	// modernizr
	wp_register_script( 'modernizr', $script_path.'modernizr.custom.js', array(), false, false );
	// respond.js
	wp_register_script('respond', $vendor_path.'respond/respond.min.js', array(), false, false );
	// jquery needs to be an older version to support the calendar widget...
	// which uses an old qtip library, which depends on $.browser method... UGH
	// wp_deregister_script('jquery');
	// wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, $in_footer);
	wp_register_script('bootstrap', $vendor_path.'sass-bootstrap/dist/js/bootstrap.min.js', array('jquery'), false, $in_footer );
	
	// responsive_slides - only home page?
	wp_register_script('responsive_slides', $script_path.'responsive_slides.min.js', array('jquery'), false, $in_footer );

	wp_register_script('main', $script_path.'main.js', array('jquery', 'responsive_slides'), false, $in_footer );

	wp_enqueue_script('modernizr');
	wp_enqueue_script('respond');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('responsive_slides');
	wp_enqueue_script('main');

}

add_action( 'wp_enqueue_scripts', 'biosciences_script_loading' );
