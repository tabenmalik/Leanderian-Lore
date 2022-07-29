<?php
	include_once 'core/init.php';
	protect($user_data);
?>

<?php
	include_once 'core/section/overall/head.php';
?>
	<h1>Welcome <?php echo $user_data['first_name']; ?></h1>
	
	<?php
	
	if(isAdmin($user_data['user_type'])){
		?>
		<p>
			Hey man welcome to your website! Statistics are on the right banner.
			Most of your editting features are through out the website.
			You can go to the archive and edit any of the book intros and 
			any chapter. If you notice any bugs or problems, or if you have
			suggestions on how to improve the website, please go to the contact
			page and leave a message for the webmaster.
			Right now this website is only in beta, but here
			are some exciting features to look forward to:
		</p>
		
		<ul>
			<li>Changing personal information</li>
			<li>Commeting on the stories</li>
			<li>Adding a profile picture</li>
			<li>Time travelling</li>
			<li>Free Lollipops</li>
			<li>The option to play show tunes while logged in</li>
		</ul>
		
		<p>
			But for now just keep updating your blog and give Leander theatre
			the real drama it needs!
		</p>
		
		<p>
			Here is a list of features you currently have:
		</p>
		
		<ul>
			<li><a href="changepassword.php">Change Password</a></li>
			<li><a href="logout.php">Joke of the Day</a></li>
		</ul>
		
		<?php
	}else{
		?>
		<p>
			Here is your home page. Nothing fancy right now.
			This website is only in beta testing right now. If you run into any problems
			please go to the contact page and leave a message for the webmaster and he
			will get to fixing it as soon as he can. This site is only in it's basic
			stage, but here are some exciting features to look forward to:
		</p>
		
		<ul>
			<li>Changing personal information</li>
			<li>Commeting on the stories</li>
			<li>Adding a profile picture</li>
			<li>Time travelling</li>
			<li>Free Lollipops</li>
			<li>The option to play show tunes while logged in</li>
		</ul>
		
		<p>
			But for now please enjoy keeping up with Kameron's stories. TAB OUT.
		</p>
		
		<br/>
		
		<p>
			Here is a list of features you currently have:
		</p>
		
		<ul>
			<li><a href="changepassword.php">Change Password</a></li>
			<li><a href="logout.php">Joke of the Day</a></li>
		</ul>
		<?php
	}
	?>
<?php 
	include_once 'core/section/overall/foot.php'; 
?>