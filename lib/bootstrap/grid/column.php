<?php namespace Bootstrap\Grid;
Use Bootstrap\Shortcodes as Shortcodes;

Class Column extends Shortcodes
{
	public $shortcode = 'bs-column';
	public $shortcode_fn = 'column';
	public $default_attrs = array(
		'el'   => 'div',
		'media' => 'md',
		'size' => '6'
	);

	// shortcode_atts basically works like array_merge but additionally 
	// creates an atttribute filter with the shortcode. Poor API and breaks SRP.
	public function column ( $attributes, $content=null ) {
		$attrs = shortcode_atts($this->default_attrs, $attributes, $this->shortcode);
		$col_classes = $this->create_column_classes( $attrs['media'], $attrs['size'] );
		return "<{$attrs['el']} class=\"{$col_classes}\">\n".do_shortcode($content)."\n</{$attrs['el']}>";
	}
	
	private function create_column_classes ($media_sizes, $column_sizes) {
		$col_classes = "";
		$medias = explode(',', $media_sizes);
		$sizes = explode(',', $column_sizes);

		if ( count($medias) !== count($sizes) ) {
			return "error--number_of_medias_and_sizes_must_be_equal";
		}

		for ($n=0, $t = count($medias); $n < $t; $n++) {
			$medias[$n] = trim($medias[$n]);
			$sizes[$n]  = trim($sizes[$n]);
			$col_classes .= "col-{$medias[$n]}-{$sizes[$n]} ";
		}

		return trim($col_classes);
	}

}