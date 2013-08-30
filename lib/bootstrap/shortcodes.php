<?php namespace Bootstrap;

Class Shortcodes
{
	public $shortcode = null;
	public $shortcode_fn = null;

	public function __construct () {
		add_shortcode( $this->shortcode, array($this, $this->shortcode_fn) );
	}

}