<?php
/*
Template Name: Programs
*/
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$page = new Biosciences\Base();
$page->find_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );

$page->get_current_page();

$page->render_page('programs/index.twig');