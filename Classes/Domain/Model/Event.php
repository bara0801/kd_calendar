<?php

namespace KevinDitscheid\KdCalendar\Domain\Model;

/* * *************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016 Kevin Ditscheid <kevinditscheid@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * ************************************************************* */

/**
 * An event
 */
class Event extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * Opaque identifier of the event
	 *
	 * @var string
	 */
	protected $id = '';

	/**
	 * Status of the event. Optional. Possible values are:
	 *
	 *     "confirmed" - The event is confirmed. This is the default status.
	 *     "tentative" - The event is tentatively confirmed.
	 *     "cancelled" - The event is cancelled.
	 *
	 * @var string
	 */
	protected $status = '';

	/**
	 * An absolute link to this event in the Google Calendar Web UI
	 *
	 * @var string
	 */
	protected $htmlLink = '';

	/**
	 * Title of the event
	 *
	 * @var string
	 */
	protected $summary = '';

	/**
	 * Description of the event
	 *
	 * @var string
	 */
	protected $description = '';

	/**
	 * Geographic location of the event as free-form text
	 *
	 * @var string
	 */
	protected $location = '';

	/**
	 * The color of the event. This is an ID referring to an entry in the event section
	 * of the colors definition
	 *
	 * @var string
	 */
	protected $colorId = '';

	/**
	 * Whether the endTime is unspecified
	 *
	 * @var bool
	 */
	protected $endTimeUnspecified = false;

	/**
	 * List of RRULE, EXRULE, RDATE and EXDATE lines for a recurring event, as
	 * specified in RFC5545. Note that DTSTART and DTEND lines are not allowed in this
	 * field; event start and end times are specified in the start and end fields. This
	 * field is omitted for single events or instances of recurring events
	 *
	 * @var string
	 */
	protected $recurrence = '';

	/**
	 * For an instance of a recurring event, this is the id of the recurring event to
	 * which this instance belongs
	 *
	 * @var string
	 */
	protected $recurringEventId = '';

	/**
	 * Whether the event blocks time on the calendar. Optional. Possible values are:
	 *
	 *     "opaque" - The event blocks time on the calendar. This is the default value.
	 *     "transparent" - The event does not block time on the calendar
	 *
	 * @var string
	 */
	protected $transparency = '';

	/**
	 * Visibility of the event. Optional. Possible values are:
	 *
	 *     "default" - Uses the default visibility for events on the calendar. This is
	 * the default value.
	 *     "public" - The event is public and event details are visible to all readers
	 * of the calendar.
	 *     "private" - The event is private and only event attendees may view event
	 * details.
	 *     "confidential" - The event is private. This value is provided for
	 * compatibility reasons
	 *
	 * @var string
	 */
	protected $visibility = '';

	/**
	 * Event unique identifier as defined in RFC5545. It is used to uniquely identify
	 * events accross calendaring systems and must be supplied when importing events
	 * via the import method
	 *
	 * @var string
	 */
	protected $iCalUID = '';

	/**
	 * Sequence number as per iCalendar
	 *
	 * @var int
	 */
	protected $sequence = 0;

	/**
	 * Whether attendees may have been omitted from the event's representation. When
	 * retrieving an event, this may be due to a restriction specified by the
	 * maxAttendee query parameter. When updating an event, this can be used to only
	 * update the participant's response
	 *
	 * @var bool
	 */
	protected $attendeesOmitted = false;

	/**
	 * Extended properties of the event
	 *
	 * @var string
	 */
	protected $extendedProperties = '';

	/**
	 * An absolute link to the Google+ hangout associated with this event
	 *
	 * @var string
	 */
	protected $hangoutLink = '';

	/**
	 * Whether anyone can invite themselves to the event. Optional. The default is
	 * False
	 *
	 * @var bool
	 */
	protected $anyoneCanAddSelf = false;

	/**
	 * Whether attendees other than the organizer can invite others to the event.
	 * Optional. The default is True
	 *
	 * @var bool
	 */
	protected $guestsCanInviteOthers = TRUE;

	/**
	 * Whether attendees other than the organizer can modify the event. Optional. The
	 * default is False
	 *
	 * @var bool
	 */
	protected $guestsCanModify = FALSE;

	/**
	 * Whether attendees other than the organizer can see who the event's attendees
	 * are. Optional. The default is True
	 *
	 * @var bool
	 */
	protected $guestsCanSeeOtherGuests = TRUE;

	/**
	 * Whether this is a private event copy where changes are not shared with other
	 * copies on other calendars. Optional. Immutable. The default is False
	 *
	 * @var bool
	 */
	protected $privateCopy = FALSE;

	/**
	 * Whether this is a locked event copy where no changes can be made to the main
	 * event fields "summary", "description", "location", "start", "end" or
	 * "recurrence". The default is False
	 *
	 * @var bool
	 */
	protected $locked = FALSE;

	/**
	 * Whether the default reminders of the calendar apply to the event.
	 *
	 * @var bool
	 */
	protected $useDefaultReminder = false;

	/**
	 * URL of the source pointing to a resource. The URL scheme must be HTTP or HTTPS.
	 *
	 * @var string
	 */
	protected $sourceUrl = '';

	/**
	 * Title of the source; for example a title of a web page or an email subject.
	 *
	 * @var string
	 */
	protected $sourceTitle = '';

	/**
	 * The creator of the event
	 *
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Creator
	 */
	protected $creator = null;

	/**
	 * The organizer of the event
	 *
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Organizer
	 */
	protected $organizer = null;

	/**
	 * The start date
	 *
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Time
	 */
	protected $start = null;

	/**
	 * The end time
	 *
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Time
	 */
	protected $end = null;

	/**
	 * The original start time
	 *
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Time
	 */
	protected $originalStartTime = null;

	/**
	 * Attendees of this event
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\KevinDitscheid\KdCalendar\Domain\Model\Attendees>
	 */
	protected $attendees = null;

	/**
	 * The gadget
	 *
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Gadget
	 */
	protected $gadget = null;

	/**
	 * The reminders
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\KevinDitscheid\KdCalendar\Domain\Model\Reminder>
	 * @cascade remove
	 */
	protected $reminders = null;

	/**
	 * attachments
	 *
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\KevinDitscheid\KdCalendar\Domain\Model\Attachment>
	 */
	protected $attachments = null;

	/**
	 * Insert the google data into the model
	 *
	 * @param \Google_Service_Calendar_Event $eventItem
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Event $event
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Event
	 */
	static public function convert($eventItem, $event = NULL){
		if($event === NULL){
			$event = new \KevinDitscheid\KdCalendar\Domain\Model\Event();
		}
		$event->setId($eventItem->getId());
		$event->setDescription($eventItem->getDescription());
		$event->setSummary($eventItem->getSummary());
		$event->setColorId($eventItem->getColorId());
		$event->setStatus($eventItem->getStatus());
		$event->setVisibility($eventItem->getVisibility());
		$event->setEndTimeUnspecified($eventItem->getEndTimeUnspecified());
		$event->setAnyoneCanAddSelf($eventItem->getAnyoneCanAddSelf());
		$event->setHtmlLink($eventItem->getHtmlLink());
		$event->setICalUID($eventItem->getICalUID());
		$event->setAttendeesOmitted($eventItem->getAttendeesOmitted());
		//$event->setExtendedProperties($eventItem->getExtendedProperties());
		$event->setGuestsCanInviteOthers($eventItem->getGuestsCanInviteOthers());
		$event->setGuestsCanSeeOtherGuests($eventItem->getGuestsCanSeeOtherGuests());
		$event->setHangoutLink($eventItem->getHangoutLink());
		$event->setLocation($eventItem->getLocation());
		$event->setLocked($eventItem->getLocked());
		$event->setPrivateCopy($eventItem->getPrivateCopy());
		$event->setRecurrence($eventItem->getRecurrence());
		$event->setRecurringEventId($eventItem->getRecurringEventId());
		$event->setSequence($eventItem->getSequence());
		
		$event->setAttachments(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		foreach($eventItem->getAttachments() as $attachment){
			$event->addAttachment(
				\KevinDitscheid\KdCalendar\Domain\Model\Attachment::convert($attachment)
			);
		}
		
		$event->setAttendees(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		foreach($eventItem->getAttendees() as $attendee){
			$event->addAttendee(
				\KevinDitscheid\KdCalendar\Domain\Model\Attendees::convert($attendee)
			);
		}
		
		if($eventItem->getCreator()){
			$event->setCreator(
				\KevinDitscheid\KdCalendar\Domain\Model\Creator::convert($eventItem->getCreator(), $event->getCreator())
			);
		}else{
			$event->setCreator(NULL);
		}
		if($eventItem->getGadget()){
			$event->setGadget(
				\KevinDitscheid\KdCalendar\Domain\Model\Gadget::convert($eventItem->getGadget(), $event->getGadget())
			);
		}else{
			$event->setCreator(NULL);
		}
		if($eventItem->getStart()){
			$event->setStart(
				\KevinDitscheid\KdCalendar\Domain\Model\Time::convert($eventItem->getStart(), $event->getStart())
			);
		}else{
			$event->setStart(NULL);
		}
		if($eventItem->getEnd()){
			$event->setEnd(
				\KevinDitscheid\KdCalendar\Domain\Model\Time::convert($eventItem->getEnd(), $event->getEnd())
			);
		}else{
			$event->setEnd(NULL);
		}
		if($eventItem->getOriginalStartTime()){
			$event->setOriginalStartTime(
				\KevinDitscheid\KdCalendar\Domain\Model\Time::convert($eventItem->getOriginalStartTime(), $event->getOriginalStartTime())
			);
		}else{
			$event->setOriginalStartTime(NULL);
		}
		if($eventItem->getOrganizer()){
			$event->setOrganizer(
				\KevinDitscheid\KdCalendar\Domain\Model\Organizer::convert($eventItem->getOrganizer(), $event->getOrganizer())
			);
		}else{
			$event->setOrganizer(NULL);
		}
		
		$event->setReminders(new \TYPO3\CMS\Extbase\Persistence\ObjectStorage());
		$reminders = $eventItem->getReminders();
		if($reminders){
			$event->setUseDefaultReminder($reminders->getUseDefault());
			foreach($reminders->getOverrides() as $reminder){
				$event->addReminder(
					\KevinDitscheid\KdCalendar\Domain\Model\Reminder::convert($reminder)
				);
			}
		}
		
		$source = $eventItem->getSource();
		$event->setSourceTitle($source['title']);
		$event->setSourceUrl($source['url']);
		
		return $event;
	}
	
	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 *
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->attendees = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->reminders = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

	/**
	 * Returns the id
	 *
	 * @return string $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * Sets the id
	 *
	 * @param string $id
	 * @return void
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * Returns the status
	 *
	 * @return string $status
	 */
	public function getStatus() {
		return $this->status;
	}

	/**
	 * Sets the status
	 *
	 * @param string $status
	 * @return void
	 */
	public function setStatus($status) {
		$this->status = $status;
	}

	/**
	 * Returns the htmlLink
	 *
	 * @return string $htmlLink
	 */
	public function getHtmlLink() {
		return $this->htmlLink;
	}

	/**
	 * Sets the htmlLink
	 *
	 * @param string $htmlLink
	 * @return void
	 */
	public function setHtmlLink($htmlLink) {
		$this->htmlLink = $htmlLink;
	}

	/**
	 * Returns the summary
	 *
	 * @return string $summary
	 */
	public function getSummary() {
		return $this->summary;
	}

	/**
	 * Sets the summary
	 *
	 * @param string $summary
	 * @return void
	 */
	public function setSummary($summary) {
		$this->summary = $summary;
	}

	/**
	 * Returns the description
	 *
	 * @return string $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * Sets the description
	 *
	 * @param string $description
	 * @return void
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * Returns the location
	 *
	 * @return string $location
	 */
	public function getLocation() {
		return $this->location;
	}

	/**
	 * Sets the location
	 *
	 * @param string $location
	 * @return void
	 */
	public function setLocation($location) {
		$this->location = $location;
	}

	/**
	 * Returns the colorId
	 *
	 * @return string $colorId
	 */
	public function getColorId() {
		return $this->colorId;
	}

	/**
	 * Sets the colorId
	 *
	 * @param string $colorId
	 * @return void
	 */
	public function setColorId($colorId) {
		$this->colorId = $colorId;
	}

	/**
	 * Returns the endTimeUnspecified
	 *
	 * @return bool $endTimeUnspecified
	 */
	public function getEndTimeUnspecified() {
		return $this->endTimeUnspecified;
	}

	/**
	 * Sets the endTimeUnspecified
	 *
	 * @param bool $endTimeUnspecified
	 * @return void
	 */
	public function setEndTimeUnspecified($endTimeUnspecified) {
		$this->endTimeUnspecified = $endTimeUnspecified;
	}

	/**
	 * Returns the boolean state of endTimeUnspecified
	 *
	 * @return bool
	 */
	public function isEndTimeUnspecified() {
		return $this->endTimeUnspecified;
	}

	/**
	 * Returns the recurrence
	 *
	 * @return string $recurrence
	 */
	public function getRecurrence() {
		return $this->recurrence;
	}

	/**
	 * Sets the recurrence
	 *
	 * @param string $recurrence
	 * @return void
	 */
	public function setRecurrence($recurrence) {
		$this->recurrence = $recurrence;
	}

	/**
	 * Returns the recurringEventId
	 *
	 * @return string $recurringEventId
	 */
	public function getRecurringEventId() {
		return $this->recurringEventId;
	}

	/**
	 * Sets the recurringEventId
	 *
	 * @param string $recurringEventId
	 * @return void
	 */
	public function setRecurringEventId($recurringEventId) {
		$this->recurringEventId = $recurringEventId;
	}

	/**
	 * Returns the transparency
	 *
	 * @return string $transparency
	 */
	public function getTransparency() {
		return $this->transparency;
	}

	/**
	 * Sets the transparency
	 *
	 * @param string $transparency
	 * @return void
	 */
	public function setTransparency($transparency) {
		$this->transparency = $transparency;
	}

	/**
	 * Returns the visibility
	 *
	 * @return string $visibility
	 */
	public function getVisibility() {
		return $this->visibility;
	}

	/**
	 * Sets the visibility
	 *
	 * @param string $visibility
	 * @return void
	 */
	public function setVisibility($visibility) {
		$this->visibility = $visibility;
	}

	/**
	 * Returns the iCalUID
	 *
	 * @return string $iCalUID
	 */
	public function getICalUID() {
		return $this->iCalUID;
	}

	/**
	 * Sets the iCalUID
	 *
	 * @param string $iCalUID
	 * @return void
	 */
	public function setICalUID($iCalUID) {
		$this->iCalUID = $iCalUID;
	}

	/**
	 * Returns the sequence
	 *
	 * @return int $sequence
	 */
	public function getSequence() {
		return $this->sequence;
	}

	/**
	 * Sets the sequence
	 *
	 * @param int $sequence
	 * @return void
	 */
	public function setSequence($sequence) {
		$this->sequence = $sequence;
	}

	/**
	 * Returns the attendeesOmitted
	 *
	 * @return bool $attendeesOmitted
	 */
	public function getAttendeesOmitted() {
		return $this->attendeesOmitted;
	}

	/**
	 * Sets the attendeesOmitted
	 *
	 * @param bool $attendeesOmitted
	 * @return void
	 */
	public function setAttendeesOmitted($attendeesOmitted) {
		$this->attendeesOmitted = $attendeesOmitted;
	}

	/**
	 * Returns the boolean state of attendeesOmitted
	 *
	 * @return bool
	 */
	public function isAttendeesOmitted() {
		return $this->attendeesOmitted;
	}

	/**
	 * Returns the extendedProperties
	 *
	 * @return string $extendedProperties
	 */
	public function getExtendedProperties() {
		return $this->extendedProperties;
	}

	/**
	 * Sets the extendedProperties
	 *
	 * @param string $extendedProperties
	 * @return void
	 */
	public function setExtendedProperties($extendedProperties) {
		$this->extendedProperties = $extendedProperties;
	}

	/**
	 * Returns the hangoutLink
	 *
	 * @return string $hangoutLink
	 */
	public function getHangoutLink() {
		return $this->hangoutLink;
	}

	/**
	 * Sets the hangoutLink
	 *
	 * @param string $hangoutLink
	 * @return void
	 */
	public function setHangoutLink($hangoutLink) {
		$this->hangoutLink = $hangoutLink;
	}

	/**
	 * Returns the anyoneCanAddSelf
	 *
	 * @return bool $anyoneCanAddSelf
	 */
	public function getAnyoneCanAddSelf() {
		return $this->anyoneCanAddSelf;
	}

	/**
	 * Sets the anyoneCanAddSelf
	 *
	 * @param bool $anyoneCanAddSelf
	 * @return void
	 */
	public function setAnyoneCanAddSelf($anyoneCanAddSelf) {
		$this->anyoneCanAddSelf = $anyoneCanAddSelf;
	}

	/**
	 * Returns the boolean state of anyoneCanAddSelf
	 *
	 * @return bool
	 */
	public function isAnyoneCanAddSelf() {
		return $this->anyoneCanAddSelf;
	}

	/**
	 * Returns the guestsCanInviteOthers
	 *
	 * @return bool $guestsCanInviteOthers
	 */
	public function getGuestsCanInviteOthers() {
		return $this->guestsCanInviteOthers;
	}

	/**
	 * Sets the guestsCanInviteOthers
	 *
	 * @param bool $guestsCanInviteOthers
	 * @return void
	 */
	public function setGuestsCanInviteOthers($guestsCanInviteOthers) {
		$this->guestsCanInviteOthers = $guestsCanInviteOthers;
	}

	/**
	 * Returns the boolean state of guestsCanInviteOthers
	 *
	 * @return bool
	 */
	public function isGuestsCanInviteOthers() {
		return $this->guestsCanInviteOthers;
	}

	/**
	 * Returns the guestsCanModify
	 *
	 * @return bool $guestsCanModify
	 */
	public function getGuestsCanModify() {
		return $this->guestsCanModify;
	}

	/**
	 * Sets the guestsCanModify
	 *
	 * @param bool $guestsCanModify
	 * @return void
	 */
	public function setGuestsCanModify($guestsCanModify) {
		$this->guestsCanModify = $guestsCanModify;
	}

	/**
	 * Returns the guestsCanSeeOtherGuests
	 *
	 * @return bool $guestsCanSeeOtherGuests
	 */
	public function getGuestsCanSeeOtherGuests() {
		return $this->guestsCanSeeOtherGuests;
	}

	/**
	 * Sets the guestsCanSeeOtherGuests
	 *
	 * @param bool $guestsCanSeeOtherGuests
	 * @return void
	 */
	public function setGuestsCanSeeOtherGuests($guestsCanSeeOtherGuests) {
		$this->guestsCanSeeOtherGuests = $guestsCanSeeOtherGuests;
	}

	/**
	 * Returns the boolean state of guestsCanSeeOtherGuests
	 *
	 * @return bool
	 */
	public function isGuestsCanSeeOtherGuests() {
		return $this->guestsCanSeeOtherGuests;
	}

	/**
	 * Returns the privateCopy
	 *
	 * @return bool $privateCopy
	 */
	public function getPrivateCopy() {
		return $this->privateCopy;
	}

	/**
	 * Sets the privateCopy
	 *
	 * @param bool $privateCopy
	 * @return void
	 */
	public function setPrivateCopy($privateCopy) {
		$this->privateCopy = $privateCopy;
	}

	/**
	 * Returns the boolean state of privateCopy
	 *
	 * @return bool
	 */
	public function isPrivateCopy() {
		return $this->privateCopy;
	}

	/**
	 * Returns the locked
	 *
	 * @return bool $locked
	 */
	public function getLocked() {
		return $this->locked;
	}

	/**
	 * Sets the locked
	 *
	 * @param bool $locked
	 * @return void
	 */
	public function setLocked($locked) {
		$this->locked = $locked;
	}

	/**
	 * Returns the boolean state of locked
	 *
	 * @return bool
	 */
	public function isLocked() {
		return $this->locked;
	}

	/**
	 * Returns the useDefaultReminder
	 *
	 * @return bool $useDefaultReminder
	 */
	public function getUseDefaultReminder() {
		return $this->useDefaultReminder;
	}

	/**
	 * Sets the useDefaultReminder
	 *
	 * @param bool $useDefaultReminder
	 * @return void
	 */
	public function setUseDefaultReminder($useDefaultReminder) {
		$this->useDefaultReminder = $useDefaultReminder;
	}

	/**
	 * Returns the boolean state of useDefaultReminder
	 *
	 * @return bool
	 */
	public function isUseDefaultReminder() {
		return $this->useDefaultReminder;
	}

	/**
	 * Returns the sourceUrl
	 *
	 * @return string $sourceUrl
	 */
	public function getSourceUrl() {
		return $this->sourceUrl;
	}

	/**
	 * Sets the sourceUrl
	 *
	 * @param string $sourceUrl
	 * @return void
	 */
	public function setSourceUrl($sourceUrl) {
		$this->sourceUrl = $sourceUrl;
	}

	/**
	 * Returns the sourceTitle
	 *
	 * @return string $sourceTitle
	 */
	public function getSourceTitle() {
		return $this->sourceTitle;
	}

	/**
	 * Sets the sourceTitle
	 *
	 * @param string $sourceTitle
	 * @return void
	 */
	public function setSourceTitle($sourceTitle) {
		$this->sourceTitle = $sourceTitle;
	}

	/**
	 * Returns the creator
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Creator $creator
	 */
	public function getCreator() {
		return $this->creator;
	}

	/**
	 * Sets the creator
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Creator $creator
	 * @return void
	 */
	public function setCreator(\KevinDitscheid\KdCalendar\Domain\Model\Creator $creator = NULL) {
		$this->creator = $creator;
	}

	/**
	 * Returns the organizer
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Organizer $organizer
	 */
	public function getOrganizer() {
		return $this->organizer;
	}

	/**
	 * Sets the organizer
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Organizer $organizer
	 * @return void
	 */
	public function setOrganizer(\KevinDitscheid\KdCalendar\Domain\Model\Organizer $organizer = NULL) {
		$this->organizer = $organizer;
	}

	/**
	 * Returns the start
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Time $start
	 */
	public function getStart() {
		return $this->start;
	}

	/**
	 * Sets the start
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Time $start
	 * @return void
	 */
	public function setStart(\KevinDitscheid\KdCalendar\Domain\Model\Time $start = NULL) {
		$this->start = $start;
	}

	/**
	 * Returns the end
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Time $end
	 */
	public function getEnd() {
		return $this->end;
	}

	/**
	 * Sets the end
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Time $end
	 * @return void
	 */
	public function setEnd(\KevinDitscheid\KdCalendar\Domain\Model\Time $end = NULL) {
		$this->end = $end;
	}

	/**
	 * Returns the originalStartTime
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Time $originalStartTime
	 */
	public function getOriginalStartTime() {
		return $this->originalStartTime;
	}

	/**
	 * Sets the originalStartTime
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Time $originalStartTime
	 * @return void
	 */
	public function setOriginalStartTime(\KevinDitscheid\KdCalendar\Domain\Model\Time $originalStartTime = NULL) {
		$this->originalStartTime = $originalStartTime;
	}

	/**
	 * Adds a Attendees
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Attendees $attendee
	 * @return void
	 */
	public function addAttendee(\KevinDitscheid\KdCalendar\Domain\Model\Attendees $attendee) {
		$this->attendees->attach($attendee);
	}

	/**
	 * Removes a Attendees
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Attendees $attendeeToRemove The Attendees to be removed
	 * @return void
	 */
	public function removeAttendee(\KevinDitscheid\KdCalendar\Domain\Model\Attendees $attendeeToRemove) {
		$this->attendees->detach($attendeeToRemove);
	}

	/**
	 * Returns the attendees
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\KevinDitscheid\KdCalendar\Domain\Model\Attendees> $attendees
	 */
	public function getAttendees() {
		return $this->attendees;
	}

	/**
	 * Sets the attendees
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\KevinDitscheid\KdCalendar\Domain\Model\Attendees> $attendees
	 * @return void
	 */
	public function setAttendees(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $attendees) {
		$this->attendees = $attendees;
	}

	/**
	 * Returns the gadget
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Gadget $gadget
	 */
	public function getGadget() {
		return $this->gadget;
	}

	/**
	 * Sets the gadget
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Gadget $gadget
	 * @return void
	 */
	public function setGadget(\KevinDitscheid\KdCalendar\Domain\Model\Gadget $gadget = NULL) {
		$this->gadget = $gadget;
	}

	/**
	 * Adds a Reminder
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Reminder $reminder
	 * @return void
	 */
	public function addReminder(\KevinDitscheid\KdCalendar\Domain\Model\Reminder $reminder) {
		$this->reminders->attach($reminder);
	}

	/**
	 * Removes a Reminder
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Reminder $reminderToRemove The Reminder to be removed
	 * @return void
	 */
	public function removeReminder(\KevinDitscheid\KdCalendar\Domain\Model\Reminder $reminderToRemove) {
		$this->reminders->detach($reminderToRemove);
	}

	/**
	 * Returns the reminders
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\KevinDitscheid\KdCalendar\Domain\Model\Reminder> $reminders
	 */
	public function getReminders() {
		return $this->reminders;
	}

	/**
	 * Sets the reminders
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\KevinDitscheid\KdCalendar\Domain\Model\Reminder> $reminders
	 * @return void
	 */
	public function setReminders(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $reminders) {
		$this->reminders = $reminders;
	}

	/**
	 * Returns the attachments
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\KevinDitscheid\KdCalendar\Domain\Model\Attachment> $attachments
	 */
	public function getAttachments() {
		return $this->attachments;
	}

	/**
	 * Sets the attachments
	 *
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\KevinDitscheid\KdCalendar\Domain\Model\Attachment> $attachments
	 * @return void
	 */
	public function setAttachments(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $attachments) {
		$this->attachments = $attachments;
	}

	/**
	 * Add an attachment
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Attachment $attachment
	 */
	public function addAttachment(\KevinDitscheid\KdCalendar\Domain\Model\Attachment $attachment) {
		$this->attachments->attach($attachment);
	}

	/**
	 * Remove an attachment
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Attachment $attachment
	 */
	public function removeAttachment(\KevinDitscheid\KdCalendar\Domain\Model\Attachment $attachment) {
		$this->attachments->detach($attachment);
	}

}
