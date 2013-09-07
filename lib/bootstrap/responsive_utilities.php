<?php namespace Bootstrap;

Class ResponsiveUtilities extends Shortcodes
{
	public $shortcode = 'bs-resp-util';
	public $shortcode_fn = 'respUtil';
	public $defaultAttrs = array(
		'el' => 'span',
		'type' => null,
		'media' => null
	);

	static public function initialize() {
		$responsiveUtils = new self();
	}
	// [be-resp-util type='' media='']
	public function respUtil ($attributes, $content=null) {
		$attrs = shortcode_atts($this->defaultAttrs, $attributes, $this->shortcode);
		$utilClasses = $this->createUtilClasses( $attrs['type'], $attrs['media'] );
		return "<{$attrs['el']} class=\"{$utilClasses}\">".do_shortcode($content)."\n</{$attrs['el']}>";
	}

	private function createUtilClasses($visibility_type, $media_sizes) {
		$utilClasses = "";
		$types = explode(',', $visibility_type);
		$medias = explode(',', $media_sizes);

		if ( count($medias) !== count($types) ) {
			return "error--number_of_types_and_medias_must_be_equal";
		}

		for ($n=0, $t = count($medias); $n < $t; $n++) {
			$medias[$n] = trim($medias[$n]);
			$types[$n]  = trim($types[$n]);
			$utilClasses .= "{$types[$n]}-{$medias[$n]} ";
		}

		return trim($utilClasses);
	}
}