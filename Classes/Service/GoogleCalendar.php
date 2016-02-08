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

require __DIR__ . '../../Resources/Private/Scripts/vendor/autoload.php';

/**
 * Description of GoogleCalendar
 *
 * @author Kevin Ditscheid <kevinditscheid@gmail.com>
 */
class GoogleCalendar {
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
	 * Initialize the google calendar
	 *
	 * @throws \KevinDitscheid\KdCalendar\Exception\NoAuthDataException
	 */
	public function initializeObject(){
		$this->settings = \KevinDitscheid\KdCalendar\Utility\ExtensionUtility::findTypoScriptVars();
		$this->client = new \Google_Client();
		$this->client->setApplicationName($this->settings['applicationName']);
		$this->client->setScopes(\Google_Service_Calendar::CALENDAR_READONLY);
		if($this->settings['auth']['jsonFile']){
			$this->client->setAuthConfigFile($this->settings['auth']['jsonFile']);
		}elseif($this->settings['auth']['jsonString']){
			$this->client->setAuthConfig($this->settings['auth']['jsonString']);
		}else{
			throw new \KevinDitscheid\KdCalendar\Exception\NoAuthDataException("No auth data is provided for Google Calendar!",1454958940);
		}
		$this->client->setAccessType(self::ACCESS_TYPE_OFFLINE);
	}
	
	/**
	 * Change the scope of the calendar, can be one of \Google_Service_Calendar::CALENDAR or \Google_Service_Calendar::CALENDAR_READONLY
	 *
	 * @param string $scope
	 * @throws \KevinDitscheid\KdCalendar\Exception\ScopeNotSupportedException
	 */
	public function changeScope($scope){
		if($scope !== \Google_Service_Calendar::CALENDAR || $scope !== \Google_Service_Calendar::CALENDAR_READONLY){
			throw new \KevinDitscheid\KdCalendar\Exception\ScopeNotSupportedException("The scope \"$scope\" is not supported!",1454959374);
		}
		$this->client->setScopes($scope);
	}
	
	/**
	 * Change the access type of the calendar
	 *
	 * @param string $type
	 * @throws \KevinDitscheid\KdCalendar\Exception\AccessTypeNotSupportedException
	 */
	public function changeAccessType($type){
		if($type !== self::ACCESS_TYPE_ONLINE || $type !== self::ACCESS_TYPE_OFFLINE){
			throw new \KevinDitscheid\KdCalendar\Exception\AccessTypeNotSupportedException("The access type \"$type\" is not supported!",1454959656);
		}
		$this->client->setAccessType($type);
	}
}
