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
 * Class dt
 *
 * Wrapper for some Carbon creation methods.
 * Uses the default timezone for the active account.
 *
 * @package App\Utilities
 */
class dt
{
	private static $defaultTimezone = "Europe/London";

	/**
	 * @param null|string $time
	 * @param null|string $tz
	 *
	 * @return Carbon
	 */
	public static function create($time = null, $tz = null)
	{
		$tz = $tz ?: static::defaultTimezone();
		return new Carbon($time, $tz);
	}

	/**
	 * @param string|null $timezone
	 *
	 * @return null|string
	 */
	public static function defaultTimezone($timezone = null)
	{
		if (is_null($timezone)) {
			return static::$defaultTimezone;
		}

		static::$defaultTimezone = $timezone;
		return null;
	}

	/**
	 * @param null|string $tz
	 *
	 * @return Carbon
	 */
	public static function now($tz = null)
	{
		$tz = $tz ?: static::defaultTimezone();
		return Carbon::now($tz);
	}

	/**
	 * @param null|string $time
	 * @param null|string $tz
	 *
	 * @return Carbon
	 */
	public static function parse($time = null, $tz = null)
	{
		$tz = $tz ?: static::defaultTimezone();
		return new Carbon($time, $tz);
	}

	/**
	 * @param null|string $tz
	 *
	 * @return Carbon
	 */
	public static function today($tz = null)
	{
		$tz = $tz ?: static::defaultTimezone();
		return Carbon::today($tz);
	}

	/**
	 * @param string|null $tz
	 *
	 * @return static
	 */
	public static function tomorrow($tz = null)
	{
		$tz = $tz ?: static::defaultTimezone();
		return Carbon::tomorrow($tz);
	}

	/**
	 * @param null|string $tz
	 *
	 * @return static
	 */
	public static function yesterday($tz = null)
	{
		$tz = $tz ?: static::defaultTimezone();
		return Carbon::yesterday($tz);
	}
}
