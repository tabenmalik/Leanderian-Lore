<?php
	include_once 'core/init.php';
	protect($user_data);
?>

<?php
	include_once 'core/section/overall/head.php';
	
	if(loggedIn()){
		?>
		<p class="reminder">
			You need to write up your bibliography!
		</p>
		<?php
	}
?>
	
	<h2>The Author</h2>
	<p>
		Kameron, I need a picture and description from you.
		I don't want to write this.
	</p>
	<h2>The Webmaster</h2>
	<p>
		Kameron...I think you owe me big time for this site.
		You think you can write my paragraph too? Ktanksbai
	</p>
	<h2>The Website</h2>
	<p>
		Programmers are very lazy by nature.
		Therefore Kameron will write about the website.
	</p>
<?php 
	include_once 'core/section/overall/foot.php'; 
?>