<?php

/*
Template Name: Page template for sider under Grøntsager
*/

get_header(); ?>


<?php include(STYLESHEETPATH.'/apps/page-content.php');?>

<div id="page-sidebar">
	<?php
      if ( is_active_sidebar('kbhff-sidebar-5') ) {
		  
     		get_sidebar( 'groensager' ); 
      } else {
      // Display none
      };
 ?>
</div>

<?php get_footer(); ?>