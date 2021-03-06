<?php
/*

Plugin Name: PixoPoint Menu Plugin
Plugin URI: http://pixopoint.com/pixopoint-menu/
Description: A WordPress plugin which adds a menu to your WordPress site. Visit the <a href="http://pixopoint.com/pixopoint-menu/">PixoPoint Menu Plugin page</a> for more information about the plugin, or our navigation <a href="http://pixopoint.com/forum/index.php?board=4.0">support board</a> for help with adding the menu to your theme.
Author: PixoPoint Web Development / Ryan Hellyer
Version: 0.6.30
Author URI: http://pixopoint.com/

Copyright (c) 2009 PixoPoint Web Development

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.

*/

// Set developmental mode (when set to 'on' this will activate new features of the plugin which are actively under development)
$pixo_developmental = '';

// Version number as displayed in source code
$pixopoint_menu_version = '0.6.30';

// URL for coding engine
$pixopoint_codingengine = 'http://pixopoint.com/codingengine/0.5alpha/'; // not used in this version - just kept for consistency

// Add localization support
function my_init() {load_plugin_textdomain ('pixopoint_theme', "/wp-content/plugins/pixopoint-menu/languages/");} // If you know how to avoid using "wp-content" here please contact me ... http://pixopoint.com/contact/?
add_action('init', 'my_init');

// Sets javsscript and images location and gets CSS
$pixopoint_menu_images = WP_PLUGIN_URL.'/pixopoint-menu/images/';
$javascript_location = WP_PLUGIN_URL.'/pixopoint-menu/scripts/';
$pixopoint_menu_css = wp_kses( get_option('suckerfish_css'), '', '' );

// If in admin page, then load admin page stuff
if (is_admin()) {require('admin_page.php');}

// If not on admin page ...
else {

	// If maintenance mode is off then immediately loads plugin
	if (get_option('pixopoint_menu_maintenance') != 'on' || (get_option('pixopoint_menu_maintenance') == 'on' AND $_REQUEST['pixopoint-menu'] == 'on')) {
		// Load Generator
//		if (get_option('enableeditingpane') == 'on') {require('generator.php');}
		// Load plugin core
		require('core.php');
	}

}







if ( !function_exists( 'pixopoint_allowed_html' ) ) :
function pixopoint_allowed_html() {
	$allowed_html = array(
		'a'       => array(
			'href'      => array(),
			'title'     => array(),
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'div'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'form'     => array(
			'role'       => array(),
			'method'     => array(),
			'action'     => array(),
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'input'     => array(
			'type'       => array(),
			'value'      => array(),
			'name'       => array(),
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'span'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'p'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'h1'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'h2'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'h3'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'h4'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'h5'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'h6'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'table'      => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'code'      => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'pre'      => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'tr'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
			'td'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'th'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'thead'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'tfoot'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'style'     => array(
			'type'       => array(),
			'id'         => array(),
			'rel'        => array(),
			'media'      => array(),
			'href'       => array()
		),
		'ul'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'li'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'ol'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'img'     => array(
			'src'        => array(),
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'article'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'header'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'header'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'footer'     => array(
			'style'      => array(),
			'class'      => array(),
			'id'         => array()
		),
		'br'     => array(),
		'em'     => array(),
		'i'      => array(),
		'strong' => array(),
		'b'      => array(),
		'u'      => array(),
		'font'   => array()
	);
	return $allowed_html;
}
endif;
