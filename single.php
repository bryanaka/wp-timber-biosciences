<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$context = Biosciences\Context::get_context();
$context['post'] = new TimberPost();
Timber::render('posts/single.twig', $context);
