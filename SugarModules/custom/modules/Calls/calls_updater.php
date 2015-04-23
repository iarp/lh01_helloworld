<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

class calls_updater {

	static $already_ran = false;
	static $old_data = array();

	# Junker, it is just how sugar wants it.
	public function calls_updater() {}

	/*
	 * after_save
	 *
	 * Update Call description with a notice about the Logic Hook update.
	 */
	public function update_call_description($bean, $event, $arguments) {
		
		/*
		 * This stop an infinite loop. When we call ->save() below, without this we 
		 * would end up calling this logic hook again, which would ->save() again, forever.
		 * This stops that from occuring
		 */
		if(self::$already_ran == true) return;
		self::$already_ran = true;

		# Update the description
		$bean->description .= "\nThis data has been appended to the bottom of the call description via the LH01 Logic Hook.";

		# Now that we have updated what we want to update, we need to save the changes.
		$bean->save();

	}

	/*
	 * before_save
	 *
	 * Save the old data for future reference and comparison
	 */
	public function save_old_data($bean, $event, $arguments) {
		if (!empty($bean->id))
			self::$old_data[$bean->id] = $bean->fetched_row;
	}
}
