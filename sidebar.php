<?php

$context = array();
if ( is_active_sidebar( 'sidebar-1' ) ) {
	
}

Timber::render('component/sidebar.twig', $context);