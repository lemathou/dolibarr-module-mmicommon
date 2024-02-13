<?php
/* Copyright (C) 2022 Mathieu Moulin iProspective <contact@iprospective.fr>
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

require_once DOL_DOCUMENT_ROOT.'/core/triggers/dolibarrtriggers.class.php';

/**
 *  Class of triggers for custom module
 */
abstract class MMITriggers extends DolibarrTriggers
{
	const MOD_NAME = '';
	const DESC = '';

	const FAMILY = 'demo';
	const VERSION = 'development';

	/**
	 * Constructor
	 *
	 * @param DoliDB $db Database handler
	 */
	public function __construct($db)
	{
		$this->db = $db;

		$this->name = preg_replace('/^Interface/i', '', get_class($this));
		$this->family = static::FAMILY;
		$this->description = static::DESC;
		// 'development', 'experimental', 'dolibarr' or version
		$this->version = static::VERSION;
		$this->picto = static::MOD_NAME.'@'.static::MOD_NAME;
	}

	/**
	 * Trigger name
	 *
	 * @return string Name of trigger file
	 */
	public function getName()
	{
		return $this->name;
	}

	/**
	 * Trigger description
	 *
	 * @return string Description of trigger file
	 */
	public function getDesc()
	{
		return $this->description;
	}

	/**
	 * Returns true if Trigger is enabled
	 * By default, if module is enabled
	 * 
	 * @return bool
	 */
	public function enabled()
	{
		global $conf;

		return ! empty($conf->{static::MOD_NAME}) && ! empty($conf->{static::MOD_NAME}->enabled);
	}
}