<?php
/*
Plugin Name: Ugens Pose Arkiv Widget
Plugin URI: http://kbhff.dk	
Description: Ugenspose Akiv som widget
Author: Kbhff Code team
Version: 1

*/
 
 
class ugensPoseArkivWidget extends WP_Widget
{
  function ugensPoseArkivWidget()
  {
    $widget_ops = array('classname' => 'ugensPoseArkivWidget', 'description' => 'Viser ugenspose arkiv i en boks' );
    $this->WP_Widget('ugensPoseArkivWidget', 'kbhff Ugens Pose Arkiv Widget', $widget_ops);
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
<aside class="widget widget_categories">
<h3 class="widget-title">Ugens poser</h3>
<ul>
	<?php $args = array (
			'post_type' => array( 'ugens-pose' )
		
			);
		
		$the_query = new WP_Query($args); 
		
		// The Loop
        while ( $the_query->have_posts() ) : $the_query->the_post();?>
    

    

       <li> <a href="<?php the_permalink(); ?>" alt="Læs mere om ugens pose »"><?php the_title() ?></a>
</li>        		<?php endwhile;
	
	wp_reset_query();?>

</ul>        
</aside>
			


</div>

 	<?php // Here the code ends
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("ugensPoseArkivWidget");') );?>