<?php

if (!defined('DOL_VERSION'))
	die('Dolibarr must be loaded');
if (empty($modulename))
	die('Dolibarr module name must be specified');

$help_url = '';
$page_name = $modulename."About";

// Access control
if (!$user->admin) {
	accessforbidden();
}

// Libraries
require_once DOL_DOCUMENT_ROOT.'/core/lib/admin.lib.php';
require_once DOL_DOCUMENT_ROOT.'/core/lib/functions2.lib.php';
require_once '../../mmicommon/lib/mmi_1.lib.php';

// Translations
$langs->loadLangs(array("errors", "admin", $modulecontext));

// Parameters
$action = GETPOST('action', 'aZ09');
$backtopage = GETPOST('backtopage', 'alpha');


/*
 * Actions
 */

// None


/*
 * View
 */

$form = new Form($db);


llxHeader('', $langs->trans($page_name), $help_url);

// Subheader
$linkback = '<a href="'.($backtopage ? $backtopage : DOL_URL_ROOT.'/admin/modules.php?restore_lastsearch_values=1').'">'.$langs->trans("BackToModuleList").'</a>';

print load_fiche_titre($langs->trans($page_name), $linkback, 'title_setup');

// Configuration header
$head = mmiAdminPrepareHead();
print dol_get_fiche_head($head, 'about', $langs->trans($page_name), 0, $modulecontext);

dol_include_once('/'.$moduledir.'/core/modules/'.$moduleclassname.'.class.php');
$tmpmodule = new $moduleclassname($db);
print $tmpmodule->getDescLong();

// Page end
print dol_get_fiche_end();
llxFooter();
$db->close();
