<?php
/**
 * Created by chris.
 * Date: 19/12/15
 * Time: 15:13
 * Copyright (c) 2015, Datrim Web Design Ltd. All rights reserved.
 */
namespace Datrim\DateRange;

use Carbon\Carbon;

/**
 * Class DateRange
 * @package App\Core\Classes
 *
 * @property-read	Carbon	$start
 * @property-read	Carbon	$end
 *
 */
class DateRange
{
	private $start;
	private $end;

	function __construct(Carbon $start, Carbon $end)
	{
		$this->start = $start;
		$this->end   = $end;
	}

	public static function today()
	{
		return new static(dt::today(), dt::today()->endOfDay()) ;
	}

	public static function lastWeek()
	{
		return new static(dt::today()->previous()->startOfWeek(),
			dt::today()->previous()->endOfWeek());
	}

	public static function thisWeek()
	{
		return new static(dt::today()->startOfWeek(),
			dt::today()->endOfWeek());
	}

	public static function lastMonth()
	{
		return new static(dt::today()->subMonth()->startOfMonth(),
			dt::today()->subMonth()->endOfMonth());
	}

	public static function thisMonth()
	{
		return new static(dt::today()->startOfMonth(),
			dt::now()->endOfMonth());
	}

	public static function year($year = null)
	{
		$year = $year ?: date('Y');
		return new static(dt::today()->year($year)->startOfYear(),
			dt::today()->year($year)->endOfYear());
	}

	public static function thisYear()
	{
		return static::year();
	}

	public function diff()
	{
		return $this->start->diff($this->end);
	}

	public function includes(Carbon $dt = null)
	{
		if (is_null($dt)) {
			$dt =  Carbon::now();
		}

		return ($dt >= $this->start) && ($dt <= $this->end);
	}

	public function __get($property)
	{
		return (property_exists($this, $property))
			? $this->{$property}
			: null;
	}
}
