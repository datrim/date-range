<?php
/**
 * Created by chris.
 * Date: 09/03/16
 * Time: 08:15
 * Copyright (c) 2016, Datrim Web Design Ltd. All rights reserved.
 */

use Datrim\DateRange\DateRange;
use Datrim\DateRange\dt;

class TestCase extends PHPUnit_Framework_TestCase
{
	/** @test */
	function it_stores_today_inclusive()
	{
		$start = dt::today();
		$end   = dt::today()->endOfDay();
		$dr    = DateRange::today();

		$this->assertEquals($start, $dr->start);
		$this->assertEquals($end, $dr->end);
		$this->assertEquals($start->diff($end), $dr->diff());
	}

	/** @test */
	function it_stores_last_week_inclusive()
	{
		$start = dt::today()->previous()->startOfWeek();
		$end   = dt::today()->previous()->endOfWeek();
		$dr    = DateRange::lastWeek();

		$this->assertEquals($start, $dr->start);
		$this->assertEquals($end, $dr->end);
		$this->assertEquals($start->diff($end), $dr->diff());
	}

	/** @test */
	function it_stores_this_week_inclusive()
	{
		$start = dt::today()->startOfWeek();
		$end   = dt::today()->endOfWeek();
		$dr    = DateRange::thisWeek();

		$this->assertEquals($start, $dr->start);
		$this->assertEquals($end, $dr->end);
		$this->assertEquals($start->diff($end), $dr->diff());
	}

	/** @test */
	function it_stores_last_month_inclusive()
	{
		$start = dt::today()->subMonth()->startOfMonth();
		$end   = dt::today()->subMonth()->endOfMonth();
		$dr    = DateRange::lastMonth();

		$this->assertEquals($start, $dr->start);
		$this->assertEquals($end, $dr->end);
		$this->assertEquals($start->diff($end), $dr->diff());
	}

	/** @test */
	function it_stores_the_current_month_inclusive()
	{
		$start = dt::today()->startOfMonth();
		$end   = dt::today()->endOfMonth();
		$dr    = DateRange::thisMonth();

		$this->assertEquals($start, $dr->start);
		$this->assertEquals($end, $dr->end);
		$this->assertEquals($start->diff($end), $dr->diff());
	}

	/** @test */
	function it_returns_the_difference_between_two_dates()
	{
		$start = dt::today()->startOfMonth();
		$end   = dt::today()->endOfMonth();
		$dr    = DateRange::thisMonth();

		$this->assertEquals($start->diff($end), $dr->diff());
	}

	/** @test */
	function it_stores_the_default_timezone()
	{
		$default = 'Europe/London';
		$berlin  = 'Europe/Berlin';

		$this->assertEquals($default, dt::defaultTimezone());

		dt::defaultTimezone($berlin);
		$this->assertEquals($berlin, dt::defaultTimezone());
	}

	/** @test */
	function it_creates_an_object_with_the_default_timezone()
	{
		$berlin  = 'Europe/Berlin';
		dt::defaultTimezone($berlin);
		$today = dt::today();

		$this->assertEquals($berlin, $today->timezoneName);
	}
}
