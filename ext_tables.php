<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

t3lib_div::loadTCA('tt_content');
$TCA['tt_content']['types']['list']['subtypes_excludelist'][$_EXTKEY.'_pi1']='layout,select_key,pages';

Tx_Extbase_Utility_Extension::registerPlugin(
	$_EXTKEY,
	'pi1',
	'Vertretungsplan'
);

t3lib_extMgm::addStaticFile($_EXTKEY,'Configuration/TypoScript/', 'Vertretungsplan');
?>