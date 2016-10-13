<?php

/*
Plugin Name: Custom Contact Widget
Plugin URI: http://twitter.com/hellominti/
Description: A simple but powerful widget to display Contact Informations.
Version: 1.00
Author: minti
Author URI: http://twitter.com/hellominti/
*/

class widget_contact extends WP_Widget { 
	
	// Widget Settings
	function widget_contact() {
		$widget_ops = array('description' => __('Display your Contact Informations') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'contact' );
		$this->WP_Widget( 'contact', __('minti.Contact'), $widget_ops, $control_ops );
	}
	
	// Widget Output
	function widget($args, $instance) {
		extract($args);
		$title = apply_filters('widget_title', $instance['title']);
		// ------
		echo $before_widget;
		echo $before_title . $title . $after_title;
		?>
		
		<address>
			<?php if($instance['address']): ?>
			<span class="address"><?php echo $instance['address']; ?></span>
			<?php endif; ?>
	
			<?php if($instance['phone']): ?>
			<span class="phone"><strong><?php _e( 'Phone', 'minti' ) ?>:</strong> <?php echo $instance['phone']; ?></span>
			<?php endif; ?>
	
			<?php if($instance['fax']): ?>
			<span class="fax"><strong><?php _e( 'Fax', 'minti' ) ?>:</strong> <?php echo $instance['fax']; ?></span>
			<?php endif; ?>
	
			<?php if($instance['email']): ?>
			<span class="email"><strong><?php _e( 'E-Mail', 'minti' ) ?>:</strong> <a href="mailto:<?php echo $instance['email']; ?>"><?php echo $instance['email']; ?></a></span>
			<?php endif; ?>
	
			<?php if($instance['web']): ?>
			<span class="web"><strong><?php _e( 'Web', 'minti' ) ?>:</strong> <a href="<?php echo $instance['web']; ?>"><?php echo $instance['web']; ?></a></span>
			<?php endif; ?>
		</address>
		
		<?php
		echo $after_widget;
		// ------
	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance; 
		
		$instance['title'] = $new_instance['title'];
		$instance['address'] = $new_instance['address'];
		$instance['phone'] = $new_instance['phone'];
		$instance['fax'] = $new_instance['fax'];
		$instance['email'] = $new_instance['email'];
		$instance['web'] = $new_instance['web'];

		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		
		//$defaults = array( 'title' => 'Twitter Widget', 'posts' => '3', 'username' => 'hellominti' ); // Default Values
		$defaults = array('title' => 'Contact Info', 'address' => '', 'phone' => '', 'fax' => '', 'email' => '', 'web' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>">Title:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" value="<?php echo $instance['title']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('address'); ?>">Address:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('address'); ?>" name="<?php echo $this->get_field_name('address'); ?>" value="<?php echo $instance['address']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('phone'); ?>">Phone:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('phone'); ?>" name="<?php echo $this->get_field_name('phone'); ?>" value="<?php echo $instance['phone']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('fax'); ?>">Fax:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('fax'); ?>" name="<?php echo $this->get_field_name('fax'); ?>" value="<?php echo $instance['fax']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('email'); ?>">Email:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('email'); ?>" name="<?php echo $this->get_field_name('email'); ?>" value="<?php echo $instance['email']; ?>" />
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('web'); ?>">Website URL:</label>
			<input class="widefat" style="width: 216px;" id="<?php echo $this->get_field_id('web'); ?>" name="<?php echo $this->get_field_name('web'); ?>" value="<?php echo $instance['web']; ?>" />
		</p>
		
    <?php }
}

// Add Widget
function widget_contact_init() {
	register_widget('widget_contact');
}
add_action('widgets_init', 'widget_contact_init');

?>