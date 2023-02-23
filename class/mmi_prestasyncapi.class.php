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

use Luracast\Restler\RestException;
use Luracast\Restler\Defaults;

/**
 * Base pour une API qui synchronise depuis Prestashop
*/
class MMI_PrestasyncApi_1_0 extends DolibarrApi
{
	public static function __init()
	{

	}

	/**
	 * Constructor
	 *
	 * @param	DoliDb	$db		        Database handler
	 * @param   string  $cachedir       Cache dir
	 * @param   boolean $refreshCache   Update cache
	 */
	public function __construct()
	{
		global $db, $conf, $dolibarr_main_url_root;

		if (empty($cachedir)) {
			$cachedir = $conf->api->dir_temp;
		}
		Defaults::$cacheDirectory = $cachedir;

		$this->db = $db;
		$production_mode = (empty($conf->global->API_PRODUCTION_MODE) ? false : true);
		$this->r = new Restler($production_mode, false);

		$urlwithouturlroot = preg_replace('/'.preg_quote(DOL_URL_ROOT, '/').'$/i', '', trim($dolibarr_main_url_root));
		$urlwithroot = $urlwithouturlroot.DOL_URL_ROOT; // This is to use external domain name found into config file

		$urlwithouturlrootautodetect = preg_replace('/'.preg_quote(DOL_URL_ROOT, '/').'$/i', '', trim(DOL_MAIN_URL_ROOT));
		$urlwithrootautodetect = $urlwithouturlroot.DOL_URL_ROOT; // This is to use local domain autodetected by dolibarr from url

		$this->r->setBaseUrls($urlwithouturlroot, $urlwithouturlrootautodetect);
		$this->r->setAPIVersion(1);
	}

	// @todo put in more global... mais je pense que ça sert à rien
	public static function _getsynchrouser()
	{
		global $db, $user;
		
		$sql = 'SELECT rowid FROM '.MAIN_DB_PREFIX.'user WHERE login="synchro"';
		$q = $db->query($sql);
		list($user_id) = $q->fetch_row();
		if (empty($user) || !is_object($user))
			$user = new User($db);
		$user->fetch($user_id);
		$user->getrights();
		//var_dump($user); die();
		return $user;
	}
}
