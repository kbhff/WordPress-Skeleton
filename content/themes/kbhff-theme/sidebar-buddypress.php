<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>
	<?php
      if ( is_active_sidebar('kbhff-sidebar-8') ) {
		  
     		get_sidebar( 'buddypresswidget' ); 
      } else {
      // Display none
      };
 ?>