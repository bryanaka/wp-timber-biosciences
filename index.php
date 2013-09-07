<?php
use Timber as Timber;
use Biosciences as Biosciences;

$context = Biosciences\Context::get_context();
$context['posts'] = Timber::get_posts();

$context['main_sidebar'] = Timber::get_widgets('main_sidebar');

// $sidebars = wp_get_sidebars_widgets();
// $sidebar = $wp_registered_sidebars['main_sidebar'];
// $widget = $wp_registered_widgets[$sidebars['main_sidebar'][0]];
// echo '<pre>';
// print_r(wp_get_sidebars_widgets());
// echo 'sidebar';
// print_r($sidebar);
// echo 'yeah';
// print_r($widget);
// echo '</pre>';
$nav_menu = wp_get_nav_menu_object('primary');
// then echo the name of the menu
print_r($nav_menu);
Timber::render('index.twig', $context);

// $args = array( 
// 	'posts_per_page' => 6, 
// 	'meta_key' => 'featured_news_item',
// 	'meta_value' => 'true',
// 	'post__not_in' => get_option( 'sticky_posts' ) 
// );
// $context['featured_news'] = Timber::get_posts( $args );