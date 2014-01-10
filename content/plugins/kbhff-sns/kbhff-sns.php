<?php
/*
Plugin Name: kbhff Følg os Widget
Plugin URI: http://kbhff.dk	
Description: Følg os som widget
Author: Kbhff Code team
Version: 1

*/
 
 
class snsWidget extends WP_Widget
{
  function snsWidget()
  {
    $widget_ops = array('classname' => 'snsWidget', 'description' => 'Viser foelg os' );
    $this->WP_Widget('foelgosWidget', 'kbhff foelg os Widget', $widget_ops);
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

<div id="sidebar-sns">

<div id="left"><h3>FØLG KBHFF</h3></div>
<div id="right">
<a href="https://www.facebook.com/kbhff" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_facebook.png" width="30px"> </a>
<a href="http://twitter.com/kbhff" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_twitter.png" width="30px"></a>
<a href="http://www.flickr.com/photos/kbhff/" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_flickr.png" width="30px"></a>
<a href="<?php bloginfo('rss2_url'); ?>" target="_blank"><img src="<?php echo get_stylesheet_directory_uri(); ?>/images/icon_rss.png" width="30px"></a></div>
</div>


 	<?php // Here the code ends
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("snsWidget");') );?>