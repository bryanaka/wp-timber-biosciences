<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

// $context = Biosciences\Context::get_context();
// $page = new TimberPost(); // Pages are similar to Posts in WP, thus the TimberPost
// $context['page'] = $page;
// $pageTemplates = array('pages/'.$post->post_name.'.twig', 'pages/page.twig');
// Timber::render($pageTemplates, $context);

$page = new Biosciences\Base();

$page->add_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );

$page->find_page();
$pageTemplates = array('pages/'.$post->post_name.'.twig', 'pages/page.twig');
$page->render_page($pageTemplates);