<?php namespace Biosciences;

use Timber as Timber;
use TimberMenu as TimberMenu;
use TimberPost as TimberPost;

Class Base extends Timber {

	public $context;
	public $posts;
	public $page;
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

	public function find_page($pid = null) {
		$this->page = new TimberPost($pid = null);
		return $this->page;
	}

	public function render_page( $filenames, $echo = true ) {
		$this->add_to_context('menus');
		$this->add_to_context('posts');
		$this->add_to_context('page');
		parent::render($filenames, $this->context, $echo);
	}

	private function add_to_context ($property) {
		if( property_exists($this, $property) ) {
			$this->context[$property] = $this->{$property};
		} else {
			throw new InvalidArgumentException("No Property Found with the name {$property} in " +get_class($this));
		}
	}
}