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
 * Test case for class \KevinDitscheid\KdCalendar\Domain\Model\Reminder.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Kevin Ditscheid <kevinditscheid@gmail.com>
 */
class ReminderTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \KevinDitscheid\KdCalendar\Domain\Model\Reminder
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \KevinDitscheid\KdCalendar\Domain\Model\Reminder();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getMethodReturnsInitialValueForInt()
	{	}

	/**
	 * @test
	 */
	public function setMethodForIntSetsMethod()
	{	}

	/**
	 * @test
	 */
	public function getMinutesReturnsInitialValueForFloat()
	{
		$this->assertSame(
			0.0,
			$this->subject->getMinutes()
		);
	}

	/**
	 * @test
	 */
	public function setMinutesForFloatSetsMinutes()
	{
		$this->subject->setMinutes(3.14159265);

		$this->assertAttributeEquals(
			3.14159265,
			'minutes',
			$this->subject,
			'',
			0.000000001
		);
	}
}
