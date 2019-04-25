<?php

/*
Plugin Name: LP SpiritWiki Tooltip
Plugin URI: https://kundalinisoftware.com/
Description: Adds concept definitions from the  <a href="https://spiritwiki.lightningpath.org" target="_blank" rel="noopener noreferrer">MediaWiki</a> installation, e.g. <a href="https://www.wikipedia.org" target="_blank" rel="noopener noreferrer">SpiritWiki</a>.
Version: 1.0.0
Author: Benjamin Prritchard
Author: Nico Danneberg
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
