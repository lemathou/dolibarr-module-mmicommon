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

require_once 'mmi_singleton.class.php';

/**
 * Décale l'execution à la mort de l'objet => à la fin du script puisque singleton
 * Reconstruit la connexion à la base de donnéee
 */
abstract class MMI_Delayed_1_1 extends MMI_Singleton_1_0
{
	// CLASS

	protected static $_instance;

	protected static $_db_params;

	public static function __init()
	{
		static::__setdbparams();
		parent::__init();
	}

	public static function __setdbparams()
	{
		static::$_db_params = [
			'user'=> $GLOBALS['dolibarr_main_db_user'],
			'pass'=> $GLOBALS['dolibarr_main_db_pass'],
			'name'=> $GLOBALS['dolibarr_main_db_name'],
			'host'=> $GLOBALS['dolibarr_main_db_host'],
		];
	}

	// OBJECT

	protected $db;

	protected $list = [];

	/**
	 * Trucs qui se passent en fin de script
	 */
	public function __destruct()
	{
		// Check/Recreate enviroment
		$this->dbinit();
		$this->user_autoload();
		$this->hookmanager_verif();
		$this->lang_verif();

		$this->execute();
	}
	public function __construct()
	{
		parent::__construct();
		$this->dbinit();
	}

	public function user_autoload()
	{
		global $user;
		$sql = 'SELECT rowid FROM '.MAIN_DB_PREFIX.'user WHERE login="synchro"';
		$q = $this->db->query($sql);
		list($user_id) = $q->fetch_row();
		if (empty($user) || !is_object($user))
				$user = new User($this->db);
		$user->fetch($user_id);
		$user->getrights();

		return $user;
	}

	public function hookmanager_verif()
	{
		global $hookmanager;
		if (empty($hookmanager))
			$hookmanager = new HookManager($this->db);
	}

	public function lang_verif()
	{
		global $conf, $langs;
		if (empty($langs))
			$langs = new Translate("", $conf);
	}

	public function dbinit()
	{
		$this->db = new DoliDBMysqli('mysql', static::$_db_params['host'], static::$_db_params['user'], static::$_db_params['pass'], static::$_db_params['name']);
		//var_dump($this->db); die();
	}

	public function add($value)
	{
		if (!in_array($value, $this->list))
			$this->list[] = $value;
	}

	public function execute()
	{
		// TO OVERLOAD IF NEEDED
		foreach($this->list as $value) {
			$this->execute_value($value);
		}
	}

	public function execute_value($value)
	{
		// TO OVERLOAD
		
	}
}

// Compatibility (test)
abstract class MMI_Delayed_1_0 extends MMI_Delayed_1_1
{

}
