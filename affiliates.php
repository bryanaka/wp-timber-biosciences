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

$affiliates = Timber::get_posts($query);

$grouped_affiliates = array();

foreach ($affiliates as $affil) {
	$last_name_first = $affil->last_name[0];
	if (isset($grouped_affiliates[$last_name_first])) {
		$grouped_affiliates[$last_name_first][] = $affil;
	} else {
		$grouped_affiliates[$last_name_first] = array($affil);
	}
}

$pageObj->context["scientists"] = $grouped_affiliates;
$pageObj->render_page('scientists/list.twig');