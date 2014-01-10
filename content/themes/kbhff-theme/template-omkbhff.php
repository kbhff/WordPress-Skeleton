<?php

/*
Template Name: Page template for sider under Om kbhff
*/

get_header(); ?>

<?php include(STYLESHEETPATH.'/apps/page-content.php');?>

<div id="page-sidebar">
	<?php
      if ( is_active_sidebar('kbhff-sidebar-3') ) {
		  
     		get_sidebar( 'omkbhff' ); 
      } else {
      // Display none
      };
 ?>
</div>

<?php get_footer(); ?>