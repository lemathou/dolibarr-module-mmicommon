<?php
/**
 * Copyright (C) 2023 Mathieu Moulin <mathieu@iprospective.fr>
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
 * Singleton => une seule instalce possible, initialisée à l'appel
 */
trait MMI_Singleton_1_0
{
	// CLASS

	protected static $_instance;

	public static function __init()
	{
		if (empty(static::$_instance))
			static::$_instance = new static();
	}

	/**
	 * @return static
	 */
	public static function _getInstance()
	{
		return static::$_instance;
	}
	/**
	 * @return static
	 */
	public static function _instance()
	{
		return static::$_instance;
	}

	// OBJECT

	protected function __construct()
	{
		// Forced Singleton
	}
}

trait MMI_Singleton
{
	use MMI_Singleton_1_0;
}
