<?php
/**
Plugin Name: Userpro Member Carousel
Plugin URI: http://happycmpr.nl
Description: Show members in carousel
Author: HappyCMPR - Radomir
Version: 1.0
Author URI: http://happycmpr.nl
**/

/**
 * Widget Class
 */
class hc_userpro_carousel extends WP_Widget {
 
 
    /** constructor -- name this the same as the class above */
    function hc_userpro_carousel() {
        parent::WP_Widget(false, $name = 'Userpro Member Carousel');	
    }
 
    /** @see WP_Widget::widget -- do not rename this */
    function widget($args, $instance) {	
        extract( $args );
        $title 		= apply_filters('widget_title', $instance['title']);
        $message 	= $instance['message'];
        $target_css = $instance['target_css'];
        $slider_controls = $instance['slider_controls'];

        ?>
              <?php echo $before_widget; ?>
                  <?php if ( $title )
                        echo $before_title . $title . $after_title; ?>
     
<?php echo "<script type=\"text/javascript\">
jQuery(document).ready(function($){
  $('$target_css').bxSlider({
  $slider_controls
  });
});
</script>"
;?>      
							<div id="hc_content">	
								<?php echo do_shortcode ($message); ?>
							</div>
							        <?php echo $after_widget; ?>
        <?php
    }
 
    /** @see WP_Widget::update -- do not rename this */
    function update($new_instance, $old_instance) {		
		$instance = $old_instance;
		$instance['title'] = strip_tags($new_instance['title']);
		$instance['message'] = strip_tags($new_instance['message']);
		$instance['target_css'] = strip_tags($new_instance['target_css']);
		$instance['slider_controls'] = strip_tags($new_instance['slider_controls']);

        return $instance;
    }
 
    /** @see WP_Widget::form -- do not rename this */
    function form($instance) {	
    
    // Check values
if( $instance) {
     	$title 		= esc_attr($instance['title']);
        $message	= esc_textarea($instance['message']);
        $target_css	= esc_attr($instance['target_css']);
        $slider_controls = esc_textarea($instance['slider_controls']);
} else {
     	$title 		= '';
        $message	= '';
        $target_css	= '';
        $slider_controls = '';
}
?>
 
         <p>
          <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('target_css'); ?>"><?php _e('Css class to target for Carousel'); ?></label> 
          <input class="widefat" id="<?php echo $this->get_field_id('target_css'); ?>" name="<?php echo $this->get_field_name('target_css'); ?>" type="text" value="<?php echo $target_css; ?>" />
        </p>
		<p>
          <label for="<?php echo $this->get_field_id('message'); ?>"><?php _e('Userpro Shortcode'); ?></label> 
          <textarea  class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('message'); ?>" name="<?php echo $this->get_field_name('message'); ?>"  /><?php if (!empty($message)) echo $message; ?></textarea>
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('slider_controls'); ?>"><?php _e('Slider Controls'); ?></label> 
          <textarea  class="widefat" rows="10" cols="20" id="<?php echo $this->get_field_id('slider_controls'); ?>" name="<?php echo $this->get_field_name('slider_controls'); ?>"  /><?php if (!empty($slider_controls)) echo $slider_controls; ?></textarea>
        </p>
        <?php 
    }
     
} // end class hc_userpro_carousel
function hc_userpro_carousel_scripts() {
	wp_enqueue_script(
		'userpro-carousel',
		plugins_url( '/assets/js/jquery.bxslider.min.js' , __FILE__ ),
		array( 'jquery' )
	);
	wp_enqueue_style( 'Userpro-carousel-style', plugin_dir_url( __FILE__ ) . '/assets/css/userpro-slider.css', array(), '0.1', 'screen' );
}
add_action( 'wp_enqueue_scripts', 'hc_userpro_carousel_scripts' );
add_action('widgets_init', create_function('', 'return register_widget("hc_userpro_carousel");'));
?>