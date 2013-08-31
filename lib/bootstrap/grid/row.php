<?php namespace Bootstrap\Grid;
Use Bootstrap\Shortcodes as Shortcodes;

Class Row extends Shortcodes
{
	public $shortcode = 'bs-row';
	public $shortcode_fn = 'row';
	public $default_attrs = array(
		'el' => 'div'
	);

	public function row ( $attributes, $content=null ) {
		$attrs = shortcode_atts($this->default_attrs, $attributes, $this->shortcode);
		return "<{$attrs['el']} class=\"row\">".do_shortcode($content)."\n</{$attrs['el']}>";
	}

}