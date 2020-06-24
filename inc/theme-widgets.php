<?php

function cok_register_widgets() {

	register_widget( 'COK_CTA' );

}

add_action( 'widgets_init', 'cok_register_widgets' );


class COK_CTA extends WP_Widget {
    function __construct() {
        $widget_ops = array( 'classname' => 'cta cta--chat insulate--mid', 'description' => __( 'Display Call To Action banner', 'cok' ) );
		parent::__construct( 'cta', __('Call To Action','cok' ), $widget_ops );
    }

    function widget( $args, $instance ) {
        if ( ! isset( $args['widget_id'] ) ) {
			$args['widget_id'] = $this->id;
        }
        $title = $instance['title'];
        $description = empty( $instance['description'] ) ? '' : $instance['description'];
        $description_url = empty( $instance['description_url'] ) ? '' : $instance['description_url'];
        
        echo $args['before_widget'];
        ?>

        <div class="cta-content wrap wrap--content">
            <h3><?php echo $title ?></h3>
            <h2><a href="mailto: <?php echo $description_url ?>"><?php echo $description ?></a></h2>
        </div>
        
        <?php
        echo $args['after_widget'];


    }

    function update( $new_instance, $old_instance ) {
        $instance = $old_instance;

        $instance['title'] = !empty( $new_instance['title'] ) ? $new_instance['title'] : '';
		$instance['description'] =  $new_instance['description'];
		$instance['description_url'] =  $new_instance['description_url'];
        
        return $instance;
    }

    function form( $instance ) {
        $instance = wp_parse_args( (array) $instance, array( 'description' => '', 'title' => '') );
        ?>

        <p><label for="<?php echo $this->get_field_name( 'title' ); ?>"><?php esc_html_e( 'Title:', 'cok'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $instance['title'] ); ?>" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_name( 'description' ); ?>"><?php esc_html_e( 'Description:', 'cok'); ?></label>
			<input class="widefat" id="<?php echo $this->get_field_id( 'description' ); ?>" name="<?php echo $this->get_field_name( 'description' ); ?>" type="text" value="<?php echo esc_attr( $instance['description'] ); ?>" />
		</p>

        <p>
			<label for="<?php echo $this->get_field_name( 'description_url' ); ?>"><?php esc_html_e( 'Description url:', 'cok'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id( 'description_url' ); ?>" name="<?php echo $this->get_field_name( 'description_url' ); ?>" type="email" value="<?php echo esc_attr( $instance['description_url'] ); ?>" />
		</p>

        <?php
    }
}