<?php
	//this is the account index page
	$PAGE = 'accountindex';
	$DIR_PATH = '../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	require_once $DIR_PATH.'core/functions/messages.php';
	
	if(isset($_POST['contact'])){
		$message 	= $_POST['message'];
		
		if(empty($message)){
			$errors[] = "Excuse me. Please don't be rude and spam the people's time by sending them blank messages.";
		}
		
		if(empty($errors)){
			$title = "A Note from the Admins!";
			$body = mres($message);
			$body = $body."<br><br>".date("F j, Y");
			$type = 2;
			$date = date("Y-m-d");
			
			createMessage($title, $body, $type, $date);
		}
	}
	
	$messages = getMessages('-1');
	
	foreach($messages as $message){
		if(isset($_POST[$message['id']])){
			messageRead($message['id']);
		}
	}
?>

<?php
	include_once $DIR_PATH.'core/section/overall/head.php';
?>
	<script src="<?php echo $DIR_PATH;?>core/javascript/account.js">
	
	</script>
	
	<h1>Welcome <?php echo $_SESSION['first_name']; ?>!</h1>
	
	<ul>
		<li id="messagetab" class="tab highlight">
			Message Board
		</li>
		<li id="profiletab" class="tab">
			Profile
		</li>
		<?php
			if( isAdmin()){
			?>
				<li id="statisticstab" class="tab">
					Statistics
				</li>
			<?php
			}
			
		?>
		
	</ul>
	<div id="messageboard" class="board"> 
		<?php
			if(isAdmin()){
				?>
				<p>Would you like to send a message to all of your members?<p>
				<?php outputErrors($errors); ?>
				<form action="" method="post">
					<textarea name="message" cols="70" rows="10" placeholder="Hello everyone. Just to let you know, today is the day you die."></textarea>
					<br/><input type="submit" name="contact" value="Leave A Message!"/>
				</form><br/><br/>
				<?php
			}
			
			if(isAdmin()){
				$messages = getMessages('-1');
			}else{
				$messages = getMessages(2);
			}
			
			if(empty($messages)){
				?>
				<h2>No Messages!</h2>
				
				<?php
			}else{
				foreach($messages as $message){
					include $DIR_PATH."core/section/message.php";
				}
			}
		?>
		
	
	</div>
	<div id="profileboard" class="board hide">
		<h2>Coming Soon!</h2>
	</div>
	
	<?php
	if(isAdmin()){?>
		<div id="statisticsboard" class="board hide">
			<h2>This is the statistics board!</h2>
			<p>Coming soon. You'll be able to see statistics such as story views, amount of comments, and things like that.
				Also as part of admin stats, there'll be a count of the written lines of code running the website. After that
				I will create a running list of the best authors on this cite:
				<ol>
					<li>Kameron</li>
					<li>King Leanderian</li>
					<li>Mr. G</li>
					<li>The crazy Irish man</li>
				</ol>
			</p>
			
			<p>Lines of written code: </p>
		</div><?php
	}?>
	
	
<?php 
	include_once $DIR_PATH.'core/section/overall/foot.php'; 
?>