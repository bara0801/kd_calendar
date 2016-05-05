<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
	'<INCLUDE_TYPOSCRIPT: source="FILE:EXT:kd_calendar/Configuration/PageTS/PageTS.ts">'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'KevinDitscheid.' . $_EXTKEY,
	'Events',
	array(
		'Event' => 'list, show'
	),
	// non-cacheable actions
	array(
		'Event' => ''
	),
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::PLUGIN_TYPE_CONTENT_ELEMENT
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'KevinDitscheid.' . $_EXTKEY,
	'Calendars',
	array(
		'Calendar' => 'list, show'
	),
	// non-cacheable actions
	array(
		'Calendar' => ''
	)
);
