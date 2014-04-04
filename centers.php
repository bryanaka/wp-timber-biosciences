<?php
/*
Template Name: Centers
*/
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$pageObj = new Biosciences\Base();
$pageObj->find_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );

$pageObj->get_current_page();

$query = array(
	"numberposts" => -1,
	"post_type"   => "programs",
	"meta_query"  => array(
		"relation" => "AND",
		array(
			"key"     => "program_type",
			"value"   => "center",
			"compare" => "="
		)
	)
);

$centers = Timber::get_posts($query);

$pageObj->context["programs"] = $centers;
$pageObj->render_page('programs/index.twig');
