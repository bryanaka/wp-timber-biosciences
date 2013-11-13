<?php
/*
Template Name: Onestop Index Page
*/

use Timber as Timber;
use TimberMenu as TimberMenu;
use TimberPost as TimberPost;

$query = array('post_type' => 'page',
    'post_parent__in' => array(71),
    'posts_per_page' => -1
    );

$context = Timber::get_context();
$context['onestop_posts'] = Timber::get_posts($query);
Timber::render('views/onestop/index.twig', $context);