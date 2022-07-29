<?php
	//This is the website's index page
	
	$DIR_PATH = '';
	require_once $DIR_PATH.'core/init/maininit.php';
?>

<?php 
	require_once $DIR_PATH.'core/section/overall/head.php';
	$chapter = getChapter();
	$chapter['content'] = nl2br($chapter['content']);
	$chapter['content'] = str_replace('<br />','<br />&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp',$chapter['content']);
	$chapter['content'] = "&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp".$chapter['content'];
	
	//need to somehow display book intros
?>
	<h2 class="chapter">Chapter <?php 	echo $chapter['chap_num']; 		?></h2>
	<h1 class="title"><?php 			echo $chapter['title']; 		?></h1>
	<p 	class="story"><?php				echo $chapter['content']; 		?></p>
	<p 	class="author">By: <?php 		echo $chapter['author']; 		?></p>
	<p 	class="date"><?php 				echo $chapter['date_posted'];	?></p>
						
<?php 
	require_once $DIR_PATH.'core/section/overall/foot.php' 
?>