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
<div style="clear:both;"><sdiv>
	<div id="footer">
	<div id="footercontent">
<div><ul id="footernav">
<?php $defaults = array(
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
); ?>
<?php wp_nav_menu( $defaults ); ?>
</ul>
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
	<div id="footer_kontakt">København Fødevarefællesskab · <?php echo date("Y"); ?> · <a href="mailto:info@kbhff.dk">info@kbhff.dk</a></div><br></div>



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.3/jquery.min.js"></script>
<script>window.jQuery || document.write("<script src='../../js/libs/jquery-1.6.3.min.js'>\x3C/script>")</script>


<script type="text/javascript">
	var _gaq = _gaq || [];
	_gaq.push(['_setAccount', 'UA-15234051-1']);
	_gaq.push(['_trackPageview']);
	
	(function() {
		var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
	})();
</script><script type="text/javascript">
$(document).ready(function(){ 
	
	$("#nav ul.child").removeClass("child");
	$("#nav ul.grandchild").removeClass("grandchild");
	
	$("#nav li").has("ul").hover(function(){
		$(this).addClass("current").children("ul").fadeIn();
	}, function() {
		$(this).removeClass("current").children("ul").stop(true, true).css("display", "none");
	});
		
});
</script>



<?php wp_footer(); ?>

</body>
</html>