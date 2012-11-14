<?php
/* This class must be included in another file and included later so we don't get an error about HeadwayBlockAPI class not existing. */

class HeadwayExampleBlock extends HeadwayBlockAPI {
	
	
	public $id = 'example-block';
	
	public $name = 'Example Block';
	
	public $options_class = 'HeadwayExampleBlockOptions';

	public $description = 'Explain what the block does here in 140 characters or less.'; /* This will be shown in the block type selector */
		

	/**
	 * Use this to enqueue styles or scripts for your block.  This method will be execute when the block type is on 
	 * the current page you are viewing.  Also, not only is it page-specific, the method will execute for every instance
	 * of that block type on the current page.
	 * 
	 * This method will be executed at the WordPress 'wp' hook
         *
         * REMOVE THIS METHOD IF NOT USING IT
	 **/ 
	function enqueue_action($block_id) {
								
		$block = HeadwayBlocksData::get_block($block_id);
		
		return;
				
	}
	
	
	/**
	 * Use this method to register sidebars, menus, or anything to that nature.  This method executes for every single block that
	 * has this method defined.
	 * 
	 * The method will execute for every single block on every single layout.
         *
         * REMOVE THIS METHOD IF NOT USING IT
	 **/
	function init_action($block_id) {
		
		return;
		
	}
	
	
	/**
	 * Use this to insert dynamic JS into the page needed.  This is perfect for initializing instances of jQuery Cycle, jQuery Tabs, etc.
	 *
         * REMOVE THIS METHOD IF NOT USING IT
         **/
	function dynamic_js($block_id) {
		
		return;
		
	}
	
	
	/**
	 * This function will insert dynamic CSS into real CSS files thus negating the need for nasty inline CSS (whether in a <style> element or the style attribute)
	 *
         * REMOVE THIS METHOD IF NOT USING IT
         **/
	function dynamic_css($block_id) {
		
		return;
		
	}


	/**
	 * Elements that you wish to be stylable with the Design Editor need to be registered in this function.
	 *
         * REMOVE THIS METHOD IF NOT USING IT
         **/
	function setup_elements() {

		$this->register_block_element(array(
			'id' => 'element-id', /* Make sure that you commmit to an ID for each element.  Selectors can be changed down the road, but IDs are the one thing that must remain the same. */
			'name' => 'Example Element', /* Name of element to show in element selector */
			'selector' => '.example-element-selector', /* This selector will automatically be prefixed with .block-type-BLOCKTYPE */
			'properties' => array('fonts', 'background', 'borders', 'padding', 'rounded-corners', 'box-shadow', 'text-shadow'), /* These are the available property groups. Nudging and margin are always added. */
			'states' => array( /* States are optional */
				'Selected' => '.example-element-selector.selected', 
				'Hover' => '.example-element-selector:hover', 
				'Clicked' => '.example-element:active'
			)
		));
		
	}
	

	/** 
	 * Anything in here will be displayed when the block is being displayed.
	 **/
	function content($block) {
		
		//The third argument in the following function is the default that will be returned if the setting is not present in the database
		$example_input_value = parent::get_setting($block, 'example-input', null); 
		
		if ( $example_input_value == null ) {
			
			echo '<p>The example input has nothing in it yet!</p>';
			
		} else {
			
			echo '<p>Here\'s what the example input has for a value: ' . $example_input_value . '</p>';
			
		}
		
	}
	
	
}