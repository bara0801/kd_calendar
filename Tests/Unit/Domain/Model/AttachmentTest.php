<?php

namespace KevinDitscheid\KdCalendar\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Kevin Ditscheid <kevinditscheid@gmail.com>
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \KevinDitscheid\KdCalendar\Domain\Model\Attachment.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Kevin Ditscheid <kevinditscheid@gmail.com>
 */
class AttachmentTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Attachment
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \KevinDitscheid\KdCalendar\Domain\Model\Attachment();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getFileUrlReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFileUrl()
		);
	}

	/**
	 * @test
	 */
	public function setFileUrlForStringSetsFileUrl()
	{
		$this->subject->setFileUrl('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fileUrl',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getMimeTypeReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getMimeType()
		);
	}

	/**
	 * @test
	 */
	public function setMimeTypeForStringSetsMimeType()
	{
		$this->subject->setMimeType('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'mimeType',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getIconLinkReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getIconLink()
		);
	}

	/**
	 * @test
	 */
	public function setIconLinkForStringSetsIconLink()
	{
		$this->subject->setIconLink('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'iconLink',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getFileIdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getFileId()
		);
	}

	/**
	 * @test
	 */
	public function setFileIdForStringSetsFileId()
	{
		$this->subject->setFileId('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'fileId',
			$this->subject
		);
	}
}
