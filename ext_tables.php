<?php

if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'KevinDitscheid.' . $_EXTKEY, 'Events', 'Events'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue(
	'kdcalendar_events', 
	'FILE:EXT:kd_calendar/Configuration/FlexForms/Events.xml'
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

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kdcalendar_domain_model_gadget', 'EXT:kd_calendar/Resources/Private/Language/locallang_csh_tx_kdcalendar_domain_model_gadget.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kdcalendar_domain_model_gadget');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_kdcalendar_domain_model_reminder', 'EXT:kd_calendar/Resources/Private/Language/locallang_csh_tx_kdcalendar_domain_model_reminder.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_kdcalendar_domain_model_reminder');
