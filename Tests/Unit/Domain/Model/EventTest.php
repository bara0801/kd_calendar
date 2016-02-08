<?php

namespace KevinDitscheid\KdCalendar\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Kevin Ditscheid <kevinditscheid@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Test case for class \KevinDitscheid\KdCalendar\Domain\Model\Event.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Kevin Ditscheid <kevinditscheid@gmail.com>
 */
class EventTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Event
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \KevinDitscheid\KdCalendar\Domain\Model\Event();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getIdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getId()
		);
	}

	/**
	 * @test
	 */
	public function setIdForStringSetsId()
	{
		$this->subject->setId('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'id',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStatusReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getStatus()
		);
	}

	/**
	 * @test
	 */
	public function setStatusForStringSetsStatus()
	{
		$this->subject->setStatus('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'status',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getHtmlLinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getHtmlLink()
		);
	}

	/**
	 * @test
	 */
	public function setHtmlLinkForStringSetsHtmlLink()
	{
		$this->subject->setHtmlLink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'htmlLink',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSummaryReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSummary()
		);
	}

	/**
	 * @test
	 */
	public function setSummaryForStringSetsSummary()
	{
		$this->subject->setSummary('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'summary',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDescriptionReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDescription()
		);
	}

	/**
	 * @test
	 */
	public function setDescriptionForStringSetsDescription()
	{
		$this->subject->setDescription('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'description',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLocationReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getLocation()
		);
	}

	/**
	 * @test
	 */
	public function setLocationForStringSetsLocation()
	{
		$this->subject->setLocation('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'location',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getColorIdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getColorId()
		);
	}

	/**
	 * @test
	 */
	public function setColorIdForStringSetsColorId()
	{
		$this->subject->setColorId('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'colorId',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEndTimeUnspecifiedReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getEndTimeUnspecified()
		);
	}

	/**
	 * @test
	 */
	public function setEndTimeUnspecifiedForBoolSetsEndTimeUnspecified()
	{
		$this->subject->setEndTimeUnspecified(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'endTimeUnspecified',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRecurrenceReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRecurrence()
		);
	}

	/**
	 * @test
	 */
	public function setRecurrenceForStringSetsRecurrence()
	{
		$this->subject->setRecurrence('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'recurrence',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRecurringEventIdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getRecurringEventId()
		);
	}

	/**
	 * @test
	 */
	public function setRecurringEventIdForStringSetsRecurringEventId()
	{
		$this->subject->setRecurringEventId('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'recurringEventId',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTransparencyReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTransparency()
		);
	}

	/**
	 * @test
	 */
	public function setTransparencyForStringSetsTransparency()
	{
		$this->subject->setTransparency('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'transparency',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getVisibilityReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getVisibility()
		);
	}

	/**
	 * @test
	 */
	public function setVisibilityForStringSetsVisibility()
	{
		$this->subject->setVisibility('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'visibility',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getICalUIDReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getICalUID()
		);
	}

	/**
	 * @test
	 */
	public function setICalUIDForStringSetsICalUID()
	{
		$this->subject->setICalUID('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'iCalUID',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSequenceReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setSequenceForIntSetsSequence()
	{	}

	/**
	 * @test
	 */
	public function getAttendeesOmittedReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getAttendeesOmitted()
		);
	}

	/**
	 * @test
	 */
	public function setAttendeesOmittedForBoolSetsAttendeesOmitted()
	{
		$this->subject->setAttendeesOmitted(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'attendeesOmitted',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getExtendedPropertiesReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getExtendedProperties()
		);
	}

	/**
	 * @test
	 */
	public function setExtendedPropertiesForStringSetsExtendedProperties()
	{
		$this->subject->setExtendedProperties('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'extendedProperties',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getHangoutLinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getHangoutLink()
		);
	}

	/**
	 * @test
	 */
	public function setHangoutLinkForStringSetsHangoutLink()
	{
		$this->subject->setHangoutLink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'hangoutLink',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAnyoneCanAddSelfReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getAnyoneCanAddSelf()
		);
	}

	/**
	 * @test
	 */
	public function setAnyoneCanAddSelfForBoolSetsAnyoneCanAddSelf()
	{
		$this->subject->setAnyoneCanAddSelf(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'anyoneCanAddSelf',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getGuestsCanInviteOthersReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getGuestsCanInviteOthers()
		);
	}

	/**
	 * @test
	 */
	public function setGuestsCanInviteOthersForBoolSetsGuestsCanInviteOthers()
	{
		$this->subject->setGuestsCanInviteOthers(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'guestsCanInviteOthers',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getGuestsCanModifyReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getGuestsCanModify()
		);
	}

	/**
	 * @test
	 */
	public function setGuestsCanModifyForStringSetsGuestsCanModify()
	{
		$this->subject->setGuestsCanModify('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'guestsCanModify',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getGuestsCanSeeOtherGuestsReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getGuestsCanSeeOtherGuests()
		);
	}

	/**
	 * @test
	 */
	public function setGuestsCanSeeOtherGuestsForBoolSetsGuestsCanSeeOtherGuests()
	{
		$this->subject->setGuestsCanSeeOtherGuests(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'guestsCanSeeOtherGuests',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getPrivateCopyReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getPrivateCopy()
		);
	}

	/**
	 * @test
	 */
	public function setPrivateCopyForBoolSetsPrivateCopy()
	{
		$this->subject->setPrivateCopy(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'privateCopy',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLockedReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getLocked()
		);
	}

	/**
	 * @test
	 */
	public function setLockedForBoolSetsLocked()
	{
		$this->subject->setLocked(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'locked',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getUseDefaultReminderReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getUseDefaultReminder()
		);
	}

	/**
	 * @test
	 */
	public function setUseDefaultReminderForBoolSetsUseDefaultReminder()
	{
		$this->subject->setUseDefaultReminder(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'useDefaultReminder',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSourceUrlReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSourceUrl()
		);
	}

	/**
	 * @test
	 */
	public function setSourceUrlForStringSetsSourceUrl()
	{
		$this->subject->setSourceUrl('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'sourceUrl',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSourceTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getSourceTitle()
		);
	}

	/**
	 * @test
	 */
	public function setSourceTitleForStringSetsSourceTitle()
	{
		$this->subject->setSourceTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'sourceTitle',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getCreatorReturnsInitialValueForCreator()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getCreator()
		);
	}

	/**
	 * @test
	 */
	public function setCreatorForCreatorSetsCreator()
	{
		$creatorFixture = new \KevinDitscheid\KdCalendar\Domain\Model\Creator();
		$this->subject->setCreator($creatorFixture);

		$this->assertAttributeEquals(
			$creatorFixture,
			'creator',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getOrganizerReturnsInitialValueForOrganizer()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getOrganizer()
		);
	}

	/**
	 * @test
	 */
	public function setOrganizerForOrganizerSetsOrganizer()
	{
		$organizerFixture = new \KevinDitscheid\KdCalendar\Domain\Model\Organizer();
		$this->subject->setOrganizer($organizerFixture);

		$this->assertAttributeEquals(
			$organizerFixture,
			'organizer',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getStartReturnsInitialValueForTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getStart()
		);
	}

	/**
	 * @test
	 */
	public function setStartForTimeSetsStart()
	{
		$startFixture = new \KevinDitscheid\KdCalendar\Domain\Model\Time();
		$this->subject->setStart($startFixture);

		$this->assertAttributeEquals(
			$startFixture,
			'start',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEndReturnsInitialValueForTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getEnd()
		);
	}

	/**
	 * @test
	 */
	public function setEndForTimeSetsEnd()
	{
		$endFixture = new \KevinDitscheid\KdCalendar\Domain\Model\Time();
		$this->subject->setEnd($endFixture);

		$this->assertAttributeEquals(
			$endFixture,
			'end',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getOriginalStartTimeReturnsInitialValueForTime()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getOriginalStartTime()
		);
	}

	/**
	 * @test
	 */
	public function setOriginalStartTimeForTimeSetsOriginalStartTime()
	{
		$originalStartTimeFixture = new \KevinDitscheid\KdCalendar\Domain\Model\Time();
		$this->subject->setOriginalStartTime($originalStartTimeFixture);

		$this->assertAttributeEquals(
			$originalStartTimeFixture,
			'originalStartTime',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getAttendeesReturnsInitialValueForAttendees()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getAttendees()
		);
	}

	/**
	 * @test
	 */
	public function setAttendeesForObjectStorageContainingAttendeesSetsAttendees()
	{
		$attendee = new \KevinDitscheid\KdCalendar\Domain\Model\Attendees();
		$objectStorageHoldingExactlyOneAttendees = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneAttendees->attach($attendee);
		$this->subject->setAttendees($objectStorageHoldingExactlyOneAttendees);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneAttendees,
			'attendees',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addAttendeeToObjectStorageHoldingAttendees()
	{
		$attendee = new \KevinDitscheid\KdCalendar\Domain\Model\Attendees();
		$attendeesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$attendeesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($attendee));
		$this->inject($this->subject, 'attendees', $attendeesObjectStorageMock);

		$this->subject->addAttendee($attendee);
	}

	/**
	 * @test
	 */
	public function removeAttendeeFromObjectStorageHoldingAttendees()
	{
		$attendee = new \KevinDitscheid\KdCalendar\Domain\Model\Attendees();
		$attendeesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$attendeesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($attendee));
		$this->inject($this->subject, 'attendees', $attendeesObjectStorageMock);

		$this->subject->removeAttendee($attendee);

	}

	/**
	 * @test
	 */
	public function getGadgetReturnsInitialValueForGadget()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getGadget()
		);
	}

	/**
	 * @test
	 */
	public function setGadgetForGadgetSetsGadget()
	{
		$gadgetFixture = new \KevinDitscheid\KdCalendar\Domain\Model\Gadget();
		$this->subject->setGadget($gadgetFixture);

		$this->assertAttributeEquals(
			$gadgetFixture,
			'gadget',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getRemindersReturnsInitialValueForReminder()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getReminders()
		);
	}

	/**
	 * @test
	 */
	public function setRemindersForObjectStorageContainingReminderSetsReminders()
	{
		$reminder = new \KevinDitscheid\KdCalendar\Domain\Model\Reminder();
		$objectStorageHoldingExactlyOneReminders = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneReminders->attach($reminder);
		$this->subject->setReminders($objectStorageHoldingExactlyOneReminders);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneReminders,
			'reminders',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addReminderToObjectStorageHoldingReminders()
	{
		$reminder = new \KevinDitscheid\KdCalendar\Domain\Model\Reminder();
		$remindersObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$remindersObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($reminder));
		$this->inject($this->subject, 'reminders', $remindersObjectStorageMock);

		$this->subject->addReminder($reminder);
	}

	/**
	 * @test
	 */
	public function removeReminderFromObjectStorageHoldingReminders()
	{
		$reminder = new \KevinDitscheid\KdCalendar\Domain\Model\Reminder();
		$remindersObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$remindersObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($reminder));
		$this->inject($this->subject, 'reminders', $remindersObjectStorageMock);

		$this->subject->removeReminder($reminder);

	}

	/**
	 * @test
	 */
	public function getAttachmentsReturnsInitialValueForAttachment()
	{
		$this->assertEquals(
			NULL,
			$this->subject->getAttachments()
		);
	}

	/**
	 * @test
	 */
	public function setAttachmentsForAttachmentSetsAttachments()
	{
		$attachmentsFixture = new \KevinDitscheid\KdCalendar\Domain\Model\Attachment();
		$this->subject->setAttachments($attachmentsFixture);

		$this->assertAttributeEquals(
			$attachmentsFixture,
			'attachments',
			$this->subject
		);
	}
}
