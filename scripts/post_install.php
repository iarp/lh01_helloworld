<?php

function post_install(){

	$my_hook = Array(
		1, 
		'update_call_description', 
		'custom/modules/Calls/calls_updater.php',
		'calls_updater', 
		'update_call_description'
	);
	check_logic_hook_file("Calls", "after_save", $my_hook);

	$my_hook = Array(
		1, 
		'save_old_data', 
		'custom/modules/Calls/calls_updater.php',
		'calls_updater', 
		'save_old_data'
	);
	check_logic_hook_file("Calls", "before_save", $my_hook);

}
