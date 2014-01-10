<?php
/*
Template Name: Page template for Nyheder
*/



get_header(); ?>

<div id="page-content">
			
			<?php 	
			
		
			$page = (get_query_var('paged')) ? get_query_var('paged') : 1;
						
				$args = array(
				   'posts_per_page' => 12,
                   'paged' =>  $page,
				  
				   
				);
				query_posts($args);?>
			
			 <?php if ( have_posts() ) : ?>
			
            <div class="nyheder_wrapper">
	 
			 	<?php //make condition that will be used to call cat_flag.php only where needed
            	
				//Start the Loop  ?>
				<?php while ( have_posts() ) : the_post(); ?>
				
                <?php include(STYLESHEETPATH.'/apps/loop_content.php');	?>
				 
			
                 
				<?php endwhile; ?>
               
             </div> <!--.nyheder_wrapper-->
                <div class="post-navigation">
					<?php if(function_exists('wp_page_numbers')) { wp_page_numbers(); } ?>

				</div>
                <?php // Reset Query<?php posts_nav_link()
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
	 if ( is_active_sidebar('kbhff-sidebar-2') ) {
		  
     		get_sidebar( 'nyheder' ); 
      } else {
      // Display none
      };
      ?>

</div><!--#page-sidebarU-->

<?php get_footer(); ?>