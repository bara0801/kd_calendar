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
 * Attendees
 */
class Attendees extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * The id of the attendee
	 *
	 * @var string
	 */
	protected $id = '';

	/**
	 * The display name
	 *
	 * @var string
	 */
	protected $displayName = '';

	/**
	 * The email of the eattendee
	 *
	 * @var string
	 */
	protected $email = '';

	/**
	 * Whether the attendee is an organizer
	 *
	 * @var bool
	 */
	protected $organizer = false;

	/**
	 * Whether the attendee corresponds to the calendar on which this copy of the event
	 * appears
	 *
	 * @var bool
	 */
	protected $self = false;

	/**
	 * Whether the attendee is a resource
	 *
	 * @var bool
	 */
	protected $resource = false;

	/**
	 * The attendee's response status
	 *
	 * @var string
	 */
	protected $responseStatus = '';

	/**
	 * Whether this is an optional attendee
	 *
	 * @var bool
	 */
	protected $optional = false;

	/**
	 * Number of additional guests
	 *
	 * @var int
	 */
	protected $additionalGuests = 0;

	/**
	 * The attendee's response comment
	 *
	 * @var string
	 */
	protected $comment = '';

	/**
	 * The user
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
	 */
	protected $feUser = NULL;

	/**
	 * Fill data from google object into model
	 *
	 * @param \Google_Service_Calendar_EventAttendee $attendeeItem
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Attendees $attendee
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Attendees
	 */
	static public function convert($attendeeItem, $attendee = NULL) {
		$feUserRepository = self::getFrontendUserRepositoryInstance();
		$feUser = $feUserRepository->findByEmail($attendeeItem->getEmail())->getFirst();
		if ($feUser === NULL) {
			$feUser = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUser();
			$feUser->setUsername($attendeeItem->getEmail());
			$feUser->setName($attendeeItem->getDisplayName());
			$feUser->setEmail($attendeeItem->getEmail());
			$feUserRepository->add($feUser);
			self::persist();
		}
		if ($attendee === NULL) {
			$attendee = new \KevinDitscheid\KdCalendar\Domain\Model\Attendees();
		}

		$attendee->setAdditionalGuests($attendeeItem->getAdditionalGuests());
		$attendee->setComment($attendeeItem->getComment());
		$attendee->setId($attendeeItem->getId());
		$attendee->setOptional($attendeeItem->getOptional());
		$attendee->setOrganizer($attendeeItem->getOrganizer());
		$attendee->setResource($attendeeItem->getResource());
		$attendee->setResponseStatus($attendeeItem->getResponseStatus());
		$attendee->setSelf($attendeeItem->getSelf());
		return $attendee;
	}

	/**
	 * Persist all database changes
	 */
	static protected function persist() {
		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
		$persistanceManager = $objectManager->get(\TYPO3\CMS\Extbase\Persistence\Generic\PersistenceManager::class);
		$persistanceManager->persistAll();
	}

	/**
	 * Get the frontendUserRepository
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
	 */
	static protected function getFrontendUserRepositoryInstance() {
		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
		return $objectManager->get(\TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository::class);
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
	 * Returns the organizer
	 *
	 * @return bool $organizer
	 */
	public function getOrganizer() {
		return $this->organizer;
	}

	/**
	 * Sets the organizer
	 *
	 * @param bool $organizer
	 * @return void
	 */
	public function setOrganizer($organizer) {
		$this->organizer = $organizer;
	}

	/**
	 * Returns the boolean state of organizer
	 *
	 * @return bool
	 */
	public function isOrganizer() {
		return $this->organizer;
	}

	/**
	 * Returns the self
	 *
	 * @return bool $self
	 */
	public function getSelf() {
		return $this->self;
	}

	/**
	 * Sets the self
	 *
	 * @param bool $self
	 * @return void
	 */
	public function setSelf($self) {
		$this->self = $self;
	}

	/**
	 * Returns the boolean state of self
	 *
	 * @return bool
	 */
	public function isSelf() {
		return $this->self;
	}

	/**
	 * Returns the resource
	 *
	 * @return bool $resource
	 */
	public function getResource() {
		return $this->resource;
	}

	/**
	 * Sets the resource
	 *
	 * @param bool $resource
	 * @return void
	 */
	public function setResource($resource) {
		$this->resource = $resource;
	}

	/**
	 * Returns the boolean state of resource
	 *
	 * @return bool
	 */
	public function isResource() {
		return $this->resource;
	}

	/**
	 * Returns the responseStatus
	 *
	 * @return string $responseStatus
	 */
	public function getResponseStatus() {
		return $this->responseStatus;
	}

	/**
	 * Sets the responseStatus
	 *
	 * @param string $responseStatus
	 * @return void
	 */
	public function setResponseStatus($responseStatus) {
		$this->responseStatus = $responseStatus;
	}

	/**
	 * Returns the optional
	 *
	 * @return bool $optional
	 */
	public function getOptional() {
		return $this->optional;
	}

	/**
	 * Sets the optional
	 *
	 * @param bool $optional
	 * @return void
	 */
	public function setOptional($optional) {
		$this->optional = $optional;
	}

	/**
	 * Returns the boolean state of optional
	 *
	 * @return bool
	 */
	public function isOptional() {
		return $this->optional;
	}

	/**
	 * Returns the additionalGuests
	 *
	 * @return int $additionalGuests
	 */
	public function getAdditionalGuests() {
		return $this->additionalGuests;
	}

	/**
	 * Sets the additionalGuests
	 *
	 * @param int $additionalGuests
	 * @return void
	 */
	public function setAdditionalGuests($additionalGuests) {
		$this->additionalGuests = $additionalGuests;
	}

	/**
	 * Returns the comment
	 *
	 * @return string $comment
	 */
	public function getComment() {
		return $this->comment;
	}

	/**
	 * Sets the comment
	 *
	 * @param string $comment
	 * @return void
	 */
	public function setComment($comment) {
		$this->comment = $comment;
	}

	/**
	 * Get the feUser
	 *
	 * @return \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
	 */
	public function getFeUser() {
		return $this->feUser;
	}

	/**
	 * Set the feUser
	 *
	 * @param \TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feUser
	 */
	public function setFeUser(\TYPO3\CMS\Extbase\Domain\Model\FrontendUser $feUser) {
		$this->feUser = $feUser;
	}

}
