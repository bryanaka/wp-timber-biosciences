<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$pageObj = new Biosciences\Base();

$pageObj->find_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );
$pageObj->get_current_page();

$pageTemplates = array('pages/'.$pageObj->context['page']->post_name.'.twig', 'pages/page.twig');
$pageObj->render_page($pageTemplates);