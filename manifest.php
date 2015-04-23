<?php
require_once("include/utils.php");

$manifest = array (
	'acceptable_sugar_versions' => array ('7'),
	'acceptable_sugar_flavors' => array('CE','PRO','CORP','ENT','ULT'),
	'readme' => '',
	'author' => 'My Name Here',
	'description' => 'LH01: What my logic hook does.',
	'icon' => '',
	'is_uninstallable' => true,
	'name' => 'Trainer Logic Hook, LH01',
	'published_date' => '2014-01-01 13:00:00',
	'type' => 'module',
	'version' => '1.0.0',
);
$installdefs = array(
	'id' => 'LH01_20140101',
	'copy' => array(
		array (
			'from' => '<basepath>/custom/modules/Calls/calls_updater.php',
			'to' => 'custom/modules/Calls/calls_updater.php',
		),
	),
	'post_uninstall' => array(
		'<basepath>/scripts/post_uninstall.php'
	),
	'post_install' => array(
		'<basepath>/scripts/post_install.php'
	),
);
