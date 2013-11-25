<?php
/*
Template Name: Onestop Element
*/

use Timber as Timber;
use TimberMenu as TimberMenu;
use TimberPost as TimberPost;
use TimberLoader as TimberLoader;

$pageObj = new Biosciences\Base();
$post = new TimberPost();

$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$pageObj->find_menus($menus);

$pageObj->context['post'] = $post;

$pageObj->render_page('onestop/single.twig');

