<?php

/*
 * This file is part of the TYPO3 CMS project.
 * 
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 * 
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 * 
 * The TYPO3 project - inspiring people to share!
 */

namespace KevinDitscheid\KdCalendar\Controller;

/**
 * Description of GoogleServiceController
 *
 * @author Kevin Ditscheid <ditscheid@engine-productions.de>
 */
class GoogleServiceController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController{
	/**
     * calendarRepository
     *
     * @var \KevinDitscheid\KdCalendar\Domain\Repository\CalendarRepository
     * @inject
     */
    protected $calendarRepository = NULL;
	
	/**
     * eventRepository
     *
     * @var \KevinDitscheid\KdCalendar\Domain\Repository\EventRepository
     * @inject
     */
    protected $eventRepository = NULL;
	
	/**
	 * The google calendar service
	 *
	 * @var \KevinDitscheid\KdCalendar\Service\GoogleCalendarService
	 * @inject
	 */
	protected $googleService;
	
	/**
	 * Action to authenticate the google calendar
	 *
	 * @param string $authCode
	 * @param bool $eventsLoaded
	 * @param bool $eventsFlushed
	 */
	public function authenticateAction($authCode = NULL, $eventsLoaded = FALSE, $eventsFlushed = FALSE){
		if($authCode){
			$this->googleService->createCredentials($authCode);
		}
		try{
			$credentials = $this->googleService->getCredentials();
		} catch (\KevinDitscheid\KdCalendar\Exception\NoCredentialsException $ex) {
			$authUrl = $this->googleService->getAuthUrl();
		}
		$this->view->assignMultiple(
			array(
				'authUrl' => $authUrl,
				'credentials' => $credentials
			)
		);
		if($this->calendarRepository->calendarsLoaded()){
			$this->view->assign('calendarsLoaded', TRUE);
			$this->view->assign('calendars', $this->calendarRepository->findAll());
		}
		$this->view->assign('eventsLoaded', $eventsLoaded);
		$this->view->assign('eventsFlushed', $eventsFlushed);
	}
	
	/**
	 * Loads the calendars
	 */
	public function loadCalendarsAction(){
		$this->calendarRepository->loadCalendars();
		$this->forward('authenticate');
	}
	
	/**
	 * Loads the events from the given calendar
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Calendar $calendar
	 */
	public function loadEventsAction(\KevinDitscheid\KdCalendar\Domain\Model\Calendar $calendar){
		$this->eventRepository->setCalendar($calendar);
		$this->eventRepository->loadEvents();
		$this->forward('authenticate', NULL, NULL, array('eventsLoaded' => TRUE));
	}
	
	/**
	 * Flush the events of one calendar
	 *
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Calendar $calendar
	 */
	public function flushEventsAction(\KevinDitscheid\KdCalendar\Domain\Model\Calendar $calendar){
		$this->eventRepository->setCalendar($calendar);
		$events = $this->eventRepository->findByCalendar($calendar);
		foreach($events as $event){
			$this->eventRepository->remove($event);
		}
		$this->forward('authenticate', NULL, NULL, array('eventsFlushed' => TRUE));
	}
}
