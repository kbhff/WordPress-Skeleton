<div id="ugens-pose-home">

	<?php $args = array (
			'post_type' => array( 'ugens-pose' )
		
			);
		
		$the_query = new WP_Query($args); 
		
		// The Loop
        while ( $the_query->have_posts() ) : $the_query->the_post();?>
    
    
    <?php $ugenspose=do_shortcode('[types field="ugens-pose-indhold"]'); ?>		
    
        <h2>Ugens Pose</h2>
        <h5>Uge <?php the_time('W'); ?></h5>
        <div id="ugens-pose-home-indhold"><?php echo $ugenspose; ?></div>
        <h5> <a href="<?php the_permalink(); ?>" alt="Læs mere om ugens pose »"> Læs mere om ugens pose » </a></h5>
            
        
        
			
			
		<?php endwhile;
	
	wp_reset_query();?>


</div>
