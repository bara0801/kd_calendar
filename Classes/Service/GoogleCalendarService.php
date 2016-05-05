<?php

namespace KevinDitscheid\KdCalendar\Service;

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

require __DIR__ . '/../../Resources/Private/Scripts/vendor/autoload.php';

/**
 * Description of GoogleCalendar
 *
 * @author Kevin Ditscheid <kevinditscheid@gmail.com>
 */
class GoogleCalendarService {

	/**
	 * Google calendar access type offline
	 */
	const ACCESS_TYPE_OFFLINE = 'offline';

	/**
	 * Google calendar access type online
	 */
	const ACCESS_TYPE_ONLINE = 'online';

	/**
	 *
	 * @var Google_Client
	 */
	protected $client;
	
	/**
	 *
	 * @var Google_Service_Calendar
	 */
	protected $service;

	/**
	 * The object manager
	 *
	 * @var \TYPO3\CMS\Extbase\Object\ObjectManager
	 * @inject
	 */
	protected $objectManager;

	/**
	 * Configuration manager
	 *
	 * @var \TYPO3\CMS\Extbase\Configuration\ConfigurationManager
	 * @inject 
	 */
	protected $configurationManager;

	/**
	 * The typoscript settings for extension kd_calendar
	 *
	 * @var array 
	 */
	protected $settings;

	/**
	 * The sys_registry
	 *
	 * @var \TYPO3\CMS\Core\Registry
	 * @inject
	 */
	protected $registry;

	/**
	 * Initialize the google calendar
	 *
	 * @throws \KevinDitscheid\KdCalendar\Exception\NoAuthDataException
	 */
	public function initializeObject() {
		$this->settings = \KevinDitscheid\KdCalendar\Utility\ExtensionUtility::getMergedExtensionConfiguration();
		$this->client = new \Google_Client();
		$this->client->setApplicationName($this->settings['applicationName']);
		$this->client->setScopes(\Google_Service_Calendar::CALENDAR_READONLY);
		if ($this->settings['auth']['jsonFile']) {
			$this->client->setAuthConfigFile($this->settings['auth']['jsonFile']);
		} elseif ($this->settings['auth']['jsonString']) {
			$this->client->setAuthConfig($this->settings['auth']['jsonString']);
		} else {
			throw new \KevinDitscheid\KdCalendar\Exception\NoAuthDataException("No auth data is provided for Google Calendar!", 1454958940);
		}
		$this->client->setAccessType(self::ACCESS_TYPE_OFFLINE);
	}

	/**
	 * Change the scope of the calendar, can be one of \Google_Service_Calendar::CALENDAR or \Google_Service_Calendar::CALENDAR_READONLY
	 *
	 * @param string $scope
	 * @throws \KevinDitscheid\KdCalendar\Exception\ScopeNotSupportedException
	 */
	public function changeScope($scope) {
		if ($scope !== \Google_Service_Calendar::CALENDAR || $scope !== \Google_Service_Calendar::CALENDAR_READONLY) {
			throw new \KevinDitscheid\KdCalendar\Exception\ScopeNotSupportedException("The scope \"$scope\" is not supported!", 1454959374);
		}
		$this->client->setScopes($scope);
	}

	/**
	 * Change the access type of the calendar
	 *
	 * @param string $type
	 * @throws \KevinDitscheid\KdCalendar\Exception\AccessTypeNotSupportedException
	 */
	public function changeAccessType($type) {
		if ($type !== self::ACCESS_TYPE_ONLINE || $type !== self::ACCESS_TYPE_OFFLINE) {
			throw new \KevinDitscheid\KdCalendar\Exception\AccessTypeNotSupportedException("The access type \"$type\" is not supported!", 1454959656);
		}
		$this->client->setAccessType($type);
	}

	/**
	 * Get the access token to the calendar
	 *
	 * @return string
	 *
	 * @throws \KevinDitscheid\KdCalendar\Exception\NoCredentialsException
	 */
	public function getCredentials() {
		$accessToken = $this->registry->get('tx_kdcalendar', 'accessToken');
		if (!$accessToken) {
			throw new \KevinDitscheid\KdCalendar\Exception\NoCredentialsException('No crendetials found!',1460891865);
		}
		$this->client->setAccessToken($accessToken);
		if($this->client->isAccessTokenExpired()){
			$this->refreshToken();
		}
		return $this->client->getAccessToken();
	}
	
	/**
	 * Set the access token to the registry
	 *
	 * @param string $accessToken
	 */
	public function setCredentials($accessToken){
		$this->registry->set('tx_kdcalendar', 'accessToken', $accessToken);
	}

	/**
	 * Get the url to generate an access token
	 *
	 * @return string
	 */
	public function getAuthUrl(){
		return $this->client->createAuthUrl();
	}
	
	/**
	 * Creates the access token with the authentication code, given by the authentication url
	 *
	 * @param string $authCode
	 */
	public function createCredentials($authCode){
		$accessToken = $this->client->authenticate($authCode);
		$this->setCredentials($accessToken);
	}
	
	/**
	 * Refreshes the access token
	 *
	 * @return void
	 */
	public function refreshToken() {
		$this->client->refreshToken($this->client->getRefreshToken());
		$this->setCredentials($this->client->getAccessToken());
	}
	
	/**
	 * Initializes the google calendar service
	 */
	protected function initCalendarService(){
		if(!($this->service instanceof \Google_Service_Calendar)){
			$this->getCredentials();
			$this->service = new \Google_Service_Calendar($this->client);
		}
	}
	
	/**
	 * Fetches all calendars from google service
	 *
	 * @return \Google_Service_Calendar_CalendarList
	 */
	public function fetchCalendars(){
		$this->initCalendarService();
		$calendars = $this->getCalendarsResource();
		return $calendars->listCalendarList();
	}
	
	/**
	 * Fetch all events from the calendar
	 *
	 * @param string $calendarId
	 *
	 * @return \Google_Service_Calendar_Events
	 */
	public function fetchEvents($calendarId, $limit = 0, $date = NULL){
		$this->initCalendarService();
		$events = $this->getEventsResource();
		$optParams = array();
		if($limit > 0){
			$optParams['maxResults'] = $limit;
		}
		if($date !== NULL){
			$optParams['timeMin'] = $date->format('c');
		}
		return $events->listEvents($calendarId, $optParams);
	}
	
	/**
	 * Get the calendarList from the service
	 *
	 * @return \Google_Service_Calendar_CalendarList_Resource
	 */
	protected function getCalendarsResource(){
		return $this->service->calendarList;
	}
	
	/**
	 * Get the events resource from the service
	 *
	 * @return \Google_Service_Calendar_Events_Resource
	 */
	protected function getEventsResource(){
		return $this->service->events;
	}
}
