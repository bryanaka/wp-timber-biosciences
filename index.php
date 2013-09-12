<?php
use Timber as Timber;
use Biosciences as Biosciences;

$context = Biosciences\Context::get_context();
$context['posts'] = Timber::get_posts();
$context['main_sidebar'] = Timber::get_widgets('main_sidebar');
Timber::render('index.twig', $context);