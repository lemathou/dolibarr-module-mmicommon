<?php
/* Copyright (C) 2025      Mathieu Moulin		<mathieu@iprospective.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <https://www.gnu.org/licenses/>.
 */

/**
 *	\file       mmiommon/tpl/module.tpl.php
 *	\ingroup    mmicommon
 *	\brief      Common module template for MMI modules
 */

if (!defined('DOL_VERSION'))
	die('Dolibarr must be loaded');

require_once DOL_DOCUMENT_ROOT.'/core/class/html.formfile.class.php';

$action = GETPOST('action', 'aZ09');


/*
 * Actions
 */

// None


/*
 * View
 */

$form = new Form($db);
$formfile = new FormFile($db);

llxHeader("", $langs->trans($modulename."Area"));

print load_fiche_titre($langs->trans($modulename."Area"), '', $modulelogo);

print '<div class="fichecenter">';

require_once 'tpl/'.$tpl_name.'.tpl.php';

print '</div>';

// End of page
llxFooter();
$db->close();
