<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$page = new Biosciences\Base();
$page->find_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );

$page->get_current_page();

$query = array(
	"numberposts" => -1,
	"post_type"   => "videos",
	"order"		  => "ASC"
);

$page->find_posts_as('videos', $query);


$page->render_page('videos/list.twig');