<?php
/*
Template Name: Onestop Index Page
*/

use Timber as Timber;
use TimberMenu as TimberMenu;
use TimberPost as TimberPost;
use TimberLoader as TimberLoader;

$pageObj = new Biosciences\Base();

$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$pageObj->find_menus($menus);

$query = array('post_type' => 'page',
    'post_parent__in' => array(71),
    'posts_per_page' => -1
    );
$pageObj->find_posts($query);

$pageObj->render_page('onestop/index.twig');

/*$context = Timber::get_context();
$context['menus'] = array();

$menu_ids = array('primary', 'footer_left', 'footer_center', 'footer_right');
foreach ($menu_ids as $menu_id) {
    $context['menus'][$menu_id] = new TimberMenu($menu_id);
}

$context['debug_info'] = "heyo";

$query = array('post_type' => 'page',
    'post_parent__in' => array(71),
    'posts_per_page' => -1
    );

$context = Timber::get_context();
$context['onestop_posts'] = Timber::get_posts($query);
Timber::render('views/onestop/index.twig', $context);*/