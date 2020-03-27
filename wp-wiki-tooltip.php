<?php

/*
Plugin Name: LP SpiritWiki Tooltip
Plugin URI: https://www.benjaminpritchard.org/forking-a-wordpress-plugin/
Description: Adds concept definitions from the <a href="https://spiritwiki.lightningpath.org">SpiritWiki</a>, or other MediaWiki installation 
Version: 2.0.0
Author: Benjamin Prritchard
Author URI: https://benjaminpritchard.org
License: GPLv2 or later
Text Domain: wp-wiki-tooltip
*/

include_once('config.php');
include_once('class.wp-wiki-tooltip.php');
include_once('class.wp-wiki-tooltip-admin.php');
include_once('class.wp-wiki-tooltip-mce.php');

load_plugin_textdomain( 'wp-wiki-tooltip', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

if( is_admin() ) {
	/*** backend usage ***/
	new WP_Wiki_Tooltip_Admin( plugin_basename( __FILE__ ) );
	new WP_Wiki_Tooltip_MCE();
} else {
	/*** frontend usage ***/
	new WP_Wiki_Tooltip();
}
