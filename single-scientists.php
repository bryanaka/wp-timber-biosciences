<?php
use Timber as Timber;
use TimberPost as TimberPost;
use Biosciences as Biosciences;

$page = new Biosciences\Base();
$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$page->find_menus($menus);
$page->get_current_post('scientist');

$post_scientist = new TimberPost();
$file_path = wp_get_attachment_url($post_scientist->publications);
$page->context['file_path'] = $file_path;

$page->render_page('scientists/single.twig');
