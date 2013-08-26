<?php namespace Biosciences;

use Timber as Timber;
use TimberMenu as TimberMenu;

class Context extends Timber {

	public static function get_context() {
		$context = parent::get_context();
		$context['header'] = array();
		$context['header']['nav'] = new TimberMenu('primary');
		return $context;
	}

}