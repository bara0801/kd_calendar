<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'KevinDitscheid.' . $_EXTKEY, 
	'Events', 
	'Events'
);
$TCA['tt_content']['types']['kdcalendar_events'] = array(
	'showitem' => '--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.general;general,' .
	'--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.header;header,' .
	'pi_flexform,' .
	'--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.appearance,' .
	'--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.frames;frames,' .
	'--div--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:tabs.access,' .
	'--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.visibility;visibility,' .
	'--palette--;LLL:EXT:frontend/Resources/Private/Language/locallang_ttc.xlf:palette.access;access,' .
	'--div--;LLL:EXT:lang/locallang_tca.xlf:sys_category.tabs.category,' .
	'categories'
);
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'*', 
	'FILE:EXT:kd_calendar/Configuration/FlexForms/Events.xml',
	'kdcalendar_events'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'KevinDitscheid.' . $_EXTKEY, 'Calendars', 'Calendars'
);

if (TYPO3_MODE === 'BE') {
	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'KevinDitscheid.' . $_EXTKEY, 
		'tools', // Make module a submodule of 'tools'
		'calendar', // Submodule key
		'', // Position
		array(
			'GoogleService' => 'authenticate,loadCalendars,loadEvents',
		), 
		array(
			'access' => 'user,group',
			'icon' => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_calendar.xlf',
		)
	);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Calendar');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kdcalendar_domain_model_calendar', 'EXT:kd_calendar/Resources/Private/Language/locallang_csh_tx_kdcalendar_domain_model_calendar.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kdcalendar_domain_model_calendar');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kdcalendar_domain_model_event', 'EXT:kd_calendar/Resources/Private/Language/locallang_csh_tx_kdcalendar_domain_model_event.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kdcalendar_domain_model_event');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kdcalendar_domain_model_time', 'EXT:kd_calendar/Resources/Private/Language/locallang_csh_tx_kdcalendar_domain_model_time.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kdcalendar_domain_model_time');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kdcalendar_domain_model_attendees', 'EXT:kd_calendar/Resources/Private/Language/locallang_csh_tx_kdcalendar_domain_model_attendees.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kdcalendar_domain_model_attendees');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kdcalendar_domain_model_attachment', 'EXT:kd_calendar/Resources/Private/Language/locallang_csh_tx_kdcalendar_domain_model_attachment.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kdcalendar_domain_model_attachment');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kdcalendar_domain_model_gadget', 'EXT:kd_calendar/Resources/Private/Language/locallang_csh_tx_kdcalendar_domain_model_gadget.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kdcalendar_domain_model_gadget');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kdcalendar_domain_model_reminder', 'EXT:kd_calendar/Resources/Private/Language/locallang_csh_tx_kdcalendar_domain_model_reminder.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kdcalendar_domain_model_reminder');
