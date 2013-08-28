<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$context = Biosciences\Context::get_context();
$post = new TimberPost();
$context['post'] = $post;
$pageTemplates = array('pages/'.$post->post_name.'.twig', 'pages/page.twig');
Timber::render($pageTemplates, $context);
