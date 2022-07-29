<?php
	function isAdmin($user_type){
		return($user_type == 1) ? true : false;
	}
	
	function changePassword($session_id, $new_password){
		$session_id = (int)$session_id;
		$new_password = md5($new_password);
		
		$query = "	UPDATE `users` 
					SET `password` = '$new_password'
					WHERE `user_id` = $session_id";
		
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

	function getUserData($user_id){
	
		$data 		= array();
		$user_id 	= (int)$user_id;
		
		$numArgs 	= func_num_args();
		$args 		= func_get_args();
		
		if($numArgs > 1)
		{
			unset($args[0]);
			
			$fields = '`'.implode('`,`', $args).'`';
			
			$data = mysql_fetch_assoc(mysql_query("SELECT $fields 
								FROM `users` 
								WHERE `user_id` = $user_id"));
								
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
		return (isset($_SESSION['user_id'])) ? true : false;
	}
	
	function login($username){
		$_SESSION['user_id'] = userId($username);
	}
	
	function logout(){
		session_destroy();
	}
?>