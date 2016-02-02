<?php

if (!isset($GLOBALS['TCA']['sys_file']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['sys_file']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['sys_file']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['sys_file']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_kdcalendar_sys_file = array();
	$tempColumnstx_kdcalendar_sys_file[$GLOBALS['TCA']['sys_file']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('Attachment','Tx_KdCalendar_Attachment')
			),
			'default' => 'Tx_KdCalendar_Attachment',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file', $tempColumnstx_kdcalendar_sys_file, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'sys_file',
	$GLOBALS['TCA']['sys_file']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['sys_file']['ctrl']['label']
);

$tmp_kd_calendar_columns = array(

	'file_url' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attachment.file_url',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'title' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attachment.title',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'mime_type' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attachment.mime_type',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'icon_link' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attachment.icon_link',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'file_id' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attachment.file_id',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('sys_file',$tmp_kd_calendar_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['sys_file']['types']['1']['showitem'])) {
	$GLOBALS['TCA']['sys_file']['types']['Tx_KdCalendar_Attachment']['showitem'] = $GLOBALS['TCA']['sys_file']['types']['1']['showitem'];
} elseif(is_array($GLOBALS['TCA']['sys_file']['types'])) {
	// use first entry in types array
	$sys_file_type_definition = reset($GLOBALS['TCA']['sys_file']['types']);
	$GLOBALS['TCA']['sys_file']['types']['Tx_KdCalendar_Attachment']['showitem'] = $sys_file_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['sys_file']['types']['Tx_KdCalendar_Attachment']['showitem'] = '';
}
$GLOBALS['TCA']['sys_file']['types']['Tx_KdCalendar_Attachment']['showitem'] .= ',--div--;LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attachment,';
$GLOBALS['TCA']['sys_file']['types']['Tx_KdCalendar_Attachment']['showitem'] .= 'file_url, title, mime_type, icon_link, file_id';

$GLOBALS['TCA']['sys_file']['columns'][$GLOBALS['TCA']['sys_file']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:sys_file.tx_extbase_type.Tx_KdCalendar_Attachment','Tx_KdCalendar_Attachment');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);