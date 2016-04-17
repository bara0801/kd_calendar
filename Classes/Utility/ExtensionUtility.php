<?php

namespace KevinDitscheid\KdCalendar\Utility;

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

/**
 * Description of ExtensionUtility
 *
 * @author Kevin Ditscheid <kevinditscheid@gmail.com>
 */
class ExtensionUtility {

	/**
	 * The extension name
	 */
	const EXTENSION_NAME = 'KDCalendar';

	/**
	 * The extension key
	 */
	const EXTENSION_KEY = 'kd_calendar';

	/**
	 * The extension vendor
	 */
	const EXTENSION_VENDOR = 'KevinDitscheid';

	/**
	 * Finds the typoscript settings for the extension
	 *
	 * @return array
	 */
	static public function findTypoScriptVars() {
		$objectManager = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Extbase\Object\ObjectManager::class);
		$configurationManager = $objectManager->get(\TYPO3\CMS\Extbase\Configuration\ConfigurationManager::class);
		return $configurationManager->getConfiguration(\TYPO3\CMS\Extbase\Configuration\ConfigurationManager::CONFIGURATION_TYPE_SETTINGS, self::EXTENSION_NAME);
	}

	/**
	 * Find the extConf variables
	 *
	 * @return array
	 */
	static public function findExtensionConfiguration() {
		$extConf = (array) @unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf'][self::EXTENSION_KEY]);
		return \TYPO3\CMS\Core\Utility\GeneralUtility::removeDotsFromTS($extConf);
	}

	/**
	 * Get the merged extension configuration (TypoScript and extConf)
	 *
	 * @return array
	 */
	static public function getMergedExtensionConfiguration() {
		$ts = self::findTypoScriptVars();
		$extConf = self::findExtensionConfiguration();
		$conf = array();
		if (\is_array($ts) && \is_array($extConf)) {
			$conf = \array_merge($extConf, $ts);
		} elseif (!\is_array($ts) && \is_array($extConf)) {
			$conf = $extConf;
		} elseif (\is_array($ts) && !\is_array($extConf)) {
			$conf = $ts;
		}
		return $conf;
	}

}
