<?php
use Timber as Timber;
use Biosciences as Biosciences;

$page = new Biosciences\Base();

$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$page->find_menus($menus);
$page->get_current_page();

$postCount = 4;
$args = array(
	"numberposts" => $postCount,
    "post_type" => "post",
    "meta_query"  => array(
		"relation" => "AND",
		array(
			"key"     => "featured_article",
			"value"   => "no",
			"compare" => "="
		)
	),
);

$page->find_posts_as("news_articles", $args);

$args = array(
	"numberposts" => $postCount,
    "post_type" => "post",
    "meta_query"  => array(
		"relation" => "AND",
		array(
			"key"     => "featured_article",
			"value"   => "yes",
			"compare" => "="
		)
	),
);

$page->find_posts_as("featured_articles", $args);

$args = array(
	"numberposts" => $postCount,
    "post_type" => "videos",
);

$page->find_posts_as("videos", $args);

$page->render_page('posts/press-room.twig');