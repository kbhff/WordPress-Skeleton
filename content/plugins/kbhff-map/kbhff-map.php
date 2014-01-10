<?php
/*
Plugin Name: kbhff Map Widget
Plugin URI: http://kbhff.dk	
Description: Map som widget
Author: Kbhff Code team
Version: 1

*/
 
 
class mapWidget extends WP_Widget
{
  function mapWidget()
  {
    $widget_ops = array('classname' => 'mapWidget', 'description' => 'Viser kort over afdelinger' );
    $this->WP_Widget('mapWidget', 'kbhff Map Widget', $widget_ops);
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

<div id="map-cta">
<h2>Lokalafdelinger</h2>
<div id="map_alleafd">

<div class="map_afd" id="nordvest"><a href="http://kbhff.dk/afdelinger/nordvest/" class="tooltip"><div class="map_afd_icon"></div> <span> Nordvest</span> </a></div>
<div class="map_afd" id="osterbro"><a href="http://kbhff.dk/afdelinger/osterbro/" class="tooltip"><div class="map_afd_icon"></div> <span> Østerbro</span> </a></div>
<div class="map_afd" id="ydrenorrebro"><a href="http://kbhff.dk/afdelinger/ydre-norrebro/" class="tooltip"><div class="map_afd_icon"></div> <span> Ydre Nørrebro</span> </a></div>
<div class="map_afd" id="norrebro"><a href="http://kbhff.dk/afdelinger/norrebro/" class="tooltip"><div class="map_afd_icon"></div> <span> Nørrebro</span> </a></div>
<div class="map_afd" id="vesterbro"><a href="http://kbhff.dk/afdelinger/vesterbro/" class="tooltip"><div class="map_afd_icon"></div> <span> Vesterbro</span> </a></div>
<div class="map_afd" id="frederiksberg"><a href="http://kbhff.dk/afdelinger/frederiksberg/" class="tooltip"><div class="map_afd_icon"></div> <span> Frederiksberg</span> </a></div>
<div class="map_afd" id="vanlose"><a href="http://kbhff.dk/afdelinger/vanlose/" class="tooltip"><div class="map_afd_icon"></div> <span> Vanløse</span> </a></div>
<div class="map_afd" id="islandsbrygge"><a href="http://kbhff.dk/afdelinger/islandsbrygge/" class="tooltip"><div class="map_afd_icon"></div> <span> Islands Brygge</span> </a></div>
<div class="map_afd" id="amager"><a href="http://kbhff.dk/afdelinger/amager-2300/" class="tooltip"><div class="map_afd_icon"></div> <span> Amager</span> </a></div>

</div>
</div>


 	<?php // Here the code ends
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("mapWidget");') );?>