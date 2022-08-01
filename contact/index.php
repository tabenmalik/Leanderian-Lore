<?php
	//this is the contact index page
	
	$PAGE = 'contact_index';
	$DIR_PATH = '../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	
	require_once $DIR_PATH.'core/functions/messages.php';
	
	
	if(isset($_POST['contact'])){
		$message 	= $_POST['message'];
		$to 		= $_POST['to'];
		
		if(empty($message)){
			$errors[] = "Excuse me. Please don't be rude and spam the admin's time by sending them blank messages.";
		}
		
		if(empty($errors)){
			
			$title = $_SESSION['first_name']." ".$_SESSION['last_name']." Left a Message for the ".$to;
			$body = mres($message);
			$body = "\"".$message."\"<br><br>If you would like to contact this person back, here is the email under their account: ".$_SESSION['email']."<br><br>".date("F j, Y");
			$type = 1;
			$date = date("Y-m-d");
			
			createMessage($title, $body, $type, $date);
			header("Location: ".$DIR_PATH."contact/index.php?successbitches");
		}
	}
?>

<?php 
	require_once $DIR_PATH.'core/section/overall/head.php';
?>

	<?php
	if(isset($_GET['successbitches'])){ ?>
		
		<h1>Congrats!</h1>
		<p>It's a baby boy!</p>
		<p>Also the message was successfully sent. Please check your in email for a response. If we at LeanderianLore are not lazy, you will have a response in 3 months.</p>
		<p>Thanks</p><?php 
	}else{ ?>
	<form action="" method="post">
		<h1>Contact Us</h1>
		<?php outputErrors($errors); ?>
		<textarea autofocus name="message" cols="75" rows="25" placeholder="Please type your message here. I mean really where else would you type your message?"></textarea><br />
		<p>Who is this message for?</p>
		<select name='to'>
			<option value="Author"		>Author</option>
			<option value="Webmaster"	>Webmaster</option>
		</select><br /><br />
		<input type="submit" name="contact" value="Leave A Message!"/>
	<form><?php
	
	} ?>
	
<?php 
	require_once $DIR_PATH.'core/section/overall/foot.php'; 
?>