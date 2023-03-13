<?php
/**
 * Copyright (C) 2021-2022 Mathieu Moulin <mathieu@iprospective.fr>
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

/**
 * @version 1.0
 */
abstract class MMI_Generic_1_0
{
	// CLASS

	const MOD_NAME = '';

	public static function __init()
	{
		static::_loadLangs();
	}

	protected static function _loadlangs($lang=NULL)
	{
		if (empty($lang) && static::MOD_NAME)
			$lang = [static::MOD_NAME.'@'.static::MOD_NAME];
		if (empty($lang))
			return;
		
		global $langs;
		$langs->loadLangs(is_array($lang) ?$lang :array($lang));
	}

	public static function _class_load($name)
	{
		dol_include_once('custom/'.static::MOD_NAME.'/class/'.$name.'.class.php');
	}

	// OBJECT

	/**
	 * @var DoliDB Database handler.
	 */
	public $db;

	/**
	 * Constructor
	 *
	 *  @param		DoliDB		$db      Database handler
	 */
	public function __construct($db)
	{
		$this->db = $db;
	}
}

abstract class MMI_Generic extends MMI_Generic_1_0
{

}
