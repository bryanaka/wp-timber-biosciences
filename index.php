<?php
use Timber as Timber;
use Biosciences as Biosciences;

$context = Biosciences\Context::get_context();
$context['posts'] = Timber::get_posts();
Timber::render('posts/list.twig', $context);

$args = array( 
	'posts_per_page' => 6, 
	'meta_key' => 'featured_news_item',
	'meta_value' => 'true',
	'post__not_in' => get_option( 'sticky_posts' ) 
);
$context['featured_news'] = Timber::get_posts( $args );