<?php
/*
Template Name: Scientists
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
			"value"   => "scientist",
			"compare" => "="
		)
	),
	"meta_key" 	  => "last_name",
	"orderby" 	  => "meta_value",
	"order"		  => "ASC"
);

$scientists = Timber::get_posts($query);

// Group by first char of last name
$grouped_scientists = array();

foreach ($scientists as $sci) {
    $last_name_first = $sci->last_name[0];
    if (isset($grouped_scientists[$last_name_first])) {
        $grouped_scientists[$last_name_first][] = $sci;
    } else {
        $grouped_scientists[$last_name_first] = array($sci);
    }
}

$pageObj->context["test"] = $test;
$pageObj->context["scientists"] = $grouped_scientists;
$pageObj->render_page('scientists/list.twig');
