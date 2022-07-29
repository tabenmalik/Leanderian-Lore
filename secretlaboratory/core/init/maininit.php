<?php
/*This turns off the error reports.
	delete this comment before site launch
	error_reporting(0);*/
	
	session_start();
	
	require_once $DIR_PATH.'core/database/connect.php';
	require_once $DIR_PATH.'core/functions/general.php';
	require_once $DIR_PATH.'core/functions/users.php';
	require_once $DIR_PATH.'core/functions/library.php';
	
	$errors = array();
?>