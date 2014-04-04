<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$page = new Biosciences\Base();
$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$page->find_menus($menus);
$page->get_current_post('program');

$page->render_page('programs/single.twig');
