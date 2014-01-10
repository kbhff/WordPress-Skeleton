<?php
/*
Plugin Name: Ugens Pose Widget
Plugin URI: http://kbhff.dk	
Description: Ugenspose som widget
Author: Kbhff Code team
Version: 1

*/
 
 
class ugensPoseWidget extends WP_Widget
{
  function ugensPoseWidget()
  {
    $widget_ops = array('classname' => 'ugensPoseWidget', 'description' => 'Viser ugenspose i en boks' );
    $this->WP_Widget('ugensPoseWidget', 'kbhff Ugens Pose Widget', $widget_ops);
  }
 
  function form($instance)
  {
    $instance = wp_parse_args( (array) $instance, array( 'title' => '' ) );
    $title = $instance['title'];
?>
  <p><label for="<?php echo $this->get_field_id('title'); ?>">Title: <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo attribute_escape($title); ?>" /></label></p>
<?php
  }
 
  function update($new_instance, $old_instance)
  {
    $instance = $old_instance;
    $instance['title'] = $new_instance['title'];
    return $instance;
  }
 
  function widget($args, $instance)
  {
    extract($args, EXTR_SKIP);
 
    echo $before_widget;
    $title = empty($instance['title']) ? ' ' : apply_filters('widget_title', $instance['title']);
 
    if (!empty($title))
      echo $before_title . $title . $after_title;;
 
    // WIDGET CODE GOES HERE ?>
    <div id="ugens-pose-home">

	<?php $args = array (
			'post_type' => array( 'ugens-pose' ),
			'showposts' => '1'	
			);
		
		$the_query = new WP_Query($args); 
		
		// The Loop
        while ( $the_query->have_posts() ) : $the_query->the_post();?>
    
    
    <?php $ugenspose=do_shortcode('[types field="ugens-pose-indhold"]'); ?>		
    
        <h2>Ugens Pose</h2>
        <h5><?php the_title() ?></h5>
        <div id="ugens-pose-home-indhold"><?php echo $ugenspose; ?></div>
        <h5> <a href="<?php the_permalink(); ?>" alt="Læs mere om ugens pose »"> Læs mere om ugens pose » </a></h5>
            
        
        
			
			
		<?php endwhile;
	
	wp_reset_query();?>


</div>

 	<?php // Here the code ends
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("ugensPoseWidget");') );?>