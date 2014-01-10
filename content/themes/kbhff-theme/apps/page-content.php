<div id="page-content">

				<?php while ( have_posts() ) : the_post(); ?>
                
                
                <div class="the_title"><h1><?php the_title(); ?></h1> </div>
                <?php get_template_part( 'content', 'single' ); ?>
				

				
				<?php endwhile; // end of the loop. ?>
</div>
