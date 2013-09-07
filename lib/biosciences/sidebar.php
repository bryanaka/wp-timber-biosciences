<?php namespace Biosciences;

Class Sidebar
{
	public $name = '';
	public $id = '';
	public $description = '';
	public $before_widget = '<aside id="%1$s" class="widget %2$s">';
	public $after_widget = '</aside>';
	public $before_title = '<h3 class="widget-title">';
	public $after_title = '</h3>';

	public function __construct ($name, $id, $description) {
		$this->name = $name;
		$this->id = $id;
		$this->description = $description;
		add_action( 'widgets_init', array($this, 'registerSidebar') );
	}

	public function changeWidgetWrap ($before, $after) {
		$this->before_widget = $before;
		$this->after_widget = $after;
	}

	public function changeWidgetTitleWrap ($before, $after) {
		$this->before_title = $before;
		$this->after_title = $after;
	}

	private function registerSidebar() {

		register_sidebar( array(
			'name' => $this->name,
			'id' => $this->id,
			'description' => $this->description,
			'before_widget' => $this->before_widget,
			'after_widget' => $this->after_widget,
			'before_title' => $this->before_title,
			'after_title' => $this->after_title
		) );

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