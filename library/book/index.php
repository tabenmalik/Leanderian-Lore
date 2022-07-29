<?php 
	//this is the book index page
	$PAGE = 'book_index';
	$DIR_PATH = '../../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	
	require_once $DIR_PATH.'core/functions/library.php';
	
	if(!isset($_GET['id']))
	{
		header('Location: '.$DIR_PATH.'library/');
		die();
	}else{
		$book = getBook($_GET['id']);
		$book['intro'] = nl2br($book['intro']);
		$book['intro'] = str_replace('<br />','<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$book['intro']);
		$book['intro'] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$book['intro'];
	}
?>

<?php require_once $DIR_PATH.'core/section/overall/head.php'; ?>

	<h1><?php 				echo $book['title']; 										?></h1>
	<p class="author">By: <?php 			echo $book['creator']; 										?></p>
	<p class="story"><?php				echo $book['intro']; 										?></p>
	<p class="date">Created on: <?php	echo $book['date_created']; 								?></p>

<?php require_once $DIR_PATH.'core/section/overall/foot.php'; ?>