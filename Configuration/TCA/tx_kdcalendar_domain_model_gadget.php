<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_gadget',
		'label' => 'type',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,
		'hideTable' => TRUE,
		
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'type,title,display,width,height,icon_link,link,preferences,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('kd_calendar') . 'Resources/Public/Icons/tx_kdcalendar_domain_model_gadget.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, type, title, display, width, height, icon_link, link, preferences',
	),
	'types' => array(
		'1' => array('showitem' => 'type, title, display, width, height, icon_link, link, preferences, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, hidden;;1, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'type' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_gadget.type',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_gadget.title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'display' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_gadget.display',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('-- Label --', 0),
				),
				'size' => 1,
				'maxitems' => 1,
				'eval' => ''
			),
		),
		'width' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_gadget.width',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'height' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_gadget.height',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'icon_link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_gadget.icon_link',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_gadget.link',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'preferences' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_gadget.preferences',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		
	),
);