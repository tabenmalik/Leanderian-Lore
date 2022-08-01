<?php
	//This is the index page for Joke of the Week
	
	$DIR_PATH = '../';
	$PAGE = 'jotw';
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
?>

<?php
	require_once $DIR_PATH.'core/section/overall/head.php';
?>

<div>
<h2 class="messagetitle">Joke of the Week</h2>
<p>What's green and has wheels?</p>
<p>Grass</p>
<p>I lied about the wheels</p>
</div>
<?php
	require_once $DIR_PATH.'core/section/overall/foot.php';
?>