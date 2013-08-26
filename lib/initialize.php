<?php

register_nav_menus(array(
				'primary' => 'Primary Navigation',
				'site-tools' => 'Site Tools'
			));

	$nav_defaults = array(
		'theme_location'  => 'primary',
		'menu'            => 'Primary Menu',
		'container_class' => 'collapse navbar-collapse navbar-ex1-collapse',
		'container_id'    => '',
		'menu_class' 	  => 'nav navbar-nav',
		'menu_id'         => 'main_nav',
		'echo'            => true,
		'items_wrap' 	  => '<ul id="%1$s" class="%2$s">%3$s</ul>'
	);

