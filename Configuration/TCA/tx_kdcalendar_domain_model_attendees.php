<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attendees',
		'label' => 'id',
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
		'searchFields' => 'id,email,organizer,self,resource,response_status,optional,additional_guests,comment,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('kd_calendar') . 'Resources/Public/Icons/tx_kdcalendar_domain_model_attendees.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, id, organizer, self, resource, response_status, optional, additional_guests, comment, fe_user',
	),
	'types' => array(
		'1' => array('showitem' => 'id, organizer, self, resource, response_status, optional, additional_guests, comment, fe_user, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, hidden;;1, starttime, endtime'),
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

		'id' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attendees.id',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'organizer' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attendees.organizer',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'self' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attendees.self',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'resource' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attendees.resource',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'response_status' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attendees.response_status',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'optional' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attendees.optional',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'additional_guests' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attendees.additional_guests',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'comment' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attendees.comment',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'fe_user' => array(
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_attendees.fe_user',
			'exclude' => 1,
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'foreign_table' => 'fe_users'
			)
		)
	),
);