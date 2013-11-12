<?php
/*
Template Name: Onestop Index Page
*/

use Timber as Timber;
use TimberMenu as TimberMenu;
use TimberPost as TimberPost;

$context = Timber::get_context();
$context['post'] = new TimberPost(190);
Timber::render('views/onestop/index.twig', $context);