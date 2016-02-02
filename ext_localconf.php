<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'KevinDitscheid.' . $_EXTKEY,
	'Events',
	array(
		'Event' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Calendar' => '',
		'Event' => '',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'KevinDitscheid.' . $_EXTKEY,
	'Calendars',
	array(
		'Calendar' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Calendar' => '',
		'Event' => '',
		
	)
);
