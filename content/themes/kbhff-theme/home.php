<?php
/**
 * Frontpage
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

<div id="page-content">
			
			<?php query_posts( 'posts_per_page=12' );	?>
			
			 <?php if ( have_posts() ) : 
			 
			 	//make condition that will be used to call cat_flag.php only where needed
				$cat_flag = 1; 
            	
				//Start the Loop  ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
                <?php 
				 
				include(STYLESHEETPATH.'/apps/loop_content.php');	?>
				<?php endwhile; 
                
                // Reset Query
				wp_reset_query();?>

				

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header>  

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div> <!--.entry-content -->
				</article><!-- #post-0 -->
			<?php $cat_flag = 0; ?><!--resetting cat_flag condition -->
			<?php endif; ?>

	<!--		</div> --><!--#primary-->
</div> <!--#page-content-->
<div id="page-sidebar">

	  <?php
      if ( is_active_sidebar('kbhff-sidebar-1') ) {
		  
     		get_sidebar( 'forside' ); 
      } else {
      // Display none
      };
      ?>
</div><!--#page-sidebarU-->

<?php get_footer(); ?>