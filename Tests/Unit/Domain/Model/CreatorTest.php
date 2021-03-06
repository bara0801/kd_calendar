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
 * Test case for class \KevinDitscheid\KdCalendar\Domain\Model\Creator.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Kevin Ditscheid <kevinditscheid@gmail.com>
 */
class CreatorTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Creator
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \KevinDitscheid\KdCalendar\Domain\Model\Creator();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getIdReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getId()
		);
	}

	/**
	 * @test
	 */
	public function setIdForStringSetsId()
	{
		$this->subject->setId('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'id',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getEmailReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getEmail()
		);
	}

	/**
	 * @test
	 */
	public function setEmailForStringSetsEmail()
	{
		$this->subject->setEmail('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'email',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getDisplayNameReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getDisplayName()
		);
	}

	/**
	 * @test
	 */
	public function setDisplayNameForStringSetsDisplayName()
	{
		$this->subject->setDisplayName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'displayName',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getSelfReturnsInitialValueForBool()
	{
		$this->assertSame(
			FALSE,
			$this->subject->getSelf()
		);
	}

	/**
	 * @test
	 */
	public function setSelfForBoolSetsSelf()
	{
		$this->subject->setSelf(TRUE);

		$this->assertAttributeEquals(
			TRUE,
			'self',
			$this->subject
		);
	}
}
