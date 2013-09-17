<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$page = new Biosciences\Base();

$page->find_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );
$page->get_current_page();

$pageTemplates = array('pages/'.$page->context['page']->post_name.'.twig', 'pages/page.twig');
$page->render_page($pageTemplates);