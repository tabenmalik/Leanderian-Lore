<?php
	include_once 'core/init.php';
	protect($user_data);
	
	if(!isset($_GET['id'])){
		header('Location: archive.php');
	}else{
		$chapter = getChapter(null, $_GET['id']);
		$chapter['content'] = nl2br($chapter['content']);
	}
?>

<?php 
	include_once 'core/section/overall/head.php'; 
?>

	<h2>Chapter <?php 	echo $chapter['chap_num']; 										?></h2>
	<h1><?php 			echo $chapter['title']; 										?></h1>
	<p><?php			echo $chapter['content']; 										?></p>
	<p>By: <?php 		echo $chapter['author']; 										?></p>
	<p><?php 			echo date("d-m-Y h:i:s", strtotime($chapter['date_posted']));	?></p>
	
<?php 
	include_once 'core/section/overall/foot.php'; 
?>