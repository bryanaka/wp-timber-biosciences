<?php namespace Biosciences;

use Timber as Timber;
use TimberMenu as TimberMenu;

Class Base extends Timber {

	public $context;
	public $posts;
	public $menus = array();
	public $sidebars = array();

	public function __construct() {
		parent::__construct();
		$this->context = parent::get_context();
	}

	public function add_menu ( $menu_id ) {
		$this->menus[$menu_id] = new TimberMenu($menu_id);
	}

	public function add_menus ( $menu_ids ) {
		if( is_array($menu_ids) ) {
			foreach ($menu_ids as $menu_id) {
				$this->add_menu( $menu_id );
			}
			return true;
		} else {
			return false; 
		}
	}

	public function find_posts($query = false, $PostClass = 'TimberPost', $replace_posts = false) {
		$results = parent::get_posts($query, $PostClass);
		if( !isset($this->posts) || $replace_posts) {
			$this->posts = $results;
		}
		return $results;
	}
	// how could we filter posts from these results if needed? how to reduce queries?

	public function render_page( $filenames, $data = Array(), $echo = true ) {
		$this->add_to_context('menus');
		if ( !empty($data) ) {
			$data = $this->context;
		}
		parent::render($filenames, $data, $echo);

	}

	private function add_to_context ($property) {
		if( property_exists($this, $property) ) {
			// add a check to see if this property is valid
			$this->context[$property] = $this->{$property};
		} else {
			throw new InvalidArgumentException("No Property Found with the name {$property} in " +get_class($this));
		}
	}
}