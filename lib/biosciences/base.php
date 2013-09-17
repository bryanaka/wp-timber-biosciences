<?php namespace Biosciences;

use Timber as Timber;
use TimberMenu as TimberMenu;
use TimberPost as TimberPost;

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
		$results = parent::get_posts($query, $PostClass);
		$this->context['posts'] = $results;
		return $results;
	}

	public function find_posts_as($context_name, $query = false, $PostClass = 'TimberPost') {
		$results = parent::get_posts($query, $PostClass);
		$this->context[$context_name] = $results;
		return $results;
	}
	
	// If you are getting multiple types, distinguishing them may or may not be important
	// Feature: filter out the posts into each context. for now it just goes into post.
	public function find_posts_by_type($type, $PostClass = 'TimberPost') {
		if ( is_array($type) ) {
			// note that for now, registers under $context[posts]
			return $this->find_posts( array('post_type' => $type) );
		}
		$results = parent::get_posts("post_type=#{$type}", $PostClass);
		$this->context[$type] = $results;
		return $results;
	}

	public function find_page($pid = null) {
		$this->context['page'] = new TimberPost($pid);
		return $this->context['page'];
	}

	public function get_current_post() {
		$this->context['post'] = new TimberPost();
		return $this->context['post'];
	}
	// how could we filter posts from these results if needed? how to reduce queries?
	
	public function get_current_page() {
		return $this->find_page();
	}

	public function render_page( $filenames, $echo = true ) {
		parent::render($filenames, $this->context, $echo);
	}

	private function add_to_context ($property) {
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