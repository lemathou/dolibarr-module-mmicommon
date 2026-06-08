<?php

/* Copyright (C) 2022-2026 Moulin Mathieu <contact@iprospective.fr>
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
 * \file    mmicommon/_master_load.inc.php
 * \ingroup mmicommon
 * \brief   mmicommon default master_load include file.
 */

if (!defined('NOSESSION')) {
	define('NOSESSION', '1');
}

$sapi_type = php_sapi_name();
// Test if batch mode
if (substr($sapi_type, 0, 3) == 'cgi') {
	echo "Error: You are using PHP for CGI. To execute ".$script_file." from command line, you must use PHP for CLI mode.\n";
	exit(-1);
}

// Load Dolibarr environment
$res = 0;
// Try master.inc.php using relative path
if (!$res && file_exists("../master.inc.php")) {
	$res = @include "../master.inc.php";
}
if (!$res && file_exists("../../master.inc.php")) {
	$res = @include "../../master.inc.php";
}
if (!$res && file_exists("../../../master.inc.php")) {
	$res = @include "../../../master.inc.php";
}
if (!$res) {
	die("Include of master fails");
}

// Useful things
require_once dirname(__FILE__).'/_common_load.inc.php';

// Global variables
$error = 0;

/*
 * Main
 */

@set_time_limit(0);
print "***** ".$script_file." (".DOL_VERSION.") pid=".dol_getmypid()." *****\n";
dol_syslog($script_file." launched with arg ".join(',', $argv));
