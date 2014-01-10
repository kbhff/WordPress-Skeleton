
<?php
/**
 * The template for displaying Comments.
 *
 * The area of the page that contains both current comments
 * and the comment form. The actual display of comments is
 * handled by a callback to twentyeleven_comment() which is
 * located in the functions.php file.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>



	<div id="comments">
	<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'Denne nyhed er beskyttet. Indtast password for at læse og skrive kommentarer', 'twentyeleven' ); ?></p>
	</div><!-- #comments -->
	<?php
			/* Stop the rest of comments.php from being processed,
			 * but don't kill the script entirely -- we still have
			 * to fully load the template.
			 */
			return;
		endif;
	?>

	<?php // You can start editing here -- including this comment! ?>

	<?php if ( have_comments() ) : ?>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'twentyeleven' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyeleven' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<div class="listofcomments">
	<?php foreach ($comments as $comment) : ?>
	<div class="entrycomment" id="comment-<?php comment_ID() ?>">
	<div class="entrycomment_title"><img src="http://kbhff.dk/new_kbhff/wp-content/themes/kbhff-theme/images/comment-dark.png" width="20px"><div class="titlecontent"><span class="author"><strong><?php comment_author() ?></strong> kommenterede</span></div><div class="titlecontent" id="titletid"><span class="time">Kl. <?php comment_time('H:i'); ?></span> d. <?php comment_date('j. F Y') ?> <?php edit_comment_link('[ edit ]','&nbsp;&nbsp;',''); ?></div></div>
	<div class="entrycomment_content"><?php comment_text() ?>
	<?php if ($comment->comment_approved == '0') : ?>
	<em>Din kommentar afventer godkendelse.</em>
	<?php endif; ?>
	</div></div>
	<?php endforeach; /* end for each comment */ ?>
	</div>	

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'twentyeleven' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyeleven' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'twentyeleven' ); ?></p>
	<?php endif; ?>
	<?php comment_form(); ?>

</div><!-- #comments -->
