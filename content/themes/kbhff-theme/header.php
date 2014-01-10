<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */
?><!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 7]>
<html id="ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html id="ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />

<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!--[if IE]>
	<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/style-ie.css" />
<![endif]-->
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
<?php
ini_set(’zlib.output_compression’, ‘On’);
ini_set(’zlib.output_compression_level’, ‘1′);
?>
</head>

<body <?php body_class(); ?>>
<div id="container">
<div id="header">
<div id="top_navigation">
<ul>
    <li><a href="http://kbhff.dk/for-leverandorer/">For leverandører</a></li>
    <li><a href="http://kbhff.dk/english/">English</a></li>
    <li><a href="http://kbhff.wikispaces.com/">Wiki</a></li>
    <li><a href="https://medlem.kbhff.dk/">Login til medlemssystem</a> </li>
    <?php if ( !is_user_logged_in() ) { echo '<li><a href="http://kbhff.dk/wp-admin">Login til Wordpress</a></li>'; } ?> 
    <li><?php get_search_form( $echo ); ?></li>
</ul>
</div>
<div id="title"><a href="<?php bloginfo('url'); ?>">KØBENHAVNS<br>FØDEVAREFÆLLESSKAB</a></div>
<div><ul id="nav">
<?php $defaults = array(
	'echo'            => true,
	'fallback_cb'     => 'wp_page_menu',
	'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
	'depth'           => 0,
); ?>

<?php wp_nav_menu( $defaults ); ?>
 
</ul>
</div>

<?php 
		// check if the post has a Post Thumbnail assigned to it.?>
		
        		<?php 	$key = do_shortcode('[types field="custom-header-img"]');
						
						if($key != '') { ?>
							<div id="headerimg"><?php echo do_shortcode('[types field="custom-header-img"]'); ?>
						<?php }	
						
						else {?>
							<div id="headerimg"><img src="<?php bloginfo('template_directory');?>/images/header/random.php">
							<?php } ?>
		

<div id="logo"><img src="<?php bloginfo('template_directory');?>/images/logo.png"></div>
<div id="call2action">
<a href="http://kbhff.wikispaces.com/Vagtplan"  target="_blank"><li>Ta' en vagt &raquo;</li></a>
<a href="https://medlem.kbhff.dk"  target="_blank"><li>Bestil pose &raquo;</li></a>
<?php if( !is_user_logged_in() ) { ?> 
	<a href="https://medlem.kbhff.dk/blivmedlem/intro" target="_blank"><li id="white">Bliv medlem &raquo;</li></a><?php } ?> 
</div>
</div>
</div>



	<div id="main">