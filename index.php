<?php
use Timber as Timber;
use Biosciences as Biosciences;

// how many posts you want to display on the home page
$postCount = 5;

$page = new Biosciences\Base();

$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');

$page->add_menus($menus);
$page->find_posts("numberposts={$postCount}");

//$context['posts'] = Timber::get_posts("numberposts={$postCount}");

$page->context['main_sidebar'] = Timber::get_widgets('main_sidebar');

$page->render('index.twig');
