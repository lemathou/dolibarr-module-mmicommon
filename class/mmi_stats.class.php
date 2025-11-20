<?php

class mmi_stats
{
	public static function Median($Array) {
		return static::Quartile_50($Array);
	}

	public static function Quartile_25($Array) {
		return static::Quartile($Array, 0.25);
	}

	public static function Quartile_50($Array) {
		return static::Quartile($Array, 0.5);
	}

	public static function Quartile_75($Array) {
		return static::Quartile($Array, 0.75);
	}

	public static function Quartile($Array, $Quartile) {
		sort($Array);
		$pos = (count($Array) - 1) * $Quartile;

		$base = floor($pos);
		$rest = $pos - $base;

		if( isset($Array[$base+1]) ) {
			return $Array[$base] + $rest * ($Array[$base+1] - $Array[$base]);
		} else {
			return $Array[$base];
		}
	}

	public static function Average($Array) {
		return array_sum($Array) / count($Array);
	}

	public static function StdDev($Array) {
		if( count($Array) < 2 ) {
			return;
		}

		$avg = static::Average($Array);

		$sum = 0;
		foreach($Array as $value) {
			$sum += pow($value - $avg, 2);
		}

		return sqrt((1 / (count($Array) - 1)) * $sum);
	}
}