<?php
if ( function_exists( 'add_image_size' ) ) { 
//add_image_size( 'category-thumb', 300, 9999 ); //300 pixels wide (and unlimited height)
add_image_size( 'homepage-thumb', 215, 135,true ); //(cropped)


}

//make the excerpt to only 20 words
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );

function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Excerpt:

function wp_trim_all_excerpt($text) {
// Creates an excerpt if needed; and shortens the manual excerpt as well
global $post;
  $raw_excerpt = $text;
  if ( '' == $text ) {
    $text = get_the_content('');
    $text = strip_shortcodes( $text );
    $text = apply_filters('the_content', $text);
    $text = str_replace(']]>', ']]&gt;', $text);
  }
 
$text = strip_tags($text);
$excerpt_length = apply_filters('excerpt_length', 20);
$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
$text = wp_trim_words( $text, $excerpt_length, $excerpt_more ); //since wp3.3
/*$words = explode(' ', $text, $excerpt_length + 1);
  if (count($words)> $excerpt_length) {
    array_pop($words);
    $text = implode(' ', $words);
    $text = $text . $excerpt_more;
  } else {
    $text = implode(' ', $words);
  }
return $text;*/
return apply_filters('wp_trim_excerpt', $text, $raw_excerpt); //since wp3.3
}
 
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'wp_trim_all_excerpt');

// Make function that enables calling of the custom taxonomy Afdelinger
function has_afdeling( $afdeling, $_post = null ) {
	if ( empty( $afdeling) )
		return false;

	if ( $_post )
		$_post = get_post( $_post );
	else
		$_post =& $GLOBALS['post'];

	if ( !$_post )
		return false;

	$r = is_object_in_term( $_post->ID, 'afdeling', $afdeling );

	if ( is_wp_error( $r ) )
		return false;

	return $r;
}


	
// get taxonomies terms links
function custom_taxonomies_terms_links() {
	global $post, $post_id;
	// get post by post id
	$post = &get_post($post->ID);
	// get post type by post
	$post_type = $post->post_type;
	// get post type taxonomies
	$taxonomies = get_object_taxonomies($post_type);
	foreach ($taxonomies as $taxonomy) {
		// get the terms related to post
		$terms = get_the_terms( $post->ID, $taxonomy );
		if ( !empty( $terms ) ) {
			$out = array();
			foreach ( $terms as $term )
				$out[] = '<a href="' .get_term_link($term->slug, $taxonomy) .'">'.$term->name.'</a>';
			$return = join( ', ', $out );
		}
	}
	return $return;
}

//sidebars

//remove the original sidebars:

function remove_some_widgets(){

	// Unregsiter some of the TwentyTen sidebars
	unregister_sidebar( 'sidebar-1' );
	unregister_sidebar( 'sidebar-2' );
	unregister_sidebar( 'sidebar-3' );
	unregister_sidebar( 'sidebar-4' );
	unregister_sidebar( 'sidebar-5' );
	
}
add_action( 'widgets_init', 'remove_some_widgets', 11 );

//add new ones

function wp_theme_t_add_sidebars() {

	register_widget( 'Twenty_Eleven_Ephemera_Widget' );

	register_sidebar( array(
		'name' => __( 'Forside', 'twentyeleven' ),
		'id' => 'kbhff-sidebar-1',
		'description' => __( 'Denne sidebar vises på forsiden' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Nyheder', 'twentyeleven' ),
		'id' => 'kbhff-sidebar-2',
		'description' => __( 'Denne sidebar vises under Nyheder og nyhedsarkivet' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Om Kbhff', 'twentyeleven' ),
		'id' => 'kbhff-sidebar-3',
		'description' => __( 'Denne sidebar er til informationer om kbhff og vises på siderne: Om Kbhff, For medlemmer og for leverandøre' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Afdelinger', 'twentyeleven' ),
		'id' => 'kbhff-sidebar-4',
		'description' => __( 'Denne sidebar vises under alle afdelinger' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Grøntsager', 'twentyeleven' ),
		'id' => 'kbhff-sidebar-5',
		'description' => __( 'Denne sidebar vises under grønsager' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'In English', 'twentyeleven' ),
		'id' => 'kbhff-sidebar-6',
		'description' => __( 'Denne sidebar vises på den engelske side "In English", vær derfor sikker på at de widgets der sættes ind er på engelsk' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Default', 'twentyeleven' ),
		'id' => 'kbhff-sidebar-7',
		'description' => __( 'Denne sidebar vises på den engelske side "In English", vær derfor sikker på at de widgets der sættes ind er på engelsk' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}

	register_sidebar( array(
		'name' => __( 'Buddypress', 'twentyeleven' ),
		'id' => 'kbhff-sidebar-8',
		'description' => __( 'Denne sidebar vises på Buddypress' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => "</aside>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );


add_action( 'widgets_init', 'wp_theme_t_add_sidebars' );

function blog_posts_by_default( $query_string ) {

global $bp;

if ( !$query_string )

$query_string = '';



if ( ($bp->current_component == BP_ACTIVITY_SLUG || !$bp->current_component) ) {

if ( strpos( $query_string, 'action' ) == 0 )

$query_string .= '&type=activity_update&action=activity_update';

}



return $query_string;

}

add_filter( 'bp_dtheme_ajax_querystring', 'blog_posts_by_default' );

 ?>