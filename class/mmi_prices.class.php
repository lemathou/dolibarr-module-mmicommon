<?php

class mmi_prices
{
	public static function number_format($number, $round=2)
	{
		return number_format(round($number, $round), $round, ',', ' ');
	}

	public static function price_format($price, $round=2)
	{
		return static::number_format($price, $round).' €';
	}

	public static function percent_format($percent, $round=2)
	{
		return static::number_format($percent, $round).' %';
	}
}