<?php
/*
Template Name: Page template for Ugens pose
*/

get_header(); ?>
<div id="page-content">

				<?php $args = array (
				'post_type' => 'ugens-pose',
				'showposts' => 1,
		
				);
		
				$the_query = new WP_Query($args); 
		
				// The Loop
		        while ( $the_query->have_posts() ) : $the_query->the_post();?>
    
                
                
                <div class="the_title"><h1>Seneste pose: <?php the_title(); ?></h1> </div>

                <?php the_content(); ?>
                
 				<div class="lossalg">
                    <h2> Løssalg </h2>
                    <?php $lossalg= do_shortcode('[types field="loes-salg"]'); echo $lossalg;?>
                </div>
                
                 <div class="lossalg">
                    <h2> Ekstra poser </h2>
                    <?php $ekstraposer= do_shortcode('[types field="ekstra-poser"]'); echo $ekstraposer;?>
                </div>
	
				<?php endwhile; // end of the loop. 
				
				wp_reset_query();?>
           
               
</div>
<div id="page-sidebar">
	<div id="ugens-pose-home">

	<?php $args = array (
			'post_type' => array( 'ugens-pose' ),
			'showposts' => 1,
		
			);
		
		$the_query = new WP_Query($args); 
		
		// The Loop
        while ( $the_query->have_posts() ) : $the_query->the_post();?>
    
    
    <?php $ugenspose=do_shortcode('[types field="ugens-pose-indhold"]'); ?>		
    
        <h2>Indhold</h2>
        <div id="ugens-pose-home-indhold"><?php echo $ugenspose; ?></div>
        
		<?php endwhile;
	
	wp_reset_query();?>


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