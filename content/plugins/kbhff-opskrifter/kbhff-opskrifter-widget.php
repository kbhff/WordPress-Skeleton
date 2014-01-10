<?php
/*
Plugin Name: kbhff Opskrifts Widget
Description: Viser link til opskrifter 
Author: KBHFF Codeteam
Version: 1

*/
 
 
class opskriftWidget extends WP_Widget
{
  function opskriftWidget()
  {
    $widget_ops = array('classname' => 'opskriftWidget', 'description' => 'Laver link til opskrifter' );
    $this->WP_Widget('opskriftWidget', 'Kbhff Opskrift Widget', $widget_ops);
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
 
    // WIDGET CODE GOES HERE?>
	
<a href="http://opskrifter.kbhff.dk/" ><div id="opskrifter-cta">
	<h2>Opskrifter</h2>
	<h5>Find opskrifter på Kbhff's helt egen opskriftsside</h5>
     <img src="<?php bloginfo('stylesheet_directory');?>/images/ugens_pose_cta.jpg">
    </div></a>
	
	<?php // WIDGET CODE STOPS HERE
   
 
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("opskriftWidget");') );?>