<?php
	//this is the logout index page
	
	$DIR_PATH = '../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	
	logout();
	
	header('Location: '.$DIR_PATH.'login/');
	die();
?>
