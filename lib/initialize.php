<?php

require_once BIOSCIENCES_PATH.'/lib/navigation_menus.php';
require BIOSCIENCES_PATH.'/lib/biosciences/utils.php';

function to_underscored ($string) {
	$underscored_string = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $string ));
	return $underscored_string;
}

spl_autoload_register(function ($class) {
	$new_class = str_replace('\\', '/', $class);
	$underscored_class = to_underscored($new_class);
	$file_path = BIOSCIENCES_PATH . '/lib/' . $underscored_class . '.php';
	if( file_exists($file_path) ){
		include $file_path;
	}
});

Bootstrap\Grid::initialize();
$utils = new Bootstrap\ResponsiveUtilities();

