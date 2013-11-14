<?php
/*
Template Name: Videos
*/
use Biosciences as Biosciences;

$pageObj = new Biosciences\Base();
$pageObj->find_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );

$query = array(
	"numberposts" => -1,
	"post_type"   => "videos",
	"order"		  => "ASC"
);

$pageObj->find_posts_as('videos', $query);


$pageObj->render_page('videos/list.twig');