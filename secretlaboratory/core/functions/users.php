<?php

	function isAdmin(){
		global $_SESSION;
		$user_type = $_SESSION['user_type'];
		return($user_type == 1) ? true : false;
	}
	
	function changePassword($email, $new_password){
		$new_password = md5($new_password);
		
		$query = "	UPDATE `users` 
					SET `password` = '$new_password'
					WHERE `email` = '$email'";
		
		mysql_query($query);
	}
	
	function registerUser($register_data){
	
		array_walk($register_data, 'mres');
		$register_data['password'] = md5($register_data['password']);
		
		$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
		$data 	= '\'' . implode('\', \'', $register_data) . '\''; 
		
		$query = "INSERT INTO `users` ($fields) VALUES ($data)";
		
		mysql_query($query);
	}

	function getUserData($username){
	
		$data 		= array();

		$numArgs 	= func_num_args();
		$args 		= func_get_args();
		
		if($numArgs > 1)
		{
			unset($args[0]);
			
			$fields = '`'.implode('`,`', $args).'`';
			
			$data = mysql_fetch_assoc(mysql_query("SELECT $fields 
								FROM `users` 
								WHERE `username` = '$username'"));
										
			return $data;
		}
	}

	function userExists($username){
	
		$username = mres($username);
		$query = "	SELECT COUNT(`user_id`) 
					FROM `users` 
					WHERE `username` = '$username'";
		$sql = mysql_query($query);
		
		return (mysql_result($sql, 0) == 1) ? true : false;
	}
	
	function emailExists($email){
	
		$email = mres($email);
		$query = "	SELECT COUNT(`user_id`) 
					FROM `users` 
					WHERE `email` = '$email'";
		$sql = mysql_query($query);
		
		return (mysql_result($sql, 0) == 1) ? true : false;
	}
	
	function userActive($username){
	
		$username = mres($username);
		$query = "SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `active` = 1";
		return (mysql_result(mysql_query($query),0) == 1) ? true : false;
	}
	
	function userId($username){
	
		$username = mysql_real_escape_string($username);
		$query = "SELECT `user_id` FROM `users` WHERE `username` = '$username'";
		
		return mysql_result(mysql_query($query),0,'user_id');
	}
	
	function correctLogin($username,$password){
	
		$user_id = userId($username);
		
		$username = mysql_real_escape_string($username);
		$password = md5($password);
		
		$query = "SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password` = '$password'";
		
		return (mysql_result(mysql_query($query),0) == 1) ? true : false;
	}
	
	function loggedIn(){
		global $_SESSION;
		return $_SESSION['login'] === 1 ? true : false;
	}
	
	function login($username){
		global $_SESSION;
		$user_data = getUserData($username,'user_id','first_name','last_name','email','active','user_type','date_registered');
		
		$_SESSION['login'] 				= 1;
		$_SESSION['username'] 			= $username;
		$_SESSION['user_id'] 			= $user_data['user_id'];
		$_SESSION['first_name'] 		= $user_data['first_name'];
		$_SESSION['last_name'] 			= $user_data['last_name'];
		$_SESSION['email']				= $user_data['email'];
		$_SESSION['active']				= $user_data['active'];
		$_SESSION['user_type']			= $user_data['user_type'];
		$_SESSION['date_registered'] 	= $user_data['date_registered'];
	}
	
	function logout(){
		global $_SESSION;
		
		$_SESSION['login'] = 0;
	}
	
	function activateUser($ac){
		$query = "	UPDATE `users`
					SET `active` = 1
					WHERE `register_code` = '$ac'";
					
		mysql_query($query);
		
		
	}
?>