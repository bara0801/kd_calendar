<?php
namespace KevinDitscheid\KdCalendar\Domain\Repository;

/***************************************************************
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
 ***************************************************************/

/**
 * The repository for Calendars
 */
class CalendarRepository extends \TYPO3\CMS\Extbase\Persistence\Repository
{

	/**
	 * Google calendar service
	 *
	 * @var \KevinDitscheid\KdCalendar\Service\GoogleCalendarService
	 * @inject
	 */
	protected $googleCalendarService = NULL;
	
	/**
	 * The sys_registry
	 *
	 * @var \TYPO3\CMS\Core\Registry
	 * @inject
	 */
	protected $registry;
	
	/**
	 * Initialize the calendar repository
	 */
	public function loadCalendars(){
		$calendars = $this->googleCalendarService->fetchCalendars();
		foreach($calendars->getItems() as $calendarItem){
			$calendar = $this->findById($calendarItem->getId())->getFirst();
			if($calendar === NULL){
				$calendar = \KevinDitscheid\KdCalendar\Domain\Model\Calendar::convert($calendarItem);
				$this->add($calendar);
			}else{
				$calendar = \KevinDitscheid\KdCalendar\Domain\Model\Calendar::convert($calendarItem, $calendar);
				$this->update($calendar);
			}
		}
		$this->persistCalendars();
	}
	
	/**
	 * Save calendars to database and add expire date
	 *
	 * @return void
	 */
	protected function persistCalendars(){
		$this->persistenceManager->persistAll();
		$this->registry->set('tx_kdcalendar', 'calendarexpired', time() + 24 * 60 * 60);
	}
	
	/**
	 * Checks if the calendars have been loaded
	 *
	 * @return boolean
	 */
	public function calendarsLoaded(){
		if($this->registry->get('tx_kdcalendar', 'calendarexpired')){
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * Checks if the calendars have expired
	 *
	 * @return boolean
	 */
	public function calendarsExpired(){
		if($this->registry->get('tx_kdcalendar', 'calendarexpired') <= time()){
			return TRUE;
		}
		return FALSE;
	}
}