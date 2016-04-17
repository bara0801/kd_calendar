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
 * The repository for Events
 */
class EventRepository extends \TYPO3\CMS\Extbase\Persistence\Repository {
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
	 * The calendar repository
	 *
	 * @var \KevinDitscheid\KdCalendar\Domain\Repository\CalendarRepository
	 * @inject
	 */
	protected $calendarRepository;
	
	/**
	 * Initialize the event repository
	 */
    public function initializeObject(){
		if($this->registry->get('tx_kdcalendar', 'eventsexpired') <= time()){
			foreach($this->calendarRepository->findAll() as $calendar){
				$events = $this->googleCalendarService->fetchEvents($calendar->getId());
				foreach($events->getItems() as $eventItem){
					$event = $this->findById($eventItem->getId())->getFirst();
					if($event === NULL){
						$event = \KevinDitscheid\KdCalendar\Domain\Model\Event::convert($eventItem);
						$this->add($event);
					}else{
						$event = \KevinDitscheid\KdCalendar\Domain\Model\Event::convert($eventItem, $event);
						$this->update($event);
					}
				}
			}
			$this->persistenceManager->persistAll();
			$this->registry->set('tx_kdcalendar', 'eventsexpired', time() + 24 * 60 * 60);
		}
	}
}