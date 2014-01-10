<?php

/*
Template Name: Page template for sider under in English
*/

get_header(); ?>


<?php include(STYLESHEETPATH.'/apps/page-content.php');?>

<div id="page-sidebar">
	<?php
      if ( is_active_sidebar('kbhff-sidebar-6') ) {
		  
     		get_sidebar( 'inenglish' ); 
      } else {
      // Display none
      };
 ?>
</div>

<?php get_footer(); ?>