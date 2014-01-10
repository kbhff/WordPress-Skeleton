<?php
/*
Template Name: Page template for Afdelinger
*/

get_header(); ?>

<div id="page-content">

				<?php while ( have_posts() ) : the_post(); ?>
                
                
                <div class="the_title"><h1><?php the_title(); ?></h1> </div>
                <?php get_template_part( 'content', 'single' ); ?>
				

<?php if(do_shortcode('[types field="wiki_afd_url"]') != null) {  ?>				<div id="call2action_wiki"><a href="<?php echo do_shortcode('[types field="wiki_afd_url"]'); ?>"><li>Læs mere på vores wiki &raquo;</li></a></div><?php ; } ?>

 

				
				
				
                <?php include(STYLESHEETPATH.'/apps/lokal_nyheds_loop.php'); ?>
				
				<?php endwhile; // end of the loop. ?>
</div>


<div id="page-sidebar">
<?php if(do_shortcode('[types field="adresse"]') != null) {  ?>
<div id="adresse"><h3>Adresse	</h3>
<?php echo do_shortcode('[types field="adresse"]'); ?></div>
<?php ; } ?>
<?php if(do_shortcode('[types field="aabningstider"]') != null) {  ?>
<div id="adresse">
<h3>Åbningstider</h3>
<?php echo do_shortcode('[types field="aabningstider"]'); ?></div>
<?php ; } ?>

 <?php //get sidebar 
      if ( is_active_sidebar('kbhff-sidebar-4') ) {
		  
     		get_sidebar( 'afdelinger' ); 
      } else {
      // Display none
      };
 ?>

</div><!--#page-sidebarU-->
<?php get_footer(); ?>