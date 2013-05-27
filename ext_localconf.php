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

// Register cache 'vertretungsplan_plancache'
$cachingTableName = 'vertretungsplan_plancache';
if (!is_array($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName])) {
	$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName] = array();
}
// Define string frontend as default frontend, this must be set with TYPO3 4.5 and below
// and overrides the default variable frontend of 4.6
if (!isset($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName]['frontend'])) {
	$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName]['frontend'] = 't3lib_cache_frontend_StringFrontend';
}

if (t3lib_utility_VersionNumber::convertVersionNumberToInteger(TYPO3_version) < '4006000') {
	// Define database backend as backend for 4.5 and below (default in 4.6)
	if (!isset($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName]['backend'])) {
		$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName]['backend'] = 't3lib_cache_backend_DbBackend';
	}
	// Define data and tags table for 4.5 and below (obsolete in 4.6)
	if (!isset($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName]['options'])) {
		$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName]['options'] = array();
	}
	if (!isset($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName]['options']['cacheTable'])) {
		$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName]['options']['cacheTable'] = 'cf_' . $cachingTableName;
	}
	if (!isset($TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName]['options']['tagsTable'])) {
		$TYPO3_CONF_VARS['SYS']['caching']['cacheConfigurations'][$cachingTableName]['options']['tagsTable'] = 'cf_' . $cachingTableName;
	}
}

// Class cache
if (!is_array($GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['class_cache'])) {
	$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['class_cache'] = array(
		'backend' => 't3lib_cache_backend_FileBackend',
		'frontend' => 't3lib_cache_frontend_PhpFrontend',
	);
}

?>