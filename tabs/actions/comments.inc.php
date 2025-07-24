<?php

$id = GETPOST('id', 'int');
$idcomment = GETPOST('idcomment', 'int');

$action = GETPOST('action', 'aZ09');
$confirm = GETPOST('confirm', 'alpha');
$withproject = GETPOST('withproject', 'int');

//var_dump($object);

$object->fetchComments();

// include comment actions
include DOL_DOCUMENT_ROOT.'/core/actions_comments.inc.php';
