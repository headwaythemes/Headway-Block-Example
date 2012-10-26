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

define('EXAMPLE_BLOCK_VERSION', '1.0');

/**
 * Everything is ran at the after_setup_theme action to insure that all of Headway's classes and functions are loaded.
 **/
add_action('after_setup_theme', 'example_block_register');
function example_block_register() {

	/* Make sure that Headway is activated, otherwise don't register the block because errors will be thrown. */
	if ( !class_exists('Headway') )
		return;
	
	require_once 'block.php';
	require_once 'block-options.php';

	/**
	 * @param Class name in block.php.  
	 * @param Path to the folder that contains the block icons.  In this example block it's this plugin's folder.
	 **/
	return headway_register_block('HeadwayExampleBlock', plugins_url(false, __FILE__));

}


/**
 * If you plan on adding your block to Headway Extend, then this will be the code that will enable auto-updates for the block/plugin.
 **/
add_action('init', 'example_block_extend_updater');
function example_block_extend_updater() {

	if ( !class_exists('HeadwayUpdaterAPI') )
		return;

	$updater = new HeadwayUpdaterAPI(array(
		'slug' => 'example-block',
		'path' => plugin_basename(__FILE__),
		'name' => 'Example Block',
		'type' => 'block',
		'current_version' => EXAMPLE_BLOCK_VERSION
	));

}