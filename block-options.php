<?php
/* This class must be included in another file and included later so we don't get an error about HeadwayBlockOptionsAPI class not existing. */

class HeadwayExampleBlockOptions extends HeadwayBlockOptionsAPI {
	
	
	public $tabs = array(
		'example-tab' => 'Example Tab'
	);

	public $inputs = array(
		'example-tab' => array(
			
			'example-input' => array(
				'type' => 'text',
				'name' => 'example-input', //This will be the setting you retrieve from the database.
				'label' => 'Example Input',
				'default' => '',
				'tooltip' => 'Put anything relevant about the input in this tooltip.',
				'callback' => "
					if ( value.length > 0 ) {
						block.find('.block-content p').text('Here\'s what the example input has for a value:' + value);
					} else {
						block.find('.block-content p').text('The example input has nothing in it yet!');
					}
				"
				//Use the argument above to run JavaScript when the input changed.  The variables available are block and value.
			)
			
		)
	);
	
	
}