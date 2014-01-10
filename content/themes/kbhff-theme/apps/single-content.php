<div id="page-content">

				<?php while ( have_posts() ) : the_post(); ?>
                
                
                <div class="the_title"><h1><?php the_title(); ?></h1> </div>
                <div class="single_meta"><div class="single-date"><?php the_time('j. F Y');?></div><div class="single-category">&nbsp;&nbsp;·&nbsp;&nbsp;
        <?php 
    if (get_the_terms($post->ID, 'afdeling')) {
                  $taxonomy_ar = get_the_terms($post->ID, 'afdeling');
                
                 
                  foreach ($taxonomy_ar as $taxonomy_term) {
                    $output =  $taxonomy_term->name ;
                  }
                    
                  if($output == 'Alle Afdelinger'){
                      foreach((get_the_category()) as $category) { 
                         echo '<a href="'.get_category_link($category->term_id ).'">' . $category->cat_name . '</a>'; }
                      }	
                      
                    else { echo custom_taxonomies_terms_links(); }
                }
    
    else {
    foreach((get_the_category()) as $category) { 
        echo '<a href="'.get_category_link($category->term_id ).'">' . $category->cat_name . '</a> '; }
        }
    
    ?>
    <?php echo '&nbsp;&nbsp;·&nbsp;&nbsp;Skrevet af ' . get_the_author() ?>
    </div></div>


       <div class="entry-content"><?php the_content(); ?></div>
					<nav id="nav-single">
						<?php if (get_adjacent_post(false, '', true)): // if there are older posts ?>
						<div class="nav-previous"><?php previous_post_link( '%link', __( 'Ældre', 'twentyeleven' ) ); ?></div>
<?php endif; ?>
<?php if (get_adjacent_post(false, '', false)): // if there are newer posts ?>
 						<div class="nav-next"><?php next_post_link( '%link', __( 'Nyere', 'twentyeleven' ) ); ?></div><?php endif; ?>
					</nav><!-- #nav-single -->

					

					<?php comments_template( '', true ); ?>

				<?php endwhile; // end of the loop. ?>
</div> <!--#page-content-->
