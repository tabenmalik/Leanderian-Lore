<?php
/*This turns off the error reports.
	delete this comment before site launch
	error_reporting(0);*/
	
	session_start();
	
	if(!isset($_SESSION['login'])){
		$_SESSION['login'] 				= 0;
		$_SESSION['username']			= "";
		$_SESSION['user_id']			= "";
		$_SESSION['first_name']			= "";
		$_SESSION['last_name']			= "";
		$_SESSION['email']				= "";
		$_SESSION['active']				= 0;
		$_SESSION['user_type']			= "";
		$_SESSION['date_registered']	= "";
		
	}
	
	require_once $DIR_PATH.'core/database/connect.php';
	require_once $DIR_PATH.'core/functions/general.php';
	require_once $DIR_PATH.'core/functions/users.php';
	require_once $DIR_PATH.'core/functions/library.php';
	
	$errors = array();
?>