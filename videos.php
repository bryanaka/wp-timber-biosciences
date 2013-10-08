<?php
/*
Template Name: Videos
*/
use Biosciences as Biosciences;

$bioPage = new Biosciences\Base();
$bioPage->find_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );

$query = array(
	"numberposts" => -1,
	"post_type"   => "videos",
	"order"		  => "ASC"
);

$bioPage->find_posts_as('videos', $query);


$bioPage->render_page('videos/list.twig');