<?php
	session_start();
	/*This turns off the error reports.
	delete this comment before site launch
	error_reporting(0);*/
	
	require 'core/database/connect.php';
	require 'core/functions/general.php';
	require 'core/functions/library.php';
	require 'core/functions/users.php';
	

	$session_id = $_SESSION['user_id'];
	$user_data = getUserData($session_id, 'user_id','username','password','first_name', 'last_name', 'email', 'user_type');
	
	$errors = array();
?>