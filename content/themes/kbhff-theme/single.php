<?php
/**
 * The Template for displaying all single posts.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

<?php include(STYLESHEETPATH.'/apps/single-content.php');?>

<div id="page-sidebar">
	<?php
          if ( is_active_sidebar('kbhff-sidebar-2') ) {
              
                get_sidebar( 'nyheder' ); 
          } else {
          // Display none
          };
     ?>
</div>

<?php get_footer(); ?>