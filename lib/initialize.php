<?php

require_once BIOSCIENCES_PATH.'/lib/navigation_menus.php';

function to_underscored($string){
	$underscored_string = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $string ));
	return $underscored_string;
}

function to_camelcase($string) {
	$camelcase_string = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $string ));
	return $camelcase_string;
}

function pretty_print($text) {
	echo '<pre>';
	print_r($text);
	echo '</pre>';
}

function pp($text) {
	pretty_print($text);
}

spl_autoload_register(function ($class) {
	$new_class = str_replace('\\', '/', $class);
	$underscored_class = to_underscored($new_class);
	$file_path = BIOSCIENCES_PATH . '/lib/' . $underscored_class . '.php';
	if( file_exists($file_path) ){
		include $file_path;
	}
});
