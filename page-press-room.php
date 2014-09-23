<?php
use Timber as Timber;
use Biosciences as Biosciences;

global $paged;
if (!isset($paged) || !$paged){
    $paged = 1;
}
$page = new Biosciences\Base();

// How can this set up be encapsulated into the view logic
$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$page->find_menus($menus);
$page->get_current_page();
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 5,
    'paged' => $paged
);
query_posts($args);
// this is akin to an actual controller action...
// $postCount = -1;
// "numberposts={$postCount}"
$page->find_posts();
$page->context["pagination"] = Timber::get_pagination();
$page->render_page('posts/list.twig');
