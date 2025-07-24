<?php
/* Copyright (C) 2001-2005 Rodolphe Quiedeville <rodolphe@quiedeville.org>
 * Copyright (C) 2004-2011 Laurent Destailleur  <eldy@users.sourceforge.net>
 * Copyright (C) 2005-2012 Regis Houssin        <regis.houssin@inodbox.com>
 * Copyright (C) 2010      Juanjo Menent        <jmenent@2byte.es>
 * Copyright (C) 2013      Florian Henry	  	<florian.henry@open-concept.pro>
 * Copyright (C) 2015      Marcos García        <marcosgdf@gmail.com>
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
 *   \file       propaltab_1.php
 *   \brief      Generic tab for propal
 *   \ingroup    propal
 */

if (!defined('DOL_VERSION'))
	die('Dolibarr must be loaded');
if (empty($modulename))
	die('Dolibarr module name must be specified');
if (empty($tab_name))
	die('Dolibarr tab name must be specified');
if (empty($tab_ref))
$tab_ref = $tab_name;

require_once DOL_DOCUMENT_ROOT.'/core/lib/propal.lib.php';
require_once DOL_DOCUMENT_ROOT.'/comm/propal/class/propal.class.php';

// Load translation files required by the page
$langs->load("companies");

$id = GETPOST('id', 'int');
$ref = GETPOST('ref', 'alpha');
$action = GETPOST('action', 'aZ09');

// Security check
$fieldvalue = (!empty($id) ? $id : (!empty($ref) ? $ref : ''));
$fieldtype = (!empty($ref) ? 'ref' : 'rowid');
if ($user->socid) {
	$socid = $user->socid;
}

$object = new Propal($db);
if ($id > 0 || !empty($ref)) {
	$object->fetch($id, $ref);
}

$permissionnote = $user->rights->produit->creer; // Used by the include of actions_setnotes.inc.php

if ($object->id > 0) {
	restrictedArea($user, 'propal', $object->id, 'propal&propal', '', '');
} else {
	restrictedArea($user, 'produit|service', $fieldvalue, 'propal&propal', '', '', $fieldtype);
}


/*
 * Paramètres & Actions
 * @todo : Move to a subfolder of tpl, maybe rename tpl in tab ..?
 */

 if (file_exists('tabs/actions/'.$tab_name.'.inc.php'))
	require_once 'tabs/actions/'.$tab_name.'.inc.php';


/*
 *	View
 */

$form = new Form($db);

$help_url = '';
if (GETPOST("type") == '0' || ($object->type == Product::TYPE_PRODUCT)) {
	$help_url = 'EN:Module_Products|FR:Module_Produits|ES:M&oacute;dulo_Productos';
}
if (GETPOST("type") == '1' || ($object->type == Product::TYPE_SERVICE)) {
	$help_url = 'EN:Module_Services_En|FR:Module_Services|ES:M&oacute;dulo_Servicios';
}

$title = $langs->trans('ProductServiceCard');
$shortlabel = dol_trunc($object->label, 16);
if (GETPOST("type") == '0' || ($object->type == Product::TYPE_PRODUCT)) {
	$title = $langs->trans('Product')." ".$shortlabel." - ".$langs->trans('Notes');
	$help_url = 'EN:Module_Products|FR:Module_Produits|ES:M&oacute;dulo_Productos';
}
if (GETPOST("type") == '1' || ($object->type == Product::TYPE_SERVICE)) {
	$title = $langs->trans('Service')." ".$shortlabel." - ".$langs->trans('Notes');
	$help_url = 'EN:Module_Services_En|FR:Module_Services|ES:M&oacute;dulo_Servicios';
}

llxHeader('', $title, $help_url);

if ($id > 0 || !empty($ref)) {
	/*
	 * Affichage onglets
	 */
	if (!empty($conf->notification->enabled)) {
		$langs->load("mails");
	}

	$head = propal_prepare_head($object);
	$titre = $langs->trans("CardPropal");
	$picto = 'propal';

	print dol_get_fiche_head($head, $tab_ref, $titre, -1, $picto);

	$linkback = '<a href="'.DOL_URL_ROOT.'/comm/propal/list.php?restore_lastsearch_values=1">'.$langs->trans("BackToList").'</a>';

	$shownav = 1;
	if ($user->socid && !in_array('propal', explode(',', $conf->global->MAIN_MODULES_FOR_EXTERNAL))) {
		$shownav = 0;
	}

	dol_banner_tab($object, 'ref', $linkback, $shownav, 'ref');

	$cssclass = 'titlefield';
	//if ($action == 'editnote_public') $cssclass='titlefieldcreate';
	//if ($action == 'editnote_private') $cssclass='titlefieldcreate';

	//print '<div class="fichecenter">';

	print '<div class="underbanner clearboth"></div>';

	require_once 'tabs/tpl/'.$tab_name.'.tpl.php';

	print dol_get_fiche_end();
}

// End of page
llxFooter();
$db->close();
