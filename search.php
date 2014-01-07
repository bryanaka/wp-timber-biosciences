<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package bioscience
 * 
 */
use Timber as Timber;
use Biosciences as Biosciences;

$pageObj = new Biosciences\Base();

$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$pageObj->find_menus($menus);

$pageObj->context['title'] = 'Search Results for '. get_search_query();
$pageObj->context['posts'] = Timber::get_posts();

$templates = array('search.twig', 'archive.twig', 'index.twig');

$pageObj->render_page($templates);