<?php

class mmi_date
{

protected static $holidays = array();

public static function __init()
{

}

public static function holidays($year = NULL)
{
	if ($year === NULL) {
		$year = date('Y');
	}

	if (isset(self::$holidays[$year])) {
		return self::$holidays[$year];
	}

	$easterDate = easter_date($year);
	$easterDay = date('j', $easterDate);
	$easterMonth = date('n', $easterDate);
	$easterYear = date('Y', $easterDate);

	$holidays = array(
		// Jours feries fixes
		$year.'-01-01',// 1er janvier
		$year.'-05-01',// Fete du travail
		$year.'-05-08',// Victoire des allies
		$year.'-07-14',// Fete nationale
		$year.'-08-15',// Assomption
		$year.'-11-01',// Toussaint
		$year.'-11-11',// Armistice
		$year.'-12-25',// Noel

		// Jour feries qui dependent de paques
		date('Y-m-d', mktime(0, 0, 0, $easterMonth, $easterDay + 1, $easterYear)),// Lundi de paques
		date('Y-m-d', mktime(0, 0, 0, $easterMonth, $easterDay + 39, $easterYear)),// Ascension
		date('Y-m-d', mktime(0, 0, 0, $easterMonth, $easterDay + 50, $easterYear)), // Pentecote
	);

	sort($holidays);
	self::$holidays[$year] = $holidays;

	return $holidays;
}

public static function decaler_jours_ouvres($date, $jours)
{
	$timestamp = strtotime($date);
	$annee = date('Y', $timestamp);
	$direction = ($jours >= 0) ? 1 : -1;
	$jours = abs($jours);
	$holidays = static::holidays($annee);

	while ($jours > 0) {
		$timestamp += $direction * 86400; // Ajouter ou soustraire un jour (86400 secondes)
		$dayOfWeek = date('N', $timestamp); // 1 (lundi) à 7 (dimanche)
		$year = date('Y', $timestamp);
		if ($year != date('Y', strtotime($date))) {
			// Si on change d'année, recalculer les jours fériés
			$holidays = static::holidays($year);
		}
		$dateStr = date('Y-m-d', $timestamp);

		// Vérifier si c'est un jour ouvré (lundi à vendredi) et pas un jour férié
		if ($dayOfWeek < 6 && !in_array($dateStr, $holidays)) {
			$jours--;
		}
	}

	return date('Y-m-d', $timestamp);
}

}

// If needed to initialize static properties
//mmi_date::__init();
