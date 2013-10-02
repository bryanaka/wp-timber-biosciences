<?php
/*
Template Name: Scientists
*/
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$page = new Biosciences\Base();
$page->find_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );

$page->get_current_page();

$query = array(
	"numberposts" => -1,
	"post_type"   => "scientists",
	"meta_key" 	  => "last_name",
	"orderby" 	  => "meta_value",
	"order"		  => "ASC"
);

$page->find_posts_as('scientists', $query);

// Take the scientists and sort them by last name. Place them in an associative array.
// ['a' =>[],'b'=>[], 'c'=>[]...]
$page->render_page('scientists/list.twig');