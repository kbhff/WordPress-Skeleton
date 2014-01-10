<?php

/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<?php include(STYLESHEETPATH.'/apps/page-content.php');?>

<div id="page-sidebar">
	<?php
          if ( is_active_sidebar('kbhff-sidebar-7') ) {
              
                get_sidebar( 'default' ); 
          } else {
          // Display none
          };
     ?>
</div>

<?php get_footer(); ?>