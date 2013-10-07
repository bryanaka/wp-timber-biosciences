<?php
use Biosciences as Biosciences;
// $page converted to $pagina because wordpress steals $page

$pagina = new Biosciences\Base();
$menus = array('primary', 'footer_left', 'footer_center', 'footer_right');
$pagina->find_menus($menus);

$pagina->get_current_post('video');

$taxs = wp_get_post_tags( $pagina->context['video']->ID );

if ( $taxs ) {
    $tax_ids = array();
    foreach( $taxs as $individual_tax ) { $tax_ids[] = $individual_tax->term_id; }
    $queryArgs = array(
    	'post_type'           => 'videos',
        'tag__in'             => $tax_ids,
        'post__not_in'        => array( $post->ID ),
        'showposts'           => 5,
        'ignore_sticky_posts' => 1
    );
    $pagina->find_posts_as('rel_videos', $queryArgs);
}

$pagina->render_page('videos/single.twig');