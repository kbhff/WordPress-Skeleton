<?php
/*
Template Name: Page template for Ugens pose
*/

get_header(); ?>
<div id="page-content">

				<?php while ( have_posts() ) : the_post(); ?>
                
                
                <div class="the_title"><h1><?php the_title(); ?></h1> </div>
                <?php get_template_part( 'content', 'single' ); ?>
                
                <?php include(STYLESHEETPATH.'/apps/lokal_nyheds_loop.php'); ?>
			
				<?php endwhile; // end of the loop. ?>
                
                <div class="lossalg">
                    <h2> Løssalg </h2>
                    <?php $lossalg= do_shortcode('[types field="loes-salg"]'); echo $lossalg;?>
                </div>
                
                 <div class="lossalg">
                    <h2> Ugens poser / Ekstra poser </h2>
                    <?php $ekstraposer= do_shortcode('[types field="ekstra-poser"]'); echo $ekstraposer;?>
                </div>
<?php comments_template( '', true ); ?>
</div>
<div id="page-sidebar">
	<div id="ugens-pose-home">


        <h2>Indhold</h2>
        <div id="ugens-pose-home-indhold"><?php $ugenspose=do_shortcode('[types field="ugens-pose-indhold"]'); echo $ugenspose; ?></div>
        


	</div>
    
     <?php
      if ( is_active_sidebar('kbhff-sidebar-5') ) {
		  
     		get_sidebar( 'groensager' ); 
      } else {
      // Display none
      };
 ?>
    
</div><!--#page-sidebarU-->

<?php get_footer(); ?>