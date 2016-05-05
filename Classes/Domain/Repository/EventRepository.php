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
	 * The calendar to use
	 *
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Calendar
	 */
	protected $calendar;
	
	/**
	 * Initialize the event repository
	 *
	 * @param int $limit
	 * @param \DateTime $date
	 *
	 * @return void
	 */
    public function loadEvents($limit = 0, $date = NULL){
		$events = $this->googleCalendarService->fetchEvents($this->calendar->getId(), $limit, $date);
		foreach($events->getItems() as $eventItem){
			$event = $this->findById($eventItem->getId())->getFirst();
			if($event === NULL){
				$event = \KevinDitscheid\KdCalendar\Domain\Model\Event::convert($eventItem);
				$event->setCalendar($this->calendar);
				$this->add($event);
			}else{
				$event = \KevinDitscheid\KdCalendar\Domain\Model\Event::convert($eventItem, $event);
				$event->setCalendar($this->calendar);
				$this->update($event);
			}
		}
		$this->persistEvents();
	}
	
	/**
	 * Checks if the events from the calendar have been loaded
	 *
	 * @return boolean
	 */
	public function eventsLoaded(){
		if($this->registry->get('tx_kdcalendar', 'eventsexpired_' . $this->calendar->getId())){
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * Checks if the events have expired
	 *
	 * @return boolean
	 */
	public function eventsExpired(){
		if($this->registry->get('tx_kdcalendar', 'eventsexpired_' . $this->calendar->getId()) <= time()){
			return TRUE;
		}
		return FALSE;
	}
	
	/**
	 * Save the events to database and add expire date
	 *
	 * @return void
	 */
	protected function persistEvents(){
		$this->persistenceManager->persistAll();
		$this->resetExpireDate();
	}
	
	/**
	 * Reset the expire date
	 *
	 * @return void
	 */
	public function resetExpireDate(){
		$this->registry->set('tx_kdcalendar', 'eventsexpired_' . $this->calendar->getId(), time() + 24 * 60 * 60);
	}
	
	/**
	 * Get the calendar
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Calendar
	 */
	public function getCalendar() {
		return $this->calendar;
	}

	/**
	 * Set the calendar
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Calendar $calendar
	 *
	 * @return void
	 */
	public function setCalendar(\KevinDitscheid\KdCalendar\Domain\Model\Calendar $calendar) {
		$this->calendar = $calendar;
	}

	/**
	 * Finds events by the calendar
	 *
	 * @param int $calendar
	 * @param array $settings
	 *
	 * @return \TYPO3\CMS\Extbase\Persistence\QueryResultInterface
	 */
	public function findByCalendar($calendar, $settings){
		$query = $this->createQuery();
		$querySettings = $query->getQuerySettings();
		$querySettings->setRespectStoragePage(FALSE);
		// set limit if given
		if($settings['maxEvents']){
			$query->setLimit((int)$settings['maxEvents']);
		}
		$query->setOrderings(array(
			'start.date' => \TYPO3\CMS\Extbase\Persistence\QueryInterface::ORDER_ASCENDING
		));
		// set up initial conditions
		$conditions = array(
			$query->logicalAnd(
				$query->equals('calendar', $calendar),
				$query->logicalNot($query->equals('visibility', 'private'))
			)
		);
		
		// add start date
		if($settings['start']){
			$conditions[] = $query->logicalAnd(
				$query->logicalNot($query->equals('start',NULL)),
				$query->greaterThan('start.date', \date_create($settings['start']))
			);
		}
		// add end date
		if($settings['end']){
			$conditions[] = $query->logicalAnd(
				$query->logicalNot($query->equals('end', NULL)),
				$query->lessThan('end.date', \date_create($settings['end']))
			);
		}
		if(count($conditions) > 1){
			$result = $query->matching(
				$query->logicalAnd($conditions)
			);
		}else{
			$result = $query->matching(
				$conditions[0]
			);
		}
		
		return $result->execute();
	}
}