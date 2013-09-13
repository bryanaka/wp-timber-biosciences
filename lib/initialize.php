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
	$script_path = get_template_directory_uri().'/assets/js/';
	$in_footer = true;

	// modernizr
	wp_register_script( 'modernizr', $script_path.'modernizr.custom.js', array(), false, false );

	// jquery
	wp_deregister_script('jquery');
	wp_register_script('jquery', "//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js", false, $in_footer);

	// bootstrap - maybe split up?
	wp_register_script('bootstrap', $script_path.'bootstrap/bootstrap.min.js', array('jquery'), false, $in_footer );
	
	// responsive_slides - only home page?
	wp_register_script('responsive_slides', $script_path.'responsive_slides.min.js', array('jquery'), false, $in_footer );

	wp_enqueue_script('modernizr');
	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrap');
	wp_enqueue_script('responsive_slides');
}

add_action( 'wp_enqueue_scripts', 'biosciences_script_loading' );
