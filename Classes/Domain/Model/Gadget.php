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
 * Gadget
 */
class Gadget extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * The type
     *
     * @var string
     */
    protected $type = '';
    
    /**
     * The title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * The gadget's display mode. Optional. Possible values are:
     *
     *     "icon" - The gadget displays next to the event's title in the calendar view.
     *     "chip" - The gadget displays when the event is clicked.
     *
     *
     * @var int
     */
    protected $display = 0;
    
    /**
     * The gadget's width in pixels. The width must be an integer greater than 0
     *
     * @var int
     */
    protected $width = 0;
    
    /**
     * The gadget's height in pixels. The height must be an integer greater than 0
     *
     * @var int
     */
    protected $height = 0;
    
    /**
     * The gadget's icon URL. The URL scheme must be HTTPS.
     *
     * @var string
     */
    protected $iconLink = '';
    
    /**
     * The gadget's URL. The URL scheme must be HTTPS.
     *
     * @var string
     */
    protected $link = '';
    
    /**
     * Preferences
     *
     * @var string
     */
    protected $preferences = '';
    
    /**
     * Returns the type
     *
     * @return string $type
     */
    public function getType()
    {
        return $this->type;
    }
    
    /**
     * Sets the type
     *
     * @param string $type
     * @return void
     */
    public function setType($type)
    {
        $this->type = $type;
    }
    
    /**
     * Returns the title
     *
     * @return string $title
     */
    public function getTitle()
    {
        return $this->title;
    }
    
    /**
     * Sets the title
     *
     * @param string $title
     * @return void
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }
    
    /**
     * Returns the display
     *
     * @return int $display
     */
    public function getDisplay()
    {
        return $this->display;
    }
    
    /**
     * Sets the display
     *
     * @param int $display
     * @return void
     */
    public function setDisplay($display)
    {
        $this->display = $display;
    }
    
    /**
     * Returns the width
     *
     * @return int $width
     */
    public function getWidth()
    {
        return $this->width;
    }
    
    /**
     * Sets the width
     *
     * @param int $width
     * @return void
     */
    public function setWidth($width)
    {
        $this->width = $width;
    }
    
    /**
     * Returns the height
     *
     * @return int $height
     */
    public function getHeight()
    {
        return $this->height;
    }
    
    /**
     * Sets the height
     *
     * @param int $height
     * @return void
     */
    public function setHeight($height)
    {
        $this->height = $height;
    }
    
    /**
     * Returns the iconLink
     *
     * @return string $iconLink
     */
    public function getIconLink()
    {
        return $this->iconLink;
    }
    
    /**
     * Sets the iconLink
     *
     * @param string $iconLink
     * @return void
     */
    public function setIconLink($iconLink)
    {
        $this->iconLink = $iconLink;
    }
    
    /**
     * Returns the link
     *
     * @return string $link
     */
    public function getLink()
    {
        return $this->link;
    }
    
    /**
     * Sets the link
     *
     * @param string $link
     * @return void
     */
    public function setLink($link)
    {
        $this->link = $link;
    }
    
    /**
     * Returns the preferences
     *
     * @return string $preferences
     */
    public function getPreferences()
    {
        return $this->preferences;
    }
    
    /**
     * Sets the preferences
     *
     * @param string $preferences
     * @return void
     */
    public function setPreferences($preferences)
    {
        $this->preferences = $preferences;
    }

}