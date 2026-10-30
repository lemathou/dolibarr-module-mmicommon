<?php
/* Copyright (C) 2026      Mathieu Moulin / iProspective  <contact@iprospective.fr>
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 3 of the License, or
 * (at your option) any later version.
 *
 * AJAX admin : revele la valeur d'un secret (constante) pour le bouton
 * « Révéler » des pages de configuration MMI. Jamais de valeur dans les logs.
 */

define('NOTOKENRENEWAL', 1);

$modulename = 'mmicommon';

require_once '../main_load.inc.php';

header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate');

if (empty($user->id) || empty($user->admin)) {
	http_response_code(403);
	echo json_encode(['error' => 'Forbidden']);
	exit;
}

$name = GETPOST('name', 'aZ09');
$token = GETPOST('token', 'alpha');

// Uniquement les constantes de type secret des modules MMI / paiement.
if ($name === '' || !preg_match('/^(MMI|PAYMENT)[A-Z0-9_]*$/', $name)
	|| !preg_match('/(PASSWORD|PASS|SECRET|TOKEN|KEY)$/', $name)) {
	http_response_code(400);
	echo json_encode(['error' => 'Invalid constant']);
	exit;
}

if (empty($token) || !hash_equals((string) newToken(), (string) $token)) {
	http_response_code(403);
	echo json_encode(['error' => 'Invalid token']);
	exit;
}

$value = getDolGlobalString($name, '');

dol_syslog('mmicommon: reveal constant '.$name.' by user '.$user->id, LOG_INFO);

echo json_encode(['name' => $name, 'value' => $value]);
