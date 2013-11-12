<?php namespace Biosciences;

use Timber as Timber;
use TimberMenu as TimberMenu;
use TimberPost as TimberPost;
use TimberLoader as TimberLoader;

Class Base extends Timber {

	public $context;
	public $sidebars = array();

	public function __construct() {
		parent::__construct();
		$this->context = parent::get_context();
		$this->context['menus'] = array();
	}

	public function find_menu($menu_id) {
		$this->context['menus'][$menu_id] = new TimberMenu($menu_id);
		return $this->context['menus'][$menu_id];
	}

	public function find_menus($menu_ids) {
		if( is_array($menu_ids) ) {
			foreach ($menu_ids as $menu_id) {
				$this->find_menu( $menu_id );
			}
			return true;
		} else {
			return false; 
		}
	}

	public function find_posts($query = false, $PostClass = 'TimberPost') {
		$this->context['posts'] = parent::get_posts($query, $PostClass);
		return $this->context['posts'];
	}

	public function find_posts_as($context_name, $query = false, $PostClass = 'TimberPost') {
		$this->context[$context_name] = parent::get_posts($query, $PostClass);
		return $this->context[$context_name];
	}
	
	// If you are getting multiple types, distinguishing them may or may not be important
	// Feature: filter out the posts into each context. for now it just goes into post.
	// note that for now, arrays of types register under $context[posts] via find_posts
	public function find_posts_by_type($type, $PostClass = 'TimberPost') {
		if ( is_array($type) ) { return $this->find_posts( array('post_type' => $type) ); }

		$this->context[$type] = parent::get_posts("post_type=#{$type}", $PostClass);
		return $this->context[$type];
	}

	public function find_page($pid = null) {
		$this->context['page'] = new TimberPost($pid);
		return $this->context['page'];
	}

	public function get_current_post($context_name = 'post') {
		$this->context[$context_name] = new TimberPost();
		return $this->context[$context_name];
	}
	// how could we filter posts from these results if needed? how to reduce queries?
	
	public function get_current_page() {
		return $this->find_page();
	}

	public function render_page($filenames, $expires=600, $cacheMode = TimberLoader::CACHE_NONE) {
		parent::render($filenames, $this->context, $expires, $cacheMode);
	}

	private function add_to_context($property) {
		if( isset($this->{$property}) && property_exists($this, $property) ) {
			$this->context[$property] = $this->{$property};
			return true;
		} elseif ( isset($this->{$property}) && !property_exists($this, $property) ) {
			throw new InvalidArgumentException("No Property Found with the name {$property} in " +get_class($this));
		} else {
			return false;
		}
	}

}