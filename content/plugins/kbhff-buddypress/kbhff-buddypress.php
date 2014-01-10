<?php
/*
Plugin Name: kbhff Buddypress Widget
Plugin URI: http://kbhff.dk	
Description: Buddypress Widget
Author: Kbhff Code team
Version: 1

*/
 
 
class BPWidget extends WP_Widget
{
  function BPWidget()
  {
    $widget_ops = array('classname' => 'BuddypressWidget', 'description' => 'Viser Buddypress' );
    $this->WP_Widget('BuddypressWidget', 'kbhff Buddypress Widget', $widget_ops);
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

<div id="buddypress_knap">

<div id="left"><h3>Hvad er SAMBA?</h3></div><br>
<strong>SAMBA</strong> er kælenavnet for KBHFF's sociale netværk og samarbejdsplatform. Her kan du kan følge med og deltage i KBHFFs mange arbejdsgruppers interne kommunikation.<br> <a href="http://kbhff.wikispaces.com/Samarbejdsnetv%C3%A6rk">Få en introduktion her</a>.<br><br>
<div class="samarbejds_knap">
<a href="http://kbhff.dk/samba">Seneste beskeder</a>
</div>
<div class="samarbejds_knap">
<a href="http://kbhff.dk/groups">Gruppe-oversigt</a>
</div><br>
<?php if ( is_user_logged_in() ) : ?>
<?php else : ?>
<div class="samarbejds_knap">
<a href="http://kbhff.dk/wp-admin">Log ind</a>
</div>
<div class="samarbejds_knap">
<a href="http://kbhff.dk/register">Opret dig som bruger</a>
</div>
<?php endif; ?>
</div>


 	<?php // Here the code ends
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("BPWidget");') );?>