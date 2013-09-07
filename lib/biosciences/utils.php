<?php namespace Bioscences;

Class Utils
{
	public static function to_underscored($string){
		// some test cases will fail still...
		// GetURLForString -> get_urlfor_string -> GetUrlforString
		$underscored_string = strtolower(preg_replace('/([a-z])([A-Z])/', '$1_$2', $string ));
		return $underscored_string;
	}
	
	public static function to_camelcase($string) {
		$camelcase_string = preg_replace('/(?:^|_)(.?)/e', "strtoupper('$1')", $string);
		return $camelcase_string;
	}
	
	public static function pretty_print($string) {
		echo '<pre>';
		print_r($text);
		echo '</pre>';
	}
	
	public static function pp($string) {
		pretty_print($string);
	}

}