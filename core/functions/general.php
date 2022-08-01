<?php
	
	function adminProtect()
	{
		global $DIR_PATH;
		
		if( !isAdmin() )
		{
			header('Location: '.$DIR_PATH);
			die();
		}
	}
	
	function protect()
	{
		global $DIR_PATH;
		global $_SESSION;
		
		if($_SESSION['login'] === 0){
			
			header('Location: '.$DIR_PATH.'login/');
			die();
			
		}else if( $_SESSION['active'] === 0 ){
			
			header('Location: '.$DIR_PATH.'login/');
			die();
		}
		
	}
	
	function loggedInProtect()
	{
		global $DIR_PATH;
		global $_SESSION;
		
		if($_SESSION['login'] === 1)
		{
			header('Location: '.$DIR_PATH);
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
			echo '<ul><li class="errors">', implode('</li><li class="errors">', $errors), '</li></ul>';
		}
	}
?>