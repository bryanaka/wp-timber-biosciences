<?php namespace Biosciences;

use Timber as Timber;
use TimberMenu as TimberMenu;

class Context extends Timber {

	public static function get_context() {
		$context = parent::get_context();
		$context['navigation'] = array();
		$context['navigation']['primary'] = new TimberMenu('primary');
		$context['navigation']['footer_left'] = new TimberMenu('footer_left');
		$context['navigation']['footer_center'] = new TimberMenu('footer_center');
		$context['navigation']['footer_right'] = new TimberMenu('footer_right');
		return $context;
	}

}