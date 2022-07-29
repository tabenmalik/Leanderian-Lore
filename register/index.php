<?php
	//this is the register index page
	$PAGE = 'registerindex';
	$DIR_PATH = '../';
	
	
	require_once $DIR_PATH.'core/init/maininit.php';
	loggedInProtect();
	
	require_once $DIR_PATH.'core/functions/messages.php';
	date_default_timezone_set('America/Denver');
	
	if(isset($_POST['register'])){
	
		$first_name		= $_POST['first_name'];
		$last_name 		= $_POST['last_name'];
		$username 		= $_POST['username'];
		$password 		= $_POST['password'];
		$repassword 	= $_POST['repassword'];
		$email 			= $_POST['email'];
		$date			= date('Y\-m\-d');
		
		if(empty($first_name)){
			$errors[] = "Did your mother not give you a first name?";
		}else{
			if(strlen($first_name) > 16){
				$errors[] = "Your first name must be shorter than 16 characters. Sorry Janaropolopoulous.";
			}
			
			if(preg_match("/\\s/", $first_name) == true){
				$errors[] = "Please fill in those spaces in your first name.";
			}
		}
		
		if(empty($last_name)){
			$errors[] = "Surely the school system doesn't allow blank last names. Well neither do I.";
		}else{
			if(strlen($last_name) > 16){
				$errors[] = "Your last name must be shorter than 16 characters, fool.";
			}
			
			if(preg_match("/\\s/", $last_name) == true){
				$errors[] = "Please fill in those spaces in your last name.";
			}
		}
		
		if(empty($username)){
			$errors[] = "Only Taben can have a username of blank. Because he doesn't exist";
		}else{
			if(strlen($username) < 5 ){
				$errors[] = "How is that a username? Pleas make it longer.";
			}else if(strlen($username) > 20){
				$errors[] = "That, my friend, is too long of a username.";
			}
			
			if(preg_match("/\\s/", $username)){
				$errors[] = "I have read \"Ender's Game\". I know the evils of putting spaces in usernames. Remove it at once.";
			}else if(userExists($username)){
				$errors[] = "You aren't creative enough. Someone beat you to that username.";
			}
		}
		
		if(empty($password)){
			$errors[] = "I got to have SOME kind of security on this website. So pretty please enter a password.";
		}else{	
			if(empty($repassword)){
				$errors[] = "You're not perfect. I need to show you if you're making a mistake in the password. Please re-enter the password in the 'Repeat Password' field.";
			}else if($password !== $repassword){
				$errors[] = "You were born in the computer age. But still you remain to incorrectly repeat your passwords. That's sad bro.";
			}
			
			if(strlen($password) < 6){
				$errors[] = "Come on. Even 'password' is a better password then yours. It must be at least 6 characters.";
			}
		}
		
		if(empty($email)){
			$errors[] = "No email? NO ACCOUNT FOR YOU.";
		}else{
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				$errors[] = "The only way for this account to be activated is if you give a valid email address!";
			}else if(emailExists($email) === true){
				$errors[] = "Somebody beat you to that email address. Gotta be quicker next time.";
			}
		}
	}
	
	if(isset($_POST['register']) && empty($errors)){
		$register_data = array(
			'username' 			=> $username,
			'password' 			=> $password,
			'first_name' 		=> $first_name,
			'last_name' 		=> $last_name,
			'email' 			=> $email,
			'date_registered'	=> $date,
			'register_code'		=> md5($username.microtime())
		);
		
		registerUser( $register_data );
		
		$title = $first_name." ".$last_name." has Requested for a Library Card";
		$body = "You have a new peasant that wants to be ruled by you! ".$first_name." ".$last_name." is requesting for a library card.
				Click <a href=\"http://www.leanderianlore.com/register/activate.php?ac=".$register_data['register_code']."\">here</a> if you accept his or her grovelling. 
				If you wish to question his or her motives first email him or her at ".$email."<br><br>".date("F j, Y");
		$type = 0;
		$date = date("Y-m-d");
		createMessage($title, $body, $type, $date);
		header('Location: '.$DIR_PATH.'register/?success');
		die();
	}
?>

<?php
	require_once $DIR_PATH.'core/section/overall/head.php';
	
	if(isset($_GET['success']))
	{
		?>
		<h2>Success!</h2>
		<p>
			But don't get your hopes up too high.
			Kameron must approve your request for a library card.
			Please check after 24 hours to see if your library card
			is activated. Here's a few ideas for passing the time:
			<ul>
				<li>Learn how to make brookies</li>
				<li>Work a UT game</li>
				<li>Eat lunch in the theatre room</li>
				<li>Argue that actors are the best</li>
				<li>Make lots of inappropriate jokes</li>
				<li>Call Sarah for acting adive</li>
				<li>Try a tech position</li>
			</ul>
			<br/>
			If you are a techie, here is an alternative list:
			<ul>
				<li>Read a light board manual</li>
				<li>Hide in the shadows</li>
				<li>Argue that techies are better</li>
				<li>Work 14 hours straight on a show</li>
				<li>Learn how to dress an actor in 10 seconds</li>
				<li>Try an acting role</li>
			</ul>
			Thanking for your interest in registering a library card
			at LeanderianLore.com
		</p>
		
		<p>Return to <a href="<?php echo $DIR_PATH; ?>">login</a></p>
		<?php
	}
	else
	{
		?>
		
		<form class="survey small" action="" method="post">
			<h1>Register</h1>
			<?php outputErrors($errors); ?>
			<label>First Name:</label><br />
				<input type="text" name="first_name" value="<?php if(isset($_POST['register'])){ echo $first_name; } ?>"><br/>
			<label>Last Name</label><br />
				<input type="text" name="last_name" value="<?php if(isset($_POST['register'])){ echo $last_name; } ?>"><br/>
			<label>Username</label><br />
				<input type="text" name="username" value="<?php if(isset($_POST['register'])){ echo $username; } ?>"><br/>
			<label>Password</label><br />
				<input type="password" name="password" value="<?php if(isset($_POST['register'])){ echo $password;} ?>"><br/>
			<label>Repeat Password</label><br />
				<input type="password" name="repassword" value="<?php if(isset($_POST['register'])){ echo $repassword; } ?>"><br/>
			<label>Email</label><br />
				<input type="text" name="email" value="<?php if(isset($_POST['register'])){ echo $email; } ?>"><br/>
			
			<br/>
			<input type="submit" name="register" value="Register">
		</form>
		<?php 
	}

	require_once $DIR_PATH.'core/section/overall/foot.php';
?>