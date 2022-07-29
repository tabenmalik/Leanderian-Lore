<?php
	// this is the chapter index page
	
	$PAGE = 'chapter_index';
	$DIR_PATH = '../../../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	
	require_once $DIR_PATH.'core/functions/library.php';
	
	if(!isset($_GET['id'])){
		header('Location: '.$DIR_PATH.'library/');
	}else{
		$chapter = getChapter(null, $_GET['id']);
		$chapter['content'] = nl2br($chapter['content']);
		$chapter['content'] = str_replace('<br />','<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$chapter['content']);
		$chapter['content'] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$chapter['content'];
	}
?>

<?php 
	require_once $DIR_PATH.'core/section/overall/head.php'; 
?>

	<h2 class="chapter">Chapter <?php 	echo $chapter['chap_num']; 			?></h2>
	<h1 class="title"><?php 			echo $chapter['title']; 			?></h1>
	<p class="story"><?php			echo $chapter['content']; 			?></p>
	<p class="author">By: <?php 		echo $chapter['author']; 			?></p>
	<p class="date"><?php 			echo $chapter['date'];				?></p>
	
<?php 
	require_once $DIR_PATH.'core/section/overall/foot.php'; 
?>