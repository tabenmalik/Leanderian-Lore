<?php
	include_once 'core/init.php';
	loggedInProtect();
	
	if(isset($_POST['username'],$_POST['password'])){
		$username 	= trim($_POST['username']);
		$password 	= trim($_POST['password']);
		
		if(empty($username)){
			$errors[] = "Looks like your username must have run off";
			$errors[] = "Please enter a username";
		}else if($username == 'Taben'){
			$errors[] = "Wrong move. Taben is now watching you";
		}else if(!userExists($username)){
			$errors[] = "We don't know anyone by that username. I suggest you get out of here. The locals don't play nice with foriegners";
		}else if(!userActive($username)){
			$errors[] = "Kameron hasn't activated your account. You must be quick, or he is being lazy";
		}
		
		if(empty($password)){
			$errors[] = "That password is so good, I can't even read it";
			$errors[] = "Please enter a password";
		}else if(strlen($password) > 24){
			$errors[] = "Your password is too long";
		}
		
		if(empty($errors)){
			if(!correctLogin($username,$password)){
				$errors[] = "Are you that bad at typing?";
				$errors[] = "Try again";
			}else{
				login($username);
				header('Location: account.php');
				die();
			}
		}
	}
?>

<?php 
	include_once 'core/section/overall/head.php'; 
?>

	<form action="" method="post">
		<?php outputErrors($errors); ?>
		<label>Login:</label><br />
		
		<label>Username:</label>
			<input type="text" name="username" placeholder="username"/><br />
		<label>Password:</label>
			<input type="password" name="password" placeholder="password" /><br />
		<input type="submit" name="submit" value="Log In" />
	</form>
	
	<a>Forgot Password</a>
	<p><a href="register.php">Register</a> a for library card</p>
				
<?php 
	include_once 'core/section/overall/foot.php'; 
?>