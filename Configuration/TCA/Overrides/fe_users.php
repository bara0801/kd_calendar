<?php

if (!isset($GLOBALS['TCA']['fe_users']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['fe_users']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_kdcalendar_fe_users = array();
	$tempColumnstx_kdcalendar_fe_users[$GLOBALS['TCA']['fe_users']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('Creator','Tx_KdCalendar_Creator')
			),
			'default' => 'Tx_KdCalendar_Creator',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $tempColumnstx_kdcalendar_fe_users, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'fe_users',
	$GLOBALS['TCA']['fe_users']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['fe_users']['ctrl']['label']
);

$tmp_kd_calendar_columns = array(

	'id' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_creator.id',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'email' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_creator.email',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'display_name' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_creator.display_name',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'self' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_creator.self',
		'config' => array(
			'type' => 'check',
			'default' => 0
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users',$tmp_kd_calendar_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['fe_users']['types']['Tx_KdCalendar_Creator']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_users']['types'])) {
	// use first entry in types array
	$fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
	$GLOBALS['TCA']['fe_users']['types']['Tx_KdCalendar_Creator']['showitem'] = $fe_users_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['fe_users']['types']['Tx_KdCalendar_Creator']['showitem'] = '';
}
$GLOBALS['TCA']['fe_users']['types']['Tx_KdCalendar_Creator']['showitem'] .= ',--div--;LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_creator,';
$GLOBALS['TCA']['fe_users']['types']['Tx_KdCalendar_Creator']['showitem'] .= 'id, email, display_name, self';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_KdCalendar_Creator','Tx_KdCalendar_Creator');

$tmp_kd_calendar_columns = array(

	'id' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_organizer.id',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'email' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_organizer.email',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'display_name' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_organizer.display_name',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'self' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_organizer.self',
		'config' => array(
			'type' => 'check',
			'default' => 0
		)
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users',$tmp_kd_calendar_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['fe_users']['types']['Tx_KdCalendar_Organizer']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_users']['types'])) {
	// use first entry in types array
	$fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
	$GLOBALS['TCA']['fe_users']['types']['Tx_KdCalendar_Organizer']['showitem'] = $fe_users_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['fe_users']['types']['Tx_KdCalendar_Organizer']['showitem'] = '';
}
$GLOBALS['TCA']['fe_users']['types']['Tx_KdCalendar_Organizer']['showitem'] .= ',--div--;LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_organizer,';
$GLOBALS['TCA']['fe_users']['types']['Tx_KdCalendar_Organizer']['showitem'] .= 'id, email, display_name, self';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_KdCalendar_Organizer','Tx_KdCalendar_Organizer');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);