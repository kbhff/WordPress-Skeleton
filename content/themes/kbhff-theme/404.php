<?php
/**
 * The template for displaying 404 pages (Not Found).
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Siden findes ikke', 'twentyeleven' ); ?></h1>
				</header>

				<div class="entry-content">
				<a href="<?php bloginfo('siteurl'); ?>">Gå til forsiden</a> eller søg herunder<br><br>
					<?php get_search_form(); ?>

				

					


				</div><!-- .entry-content -->
			</article><!-- #post-0 -->

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>