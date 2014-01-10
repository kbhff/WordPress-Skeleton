<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?>


	</div><!-- #main -->
	</div><!-- #page -->
<div style="clear:both;"></div>
	<div id="footer">
	<div id="footercontent">
<div><div id="buddypress_footer"><ul id="footernav">
<?php $defaults = array(
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
); ?>
<?php wp_nav_menu( $defaults ); ?>
</ul></div>
<div id="footernews">
<ul>
<div id="headline">Seneste nyheder</div>
<?php
	$args = array( 'numberposts' => '5', 'post_status'     => 'publish');
	$recent_posts = wp_get_recent_posts( $args );
	foreach( $recent_posts as $recent ){
		echo '<li><table><tr><td class="left"><small>'. mysql2date('j.m.y', $recent["post_date"]) .'</small></td><td> <a href="' . get_permalink($recent["ID"]) . '" title="Look '.esc_attr($recent["post_title"]).'" >' .   $recent["post_title"].'</a> </li> </td></tr></table>';
	}
?>
</ul>
</div>
	</div> 
	<div id="footer_kontakt">København Fødevarefællesskab · 2012 · <a href="mailto:info@kbhff.dk">info@kbhff.dk</a></div><br></div>






<?php wp_footer(); ?>

</body>
</html>