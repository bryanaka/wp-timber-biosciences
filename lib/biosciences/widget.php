<?php namespace Biosciences;
use WP_Widget as WP_Widget;

Class Widget extends WP_Widget {

	public function __construct() {
		// widget actual processes
	}

	public function widget( $args, $instance ) {
		// outputs the content of the widget
	}

 	public function form( $instance ) {
		// outputs the options form on admin
	}

	public function update( $new_instance, $old_instance ) {
		// processes widget options to be saved
	}
}


/*
I was confused about using dynamic sidebars in Timber, until Jared put up some documentation and cleared it up for me. For further context, you can read the brief discussion between Jared and myself [here at this gist](https://gist.github.com/bryanaka/6456022)

Essentially, this brought up the syntax behind using a sidebar. I really like the following syntax:

    <aside class="sidebar">
    {% for widget in sidebar.widgets %}
        <article class="widget">
            <h3 class="widget__title">{{widget.title}}</h3>
            <div class="widget__content">{{widget.content}}</div>
        </article>
    {% endfor %}
    </aside>

In messing around and reading the source, getting widgets is a bit convoluted.
    
     // returns an array with arrays of orphaned widgets, inactive widgets, and sidebar widgets.
    // Use the sidebar id as the key to get the widgets pertaining to that sidebar 
    $widgets = wp_get_sidebars_widgets();
    $sidebar_widget_ids = $widgets['main_sidebar'] // holds an array of strings, registered widget ids
    
    // get the wp globals
    global $wp_registered_sidebars, $wp_registered_widgets;
    
    // returns registered settings
    $sidebar_settings = $wp_registered_sidebars['main_sidebar'];

    // 
    foreach $wp_registered_widgets[ $sidebars['main_sidebar'] ];
    */