<?php
namespace KevinDitscheid\KdCalendar\Domain\Model;


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
 * Reminder
 */
class Reminder extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * The method used by this reminder. Possible values are:
     *
     *     "email" - Reminders are sent via email.
     *     "sms" - Reminders are sent via SMS. These are only available for Google Apps
     * for Work, Education, and Government customers. Requests to set SMS reminders for
     * other account types are ignored.
     *     "popup" - Reminders are sent via a UI popup.
     *
     * @var int
     */
    protected $method = 0;
    
    /**
     * Number of minutes before the start of the event when the reminder should
     * trigger. Valid values are between 0 and 40320 (4 weeks in minutes).
     *
     * @var float
     */
    protected $minutes = 0.0;
    
    /**
     * Returns the method
     *
     * @return int $method
     */
    public function getMethod()
    {
        return $this->method;
    }
    
    /**
     * Sets the method
     *
     * @param int $method
     * @return void
     */
    public function setMethod($method)
    {
        $this->method = $method;
    }
    
    /**
     * Returns the minutes
     *
     * @return float $minutes
     */
    public function getMinutes()
    {
        return $this->minutes;
    }
    
    /**
     * Sets the minutes
     *
     * @param float $minutes
     * @return void
     */
    public function setMinutes($minutes)
    {
        $this->minutes = $minutes;
    }

}