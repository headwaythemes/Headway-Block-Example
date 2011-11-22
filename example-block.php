<?php
/*
Plugin Name: Headway Example Block
Plugin URI: http://www.headwaythemes.com
Description: Example block for Headway 3.0.
Version: 1.0
Author: Headway Themes
Author URI: http://www.headwaythemes.com
License: GNU GPL v2
*/


/**
 * Everything is ran at the after_setup_theme action to insure that all of Headway's classes and functions are loaded.
 **/
add_action('after_setup_theme', 'register_example_block');
function register_example_block() {
	
	require_once 'block.php';
	require_once 'block-options.php';

	return headway_register_block('HeadwayExampleBlock', substr(WP_PLUGIN_URL . '/' . str_replace(basename(__FILE__), '', plugin_basename(__FILE__)), 0, -1));

}