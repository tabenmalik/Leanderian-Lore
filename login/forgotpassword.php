<?php
	$PAGE = 'login_forgotpass';
	$DIR_PATH = '../';
	require_once $DIR_PATH.'core/init/maininit.php';
	loggedInProtect();

	
	if(isset($_POST['change_password'])){
		
		$email 				= $_POST['email'];
		$new_password 		= $_POST['new_password'];
		$re_new_password 	= $_POST['re_new_password'];
		
		if( empty($email)){
			$errors[] = "Siiiiiigh....You forgot your email.";
		}else if( emailExists($email)==false){
			$errors[] = "I'm gonna call the authorities. This email is not registered under our library.";
		}
		
		if(empty($new_password)){
			$errors[] = "FOOL! Enter in a new password!";
		}
		
		if(strlen($new_password) < 6){
			$errors[] = "Come on. Even 'password' is a better password then yours. It must be at least 6 characters.";
		}
		
		if(empty($re_new_password)){
			$errors[] = "Please repeat your password. It's to make sure you didn't screw up the first time.";
		}else if($new_password !== $re_new_password){
			$errors[] = "You were born in the computer age. But still you remain to incorrectly repeat your passwords. That's sad bro.";
		}
		
		if(empty($errors)){			
			changePassword($email, $new_password);
			header('Location: '.$DIR_PATH.'login/forgotpassword.php?successforrealthistime');
			die();
		}
	}else if(isset($_POST['email'])){
		header('Location: forgotpassword.php?success');
		die();
	}
?>

<?php require_once $DIR_PATH.'core/section/overall/head.php'; ?>


<?php

	if(isset($_GET['successforrealthistime'])){
		?>
		<h1>Sucess!</h1>
		
		<p>For real yo. I hope you dig your new password. Time to <a href="<?php echo $DIR_PATH; ?>">login</a>.</p>
		<?php
	}else if( isset($_GET['success']))
	{ 
		?>
		<h1>Success!</h1>
		
		<p>
			I just got a high score on 2048!!
		</p>
		
		<p>
			Oh but I couldn't get your password.... so this is awkward.
			Due to poor programming from the idiot that runs this website,
			I can't reverse the encryption code on your password. So like when
			your pet dies, let's just find a new one!
		</p>
		<?php outputErrors($errors); ?>
		<form action="" method="post" autocomplete="off">
			
			<label>Email:<label><br>
			<input type="text" name="email" placeholder="ex. yourname@server.com" value="<?php echo $_POST['email']; ?>"/><br />
			
			<label>New Password:</label><br/>
			<input type="password" name="new_password" value=""/><br/>
			
			<label>Repeat New Password:</label><br/>
			<input type="password" name="re_new_password" value="" /><br/>
			
			<input type="submit" name="change_password" value="Change Password"/>
			
		</form>
		
		<?php
	}
	else
	{ 
		?>
		<form class="survey small"action="" method="post">
		<h1>Forgotten Password</h1>

		<p>
			Please enter the email address that you used to activate your account.
		</p>
				<?php outputErrors($errors); ?>
				<label>Email:</label>
				<input type="text" name="email" placeholder="ex. yourname@server.com"/><br />
				<br/>
				<input type="submit" name="submit" value="Submit" />
				
		</form>
		<?php 
	} 
	?>


<?php require_once $DIR_PATH.'core/section/overall/foot.php'; ?>