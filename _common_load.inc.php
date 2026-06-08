<?php

// Useful things
if (!isset($moduleclassname))
	$moduleclassname = 'mod'.$modulename;
if (!isset($moduledir))
	$moduledir = strtolower($modulename);
if (!isset($modulecontext))
	$modulecontext = $moduledir."@".$moduledir;
if (!isset($modulelogo))
	$modulelogo = $moduledir.".png@".$moduledir;
if (!isset($moduleprefix))
	$moduleprefix = strtoupper($modulename);

// Loading
$langs->load("main");
$langs->load($modulecontext);
