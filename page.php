<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$context = Biosciences\Context::get_context();
$page = new TimberPost(); // Pages are similar to Posts in WP, thus the TimberPost
$context['page'] = $page;
$pageTemplates = array('pages/'.$post->post_name.'.twig', 'pages/page.twig');
Timber::render($pageTemplates, $context);
