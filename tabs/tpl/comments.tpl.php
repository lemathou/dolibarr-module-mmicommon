<?php

// Protection to avoid direct call of file
if (empty($conf) || !is_object($conf)) {
	print "Error, file can't be called as URL";
	exit;
}

if ($action== 'addcomment') {
	echo 'ADD COMMENT';
}
elseif ($action == 'addcomment') {
	echo 'EDIT COMMENT';
}
elseif ($action == 'deletecomment') {
	echo 'DELETE COMMENT';
}

// Include comment tpl view
include DOL_DOCUMENT_ROOT.'/core/tpl/bloc_comment.tpl.php';