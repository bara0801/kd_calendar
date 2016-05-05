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
 * An events attachment
 */
class Attachment extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity
{

    /**
     * fileUrl
     *
     * @var string
     */
    protected $fileUrl = '';
    
    /**
     * title
     *
     * @var string
     */
    protected $title = '';
    
    /**
     * mimeType
     *
     * @var string
     */
    protected $mimeType = '';
    
    /**
     * iconLink
     *
     * @var string
     */
    protected $iconLink = '';
    
    /**
     * fileId
     *
     * @var string
     */
    protected $fileId = '';
    
	/**
	 * Fills the data from google calendar object into the model
	 * 
	 * @param \Google_Service_Calendar_EventAttachment $attachmentItem
	 * @param \KevinDitscheid\KdCalendar\Domain\Model\Attachment $attachment
	 *
	 * @return \KevinDitscheid\KdCalendar\Domain\Model\Attachment
	 */
	static public function convert($attachmentItem, $attachment = NULL){
		if($attachment === NULL){
			$attachment = new \KevinDitscheid\KdCalendar\Domain\Model\Attachment();
		}
		$attachment->setFileId($attachmentItem->getFileId());
		$attachment->setFileUrl($attachmentItem->getFileUrl());
		$attachment->setIconLink($attachmentItem->getIconLink());
		$attachment->setMimeType($attachmentItem->getMimeType());
		$attachment->setTitle($attachmentItem->getTitle());
		return $attachment;
	}
	
    /**
     * Returns the fileUrl
     *
     * @return string $fileUrl
     */
    public function getFileUrl()
    {
        return $this->fileUrl;
    }
    
    /**
     * Sets the fileUrl
     *
     * @param string $fileUrl
     * @return void
     */
    public function setFileUrl($fileUrl)
    {
        $this->fileUrl = $fileUrl;
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
     * Returns the mimeType
     *
     * @return string $mimeType
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }
    
    /**
     * Sets the mimeType
     *
     * @param string $mimeType
     * @return void
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
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
     * Returns the fileId
     *
     * @return string $fileId
     */
    public function getFileId()
    {
        return $this->fileId;
    }
    
    /**
     * Sets the fileId
     *
     * @param string $fileId
     * @return void
     */
    public function setFileId($fileId)
    {
        $this->fileId = $fileId;
    }

}