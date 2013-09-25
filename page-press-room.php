<?php
use Timber as Timber;
use Biosciences as Biosciences;

$page = new Biosciences\Base();

// How can this set up be encapsulated into the view logic
$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$page->find_menus($menus);
$page->get_current_page();
// this is akin to an actual controller action...
$postCount = -1;
$page->find_posts("numberposts={$postCount}");
$page->render_page('posts/list.twig');
