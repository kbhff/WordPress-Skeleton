<?php
/**
 * The template for displaying Search Results pages.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>
		<div id="page-content">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title"><?php printf( __( 'Søgeresultater for "%s"', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				</header>


<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						/* Include the Post-Format-specific template for the content.
						 * If you want to overload this in a child theme then include a file
						 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
						 */?>
                         <div class="archive-instance">
 
<div class="search_content">
<div class="the_archive_title"><h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2> </div>
<?php if(get_post_type( $post->ID )==post) { ?>
                <div class="single_meta"><strong>Nyhed:</strong> <div class="single-date"><?php the_time('j. F Y');?></div><div class="single-category">&nbsp;&nbsp;·&nbsp;&nbsp;
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
    
    ?></div></div><?php ; } ?>
    
                            <div class="excerpt"><?php the_excerpt();?><a href="<?php the_permalink();?>">Læs mere &raquo;</a></div>
						</div></div>

				<?php endwhile; ?>

<center><?php posts_nav_link(); ?><br><br><br></center>

			<?php else : ?>

				<article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'twentyeleven' ); ?></p>
						<?php get_search_form(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>

			</div><!-- #content -->

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