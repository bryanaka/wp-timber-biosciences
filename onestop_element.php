<?php
/*
Template Name: Onestop Element
*/

use Timber as Timber;
use TimberMenu as TimberMenu;
use TimberPost as TimberPost;
use TimberLoader as TimberLoader;

$pageObj = new Biosciences\Base();

$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$pageObj->find_menus($menus);

$pageObj->get_current_page();
$pageObj->render_page('onestop/single.twig');

