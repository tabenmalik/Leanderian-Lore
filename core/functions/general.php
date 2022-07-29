<?php
	
	function adminProtect($user_data)
	{
		if( !isAdmin($user_data['user_type'] ))
		{
			header('Location: index.php');
		}
	}
	
	function protect($user_data)
	{
		if( loggedIn() === false )
		{
			header('Location: login.php');
		}
		
		if(!userActive($user_data['username']))
		{
			session_destroy();
			header('Location: login.php');
			die();
		}
	}
	
	function loggedInProtect()
	{
		if(loggedIn() === true )
		{
			header('Location: index.php');
			die();
		}
	}
	
	function mres($data)
	{
		$data = mysql_real_escape_string($data);
		return $data;
	}
	
	function outputErrors($errors)
	{
		if( isset($errors) && !empty($errors) ) 
		{
			echo '<ul><li>', implode('</li><li>', $errors), '</li></ul>';
		}
	}
?>