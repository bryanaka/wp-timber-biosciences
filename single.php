<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

// $context = Biosciences\Context::get_context();
// $context['post'] = new TimberPost();
// Timber::render('posts/single.twig', $context);

$page = new Biosciences\Base();
$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$page->find_menus($menus);

$page->get_current_post();

$page->render_page('posts/single.twig');
