<?php
	include_once 'core/init.php';
	protect($user_data);
?>

<?php 
	include_once 'core/section/overall/head.php';

	if(loggedIn())
	{
		?>
			<p>
				This is where people will go to contact me/webmaster.
				Of course if someone sends in anything that relates to you
				then I will just send it to you. But this if people are having
				bugs in the site and such. Use this to contact me if you're
				having any problems with your admin account.
			</p>
		<?php
	}
	?>
	
	<h1>Contact Us</h1>
	
	<form>
		<textarea></textarea>
	<form>
	
<?php 
	include_once 'core/section/overall/foot.php'; 
?>