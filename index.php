<?php
use Timber as Timber;
use Biosciences as Biosciences;

// how many posts you want to display on the home page


$page = new Biosciences\Base();

// How can this set up be encapsulated into the view logic
$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$page->add_menus($menus);
$page->context['main_sidebar'] = Timber::get_widgets('main_sidebar');

// this is akin to an actual controller action...
$postCount = 5;
$page->find_posts("numberposts={$postCount}");
$page->render_page('index.twig');
