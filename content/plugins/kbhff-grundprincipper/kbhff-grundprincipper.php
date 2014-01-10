<?php
/*
Plugin Name: kbhff 10 Grundprincipper Widget
Plugin URI: http://kbhff.dk	
Description: 10 Grundprincipper som widget
Author: Kbhff Code team
Version: 1

*/
 
 
class grundprincipperWidget extends WP_Widget
{
  function grundprincipperWidget()
  {
    $widget_ops = array('classname' => 'grundprincipperWidget', 'description' => 'Viser 10 grundprincipper' );
    $this->WP_Widget('grundprincipperWidget', 'kbhff grundprincipper Widget', $widget_ops);
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

<div id="grundprincipper-cta">
	<h2>Vil du...</h2>
<br><li>... have økologi til priser, hvor alle kan være med?</li>
<li>... vide, hvordan din mad når frem til dit bord?</li>
<li>... lære mere om lokale råvarer?</li>
<li>... dele opskrifter og blive inspireret af andres?</li>
<li>... være en del af et engageret, lokalt fællesskab?</li>
<br>
<a href="https://medlem.kbhff.dk/blivmedlem/intro" target="_blank"><h5>&raquo; Så bliv medlem af Københavns Fødevarefællesskab!</h5></a>

    </div>
<!--
<div id="grundprincipper-cta">
	<h2>10 grundprincipper</h2>
<li>Dyrket og produceret økologisk.</li>
<li>Dyrket så lokalt som praktisk muligt.</li>
<li>Sæsonbaseret</li>
<li>Støtter fair og direkte handel</li>
<li>Er miljøvenlig</li>
<li>Formidler og fremmer viden om fødevarer og økologi</li>
<li>Er økonomisk bæredygtig og selvstændig</li>
<li>Er transparent og fremmer tillid i alle produktions- og distributionsled</li>
<li>Er tæt på og tilgængelig</li>
<li>Drives af et lokalt, arbejdende fællesskab</li>

<br>
<a href="https://medlem.kbhff.dk/blivmedlem/intro" target="_blank"><h5>&raquo; Bliv medlem af Københavns Fødevarefællesskab!</h5></a>


    </div>-->


 	<?php // Here the code ends
    echo $after_widget;
  }
 
}
add_action( 'widgets_init', create_function('', 'return register_widget("grundprincipperWidget");') );?>