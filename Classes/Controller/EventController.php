<?php

namespace KevinDitscheid\KdCalendar\Controller;

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
 * EventController
 */
class EventController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * eventRepository
	 *
	 * @var \KevinDitscheid\KdCalendar\Domain\Repository\EventRepository
	 * @inject
	 */
	protected $eventRepository = NULL;

	/**
     * calendarRepository
     *
     * @var \KevinDitscheid\KdCalendar\Domain\Repository\CalendarRepository
     * @inject
     */
    protected $calendarRepository = NULL;
	
	/**
	 * action list
	 *
	 * @return void
	 */
	public function listAction() {
		$calendar = $this->calendarRepository->findByUid($this->settings['calendar']);
		if($calendar === NULL){
			$calendar = $this->calendarRepository->findByPrimaryCal(TRUE)->getFirst();
		}
		$this->eventRepository->setCalendar($calendar);
		if($this->eventRepository->eventsExpired()){
			$this->eventRepository->loadEvents(0, \date_create('now'));
		}
		$this->settings['calendarSettings']['visibility'] = 'public';
		$events = $this->eventRepository->findByCalendar($calendar, $this->settings['calendarSettings']);
		$this->view->assign('events', $events);
	}

	/**
	 * action show
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Event $event
	 * @return void
	 */
	public function showAction(\KevinDitscheid\KdCalendar\Domain\Model\Event $event) {
		$this->view->assign('event', $event);
	}

}
