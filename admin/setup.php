<?php
/* Copyright (C) 2004-2017 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2022-2023 Moulin Mathieu <contact@iprospective.fr>
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
 * \file    mmicommon/admin/setup.php
 * \ingroup mmicommon
 * \brief   mmicommon setup page.
 */

// Load Dolibarr environment
require_once '../env.inc.php';
require_once '../main_load.inc.php';

// Parameters
$arrayofparameters = array(
	'MMICORE_UPDATE_NOTE_TRIGGER_UPDATE'=>array('type'=>'yesno', 'enabled'=>1),
	'MMICORE_UPDATE_NOTE_TRIGGER_UPDATE_LIST'=>array('type'=>'textarea', 'enabled'=>1),
	'MMICORE_SHOW_PICTO_NOTE'=>array('type'=>'yesno', 'enabled'=>1),
	'MMICORE_SHOW_PICTO_NOTE_COLOR'=>array('type'=>'text', 'enabled'=>1),
	'MAIN_USE_XML_TAGS'=>array('type'=>'yesno', 'enabled'=>1),
);

//require_once('../../mmicommon/admin/mmisetup_1.inc.php');
require_once('mmisetup_1.inc.php');
