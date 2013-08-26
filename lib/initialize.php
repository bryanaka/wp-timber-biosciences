<?php

register_nav_menus(array(
				'primary' => 'Primary Navigation',
				'site-tools' => 'Site Tools'
			));

class MyContext extends Timber {

	function get_context(){
		$context = parent::get_context();
		$context['header'] = array();
		$context['header']['nav'] = new TimberMenu('primary');
		return $context;
	}
}