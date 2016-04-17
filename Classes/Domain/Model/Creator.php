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
 * A creator
 */
class Creator extends \TYPO3\CMS\Extbase\Domain\Model\FrontendUser
{

    /**
     * The foreign id of the creator
     *
     * @var string
     */
    protected $id = '';
    
    /**
     * The email address of the creator
     *
     * @var string
     */
    protected $email = '';
    
    /**
     * The display name of the creator
     *
     * @var string
     */
    protected $displayName = '';
    
    /**
     * Whether the creator corresponds to the calendar on which this copy of the event
     * appears
     *
     * @var bool
     */
    protected $self = false;
    
	/**
	 * Convert google object to model
	 *
	 * @param \Google_Service_Calendar_EventCreator $creatorItem
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Creator $creator
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Creator
	 */
	static public function convert($creatorItem, $creator = NULL){
		if($creator === NULL){
			$creator = new \KevinDitscheid\KdCalendar\Domain\Model\Creator();
		}
		$creator->setDisplayName($creatorItem->getDisplayName());
		$creator->setEmail($creatorItem->getEmail());
		$creator->setId($creatorItem->getId());
		$creator->setSelf($creatorItem->getSelf());
		return $creator;
	}
	
    /**
     * Returns the id
     *
     * @return string $id
     */
    public function getId()
    {
        return $this->id;
    }
    
    /**
     * Sets the id
     *
     * @param string $id
     * @return void
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    
    /**
     * Returns the email
     *
     * @return string $email
     */
    public function getEmail()
    {
        return $this->email;
    }
    
    /**
     * Sets the email
     *
     * @param string $email
     * @return void
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    
    /**
     * Returns the displayName
     *
     * @return string $displayName
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }
    
    /**
     * Sets the displayName
     *
     * @param string $displayName
     * @return void
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;
    }
    
    /**
     * Returns the self
     *
     * @return bool $self
     */
    public function getSelf()
    {
        return $this->self;
    }
    
    /**
     * Sets the self
     *
     * @param bool $self
     * @return void
     */
    public function setSelf($self)
    {
        $this->self = $self;
    }
    
    /**
     * Returns the boolean state of self
     *
     * @return bool
     */
    public function isSelf()
    {
        return $this->self;
    }

}