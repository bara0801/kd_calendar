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
	 */
	public function authenticateAction($authCode = NULL){
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
	}
}
