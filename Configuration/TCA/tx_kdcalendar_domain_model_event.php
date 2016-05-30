<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event',
		'label' => 'summary',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'id,status,html_link,summary,description,location,color_id,end_time_unspecified,recurrence,recurring_event_id,transparency,visibility,i_cal_u_i_d,sequence,attendees_omitted,extended_properties,hangout_link,anyone_can_add_self,guests_can_invite_others,guests_can_modify,guests_can_see_other_guests,private_copy,locked,use_default_reminder,source_url,source_title,creator,organizer,start,end,original_start_time,attendees,gadget,reminders,attachments,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('kd_calendar') . 'Resources/Public/Icons/tx_kdcalendar_domain_model_event.gif'
	),
	'interface' => array(
		'showRecordFieldList' => 'hidden, id, status, html_link, summary, description, location, color_id, end_time_unspecified, recurrence, recurring_event_id, transparency, visibility, i_cal_u_i_d, sequence, attendees_omitted, extended_properties, hangout_link, anyone_can_add_self, guests_can_invite_others, guests_can_modify, guests_can_see_other_guests, private_copy, locked, use_default_reminder, source_url, source_title, creator, organizer, start, end, original_start_time, attendees, gadget, reminders, attachments',
	),
	'types' => array(
		'1' => array('showitem' => 'id, status, html_link, summary, description;;;richtext:rte_transform[mode=ts_links], location, color_id, end_time_unspecified, recurrence, recurring_event_id, transparency, visibility, i_cal_u_i_d, sequence, attendees_omitted, extended_properties, hangout_link, anyone_can_add_self, guests_can_invite_others, guests_can_modify, guests_can_see_other_guests, private_copy, locked, use_default_reminder, source_url, source_title, creator, organizer, start, end, original_start_time, attendees, gadget, reminders, attachments, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, hidden;;1, starttime, endtime'),
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
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.id',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'status' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.status',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.status.confirmed','confirmed'),
					array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.status.tentative','tentative'),
					array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.status.cancelled','cancelled'),
				)
			),
		),
		'html_link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.html_link',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'summary' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.summary',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'description' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.description',
			'config' => array(
				'type' => 'text',
				'cols' => 40,
				'rows' => 15,
				'eval' => 'trim',
			)
		),
		'location' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.location',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'color_id' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.color_id',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'end_time_unspecified' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.end_time_unspecified',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'recurrence' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.recurrence',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'recurring_event_id' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.recurring_event_id',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'transparency' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.transparency',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.transparency.opaque','opaque'),
					array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.transparency.transparent','transparent'),
				)
			),
		),
		'visibility' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.visibility',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectSingle',
				'items' => array(
					array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.visibility.default','default'),
					array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.visibility.public','public'),
					array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.visibility.private','private'),
					array('LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.visibility.confidential','confidential'),
				)
			),
		),
		'i_cal_u_i_d' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.i_cal_u_i_d',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'sequence' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.sequence',
			'config' => array(
				'type' => 'input',
				'size' => 4,
				'eval' => 'int'
			)
		),
		'attendees_omitted' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.attendees_omitted',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'extended_properties' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.extended_properties',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'hangout_link' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.hangout_link',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'anyone_can_add_self' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.anyone_can_add_self',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'guests_can_invite_others' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.guests_can_invite_others',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'guests_can_modify' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.guests_can_modify',
			'config' => array(
				'type' => 'check',
				'default' => 0
			),
		),
		'guests_can_see_other_guests' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.guests_can_see_other_guests',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'private_copy' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.private_copy',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'locked' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.locked',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'use_default_reminder' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.use_default_reminder',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		'source_url' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.source_url',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'source_title' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.source_title',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
		),
		'creator' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.creator',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_kdcalendar_domain_model_creator',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				)
			),
		),
		'organizer' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.organizer',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_kdcalendar_domain_model_organizer',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				)
			),
		),
		'start' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.start',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_kdcalendar_domain_model_time',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'end' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.end',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_kdcalendar_domain_model_time',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'original_start_time' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.original_start_time',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_kdcalendar_domain_model_time',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'attendees' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.attendees',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_kdcalendar_domain_model_attendees',
				'MM' => 'tx_kdcalendar_event_attendees_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'module' => array(
							'name' => 'wizard_edit',
						),
						'type' => 'popup',
						'title' => 'Edit',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'module' => array(
							'name' => 'wizard_add',
						),
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_kdcalendar_domain_model_attendees',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						),
					),
				),
			),
		),
		'gadget' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.gadget',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_kdcalendar_domain_model_gadget',
				'minitems' => 0,
				'maxitems' => 1,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),
		),
		'reminders' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.reminders',
			'config' => array(
				'type' => 'inline',
				'foreign_table' => 'tx_kdcalendar_domain_model_reminder',
				'foreign_field' => 'event',
				'maxitems' => 9999,
				'appearance' => array(
					'collapseAll' => 0,
					'levelLinksPosition' => 'top',
					'showSynchronizationLink' => 1,
					'showPossibleLocalizationRecords' => 1,
					'showAllLocalizationLink' => 1
				),
			),

		),
		'attachments' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tx_kdcalendar_domain_model_event.attachments',
			'config' => array(
				'type' => 'select',
				'renderType' => 'selectMultipleSideBySide',
				'foreign_table' => 'tx_kdcalendar_domain_model_attachment',
				'MM' => 'tx_kdcalendar_event_attachment_mm',
				'size' => 10,
				'autoSizeMax' => 30,
				'maxitems' => 9999,
				'multiple' => 0,
				'wizards' => array(
					'_PADDING' => 1,
					'_VERTICAL' => 1,
					'edit' => array(
						'module' => array(
							'name' => 'wizard_edit',
						),
						'type' => 'popup',
						'title' => 'Edit',
						'icon' => 'edit2.gif',
						'popup_onlyOpenIfSelected' => 1,
						'JSopenParams' => 'height=350,width=580,status=0,menubar=0,scrollbars=1',
						),
					'add' => Array(
						'module' => array(
							'name' => 'wizard_add',
						),
						'type' => 'script',
						'title' => 'Create new',
						'icon' => 'add.gif',
						'params' => array(
							'table' => 'tx_kdcalendar_domain_model_attachment',
							'pid' => '###CURRENT_PID###',
							'setValue' => 'prepend'
						)
					)
				)
			)
		),
		
		'calendar' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),
	),
);