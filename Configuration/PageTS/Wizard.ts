/*
 *    Project:	Expression project.displayName is undefined on line 2, column 19 in Templates/TypoScript/TSTemplate.ts. - Expression project.name is undefined on line 2, column 44 in Templates/TypoScript/TSTemplate.ts.
 *    Version:	1.0.0
 *    Date:		23.04.2016 17:56:38
 *    Author:	Kevin Ditscheid <ditscheid@engine-productions.de> 
 *
 *    Coded with Netbeans!
 */
mod.wizards.newContentElement.wizardItems.special {
	elements{
		kdcalendar_events {
			icon = ../typo3conf/ext/kd_calendar/ext_icon.gif
			title = LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tt_content.CType.events.wizardtitle
			description = LLL:EXT:kd_calendar/Resources/Private/Language/locallang_db.xlf:tt_content.CType.events.wizarddescription
			tt_content_defValues.CType = kdcalendar_events
		}
	}
	show := addToList(kdcalendar_events)
}