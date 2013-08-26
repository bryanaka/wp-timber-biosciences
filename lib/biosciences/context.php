<?php namespace Biosciences;

class Context extends Timber {

	function get_context(){
		$context = parent::get_context();
		$context['header'] = array();
		$context['header']['nav'] = new TimberMenu('primary');
		return $context;
	}
}