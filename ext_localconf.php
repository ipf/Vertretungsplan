<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Ipf.' . $_EXTKEY,
	'pi1',
	array(
		'StandIn' => 'index'
	)
);

// Register cache 'vertretungsplan_plancache'
$cacheName = 'vertretungsplan_plancache';
if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cacheName])) {
	$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cacheName] = array();
}

?>