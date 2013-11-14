<?php
use Timber as Timber;
use Biosciences as Biosciences;

$pageObj = new Biosciences\Base();

// How can this set up be encapsulated into the view logic
$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$pageObj->find_menus($menus);
$pageObj->context['main_sidebar'] = Timber::get_widgets('main_sidebar');

// this is akin to an actual controller action...
$postCount = 5;
$pageObj->find_posts("numberposts={$postCount}");
// need to find the first 5 featured posts as well. Can we do this in one query?
$pageObj->render_page('index.twig');
