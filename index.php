<?php
use Timber as Timber;
use Biosciences as Biosciences;

$context = Biosciences\Context::get_context();
$context['posts'] = Timber::get_posts();
Timber::render('posts/list.twig', $context);

