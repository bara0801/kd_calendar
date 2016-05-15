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
 * A creator
 */
class Creator extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity{

	/**
	 * The foreign id of the creator
	 *
	 * @var string
	 */
	protected $id = '';

	/**
	 * Whether the creator corresponds to the calendar on which this copy of the event
	 * appears
	 *
	 * @var bool
	 */
	protected $self = false;

	/**
	 * The user
	 *
	 * @var \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
	 */
	protected $feUser = NULL;

	/**
	 * Convert google object to model
	 *
	 * @param \Google_Service_Calendar_EventCreator $creatorItem
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Creator $creator
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Creator
	 */
	static public function convert($creatorItem, $creator = NULL) {
		$feUserRepository = self::getFrontendUserRepositoryInstance();
		$feUser = $feUserRepository->findByEmail($creatorItem->getEmail())->getFirst();
		if ($feUser === NULL) {
			$feUser = new \TYPO3\CMS\Extbase\Domain\Model\FrontendUser();
			$feUser->setUsername($creatorItem->getEmail());
			$feUser->setName($creatorItem->getDisplayName());
			$feUser->setEmail($creatorItem->getEmail());
			$feUserRepository->add($feUser);
			self::persist();
		}
		if ($creator === NULL) {
			$creator = new \KevinDitscheid\KdCalendar\Domain\Model\Creator();
		}
		$creator->setFeUser($feUser);
		$creator->setId($creatorItem->getId());
		$creator->setSelf($creatorItem->getSelf());
		return $creator;
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
