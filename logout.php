<?php
	include 'core/init.php';
	protect($user_data);
	
	logout();
	
	header('Location: login.php');
	die();
?>