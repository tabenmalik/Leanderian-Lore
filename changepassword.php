<?php
	include_once 'core/init.php';
	protect();
	
	if(isset($_POST['change_password'])){
	
		$current_password = $_POST['current_password'];
		$new_password = $_POST['new_password'];
		$re_new_password = $_POST['re_new_password'];
		
		if(empty($current_password)){
			$errors[] = "Please enter in your current password.";
		}else if(md5($current_password) !== $user_data['password']){
			$errors[] = "You can't even get your current password correct. Get your head in the game.";
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
			changePassword($session_id, $new_password);
			header('Location: changepassword.php?success');
		}
	}
	
	include_once 'core/section/overall/head.php';
?>
	<h1>Change Password</h1>
	
	<?php 
		if(isset($_GET['success']) && empty($_GET['success'])){
			?>
			<h1>Success!</h1>
			<?php
		}else{
			outputErrors($errors); ?>
			
		<form action="" method="post">
	
			<label>Current Password:</label><br/>
			<input type="password" name="current_password" value=""/><br/>
			
			<label>New Password:</label><br/>
			<input type="password" name="new_password" value=""/><br/>
			
			<label>Repeat New Password:</label><br/>
			<input type="password" name="re_new_password" value="" /><br/>
			
			<input type="submit" name="change_password" value="Change Password"/>
			
		</form>
		
		<?php
		}
	?>
	
	
<?php
	include_once 'core/section/overall/foot.php';
?>