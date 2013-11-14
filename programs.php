<?php
/*
Template Name: Programs
*/
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$pageObj = new Biosciences\Base();
$pageObj->find_menus( array('primary', 'footer_left', 'footer_center', 'footer_right') );

$pageObj->get_current_page();

$pageObj->render_page('programs/index.twig');