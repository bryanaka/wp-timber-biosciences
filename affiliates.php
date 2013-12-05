<?php
/*
Template Name: Affiliates
*/
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$pageObj = new Biosciences\Base();
$pageObj->find_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );

$pageObj->get_current_page();

$query = array(
	"numberposts" => -1,
	"post_type"   => "scientists",
	"meta_query"  => array(
		"relation" => "AND",
		array(
			"key"     => "scientist_type",
			"value"   => "affiliate",
			"compare" => "="
		)
	),
	"meta_key" 	  => "last_name",
	"orderby" 	  => "meta_value",
	"order"		  => "ASC"
);

$pageObj->find_posts_as('scientists', $query);
$pageObj->render_page('scientists/list.twig');