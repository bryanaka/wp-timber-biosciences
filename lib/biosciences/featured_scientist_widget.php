<?php namespace Biosciences;

use WP_Widget;
use Timber;

Class FeaturedScientistWidget extends WP_Widget {

	public function __construct() {
		parent::__construct(
			'featured_scientist_widget',
			'Featured Scientist',
			array('description' => 'A widget for Featuring a random scientist')
		);

	}

	public function widget( $args, $instance ) {
		$title = apply_filters( 'widget_title', $instance['title'] );
		echo $args['before_widget'];
		if ( ! empty( $title ) ) {
			echo $args['before_title'] . $title . $args['after_title'];
		}
		echo __( 'Hello, World!', 'text_domain' );
		echo $args['after_widget'];
	}

 	public function form( $instance ) {
		// $scientists = Timber::get_posts(  array(
 	// 			"post_type" => "scientists",
		// 		"meta_key" 	=> "last_name",
		// 		"orderby" 	=> "meta_value",
		// 		"order" 	=> "ASC"
 	// 		)
 	// 	);
 		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		} else {
			$title = __( 'New title', 'text_domain' );
		}
		?>
		<div>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">
				<?php _e( 'Title:' ); ?>
			</label> 
			<input class="widefat"
				   id="<?php echo $this->get_field_id( 'title' ); ?>"
				   name="<?php echo $this->get_field_name( 'title' ); ?>"
				   type="text"
				   value="<?php echo esc_attr( $title ); ?>">
		</div>
		<div>
			<label for="<?php echo $this->get_field_id( 'scientist' ); ?>">
				<?php _e( 'Scientist:' ); ?>
			</label>
			<select name="<?php echo $this->get_field_name( 'scientist' );?>"
					id="<?php echo $this->get_field_id( 'scientist' ); ?>"
					class="widefat">
				<?php foreach( $scientists as $scientist ){
					?>
					<option value="<?php echo esc_attr( $scientist );?>">
						<?php echo $scientist['last_name']?>
					</option>
					<?php
				}
				?>
			</select>
		</div>
		<?php
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

		return $instance;
	}
}

add_action('widgets_init', function() {
     register_widget( 'Biosciences\FeaturedScientistWidget' );
});