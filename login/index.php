<?php
	//This is the login index page
	$PAGE = 'login_index';
	$DIR_PATH = '../';
	
	require_once $DIR_PATH."core/init/maininit.php";
	
	loggedInProtect();
	
	$errors = array();

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
				$errors[] = "You're username/password combonation is incorrect";
			}else{
				login($username);
				
				header('Location: '.$DIR_PATH.'account/');
				die();
			}
		}
	}
?>

<?php 
	require_once $DIR_PATH.'core/section/overall/head.php'; 
?>
	<form class="survey small" action="" method="post">
		<?php outputErrors($errors); ?>
		<h1>Login</h1><br />
		
		<label for="username">Username:</label>
			<input type="text" name="username" placeholder="username"/><br />
		<label for="username">Password:</label>
			<input type="password" name="password" placeholder="password" /><br />
		<input type="submit" name="submit" value="Log In" /><br/><br/>
		<p>I'm a doofus and <a href="<?php echo $DIR_PATH; ?>login/forgotpassword.php">forgot my password...</a></p>
		<p>Want to gain exclusive access to a fantasy world?
		<a href="<?php echo $DIR_PATH; ?>register/">Register a for library card!</a></p>
	</form>
				
<?php 
	require_once $DIR_PATH.'core/section/overall/foot.php'; 
?>
