<?php
/**
 * The template for displaying Archive pages.
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

		<div id="page-content">
		

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">
						<?php if ( is_day() ) : ?>
							<?php printf( __( 'Daily Archives: %s', 'twentyeleven' ), '<span>' . get_the_date() . '</span>' ); ?>
						<?php elseif ( is_month() ) : ?>
							<?php printf( __( 'Arkiv: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php elseif ( is_year() ) : ?>
							<?php printf( __( 'Yearly Archives: %s', 'twentyeleven' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'twentyeleven' ) ) . '</span>' ); ?>
						<?php else : ?>
							<?php _e( 'Blog Archives', 'twentyeleven' ); ?>
						<?php endif; ?>
					</h1>
				</header>

				<?php twentyeleven_content_nav( 'nav-above' ); ?>

				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */?>
                         <div class="archive-instance">
<div class="archive_thumbnail"><a href="<?php the_permalink();?>"> <?php // check if the post has a Post Thumbnail assigned to it.
              if ( has_post_thumbnail() ) {
                  
                  the_post_thumbnail('homepage-thumb');
              } 
              
              else { ?>
              <img src="<?php bloginfo('stylesheet_directory')?>/images/default.jpg"> <?php } ?></a></div> 
<div class="archive_content">
<div class="the_archive_title"><h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2> </div>
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
    </div></div>
                            <div class="excerpt"><?php the_excerpt();?><a href="<?php the_permalink();?>">Læs mere &raquo;</a></div>
						</div></div>

				<?php endwhile; ?>

				<?php twentyeleven_content_nav( 'nav-below' ); ?>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #page-content -->
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