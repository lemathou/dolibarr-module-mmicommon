<?php

// Protection to avoid direct call of file
if (empty($conf) || !is_object($conf)) {
	print "Error, file can't be called as URL";
	exit;
}

$id = GETPOST('id', 'int');
$idcomment = GETPOST('idcomment', 'int');

$action = GETPOST('action', 'aZ09');
$confirm = GETPOST('confirm', 'alpha');
$withproject = GETPOST('withproject', 'int');

//var_dump($object);

$object->fetchComments();

// include comment actions
include DOL_DOCUMENT_ROOT.'/core/actions_comments.inc.php';
