<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

// $context = Biosciences\Context::get_context();
// $context['post'] = new TimberPost();
// Timber::render('posts/single.twig', $context);

$pageObj = new Biosciences\Base();
$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$pageObj->find_menus($menus);

$pageObj->get_current_post();

$pageObj->render_page('posts/single.twig');
