<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::configurePlugin(
	$_EXTKEY,
	'pi1',
	array(
		'StandIn' => 'index'
	)
);

//t3lib_extMgm::addPItoST43($_EXTKEY, 'pi1/class.tx_vertretungsplan_pi1.php', '_pi1', 'list_type', 0);
?>