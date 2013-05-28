<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'pi1',
	'Vertretungsplan'
);

t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/', 'Vertretungsplan');
?>