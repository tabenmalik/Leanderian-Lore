<?php
	//this is the edit page for chapters
	
	$PAGE = 'chapter_edit';
	$DIR_PATH = '../../../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	adminProtect();
	
	require_once $DIR_PATH.'core/functions/library.php';

	if(!isset($_GET['id'])){
		header('Location: '.$DIR_PATH.'library');
		die();
	}else{
		$chapter = getChapter(null,$_GET['id']);
	}
	
	if(isset($_POST['revise_button'])){
		
		$chap_num 	= $_POST['chap_num'];
		$title 		= trim($_POST['title']);
		$content 	= $_POST['content'];
		$author		= trim($_POST['author']);
		
		if(empty($title)){
			$errors[] = "You must enter a chapter title.";
		}else if($title != $chapter['title']){
		
			if(chapterTitleExists($title)){
				$errors[] = "This title already exists.";
			}
		}else if( strlen($title) > 255){
			$errors[] = "The chapter title must be less than 255 characters";
		}
		
		if(empty($content)){
			$errors[] = "You must have something in the content!";
		}
		
		
		if(empty($errors)){
			reviseChapter($_GET['id'], $chap_num,$title,$content,$author);
			header('Location: '.$DIR_PATH.'library/book/chapter/index.php?id='.$_GET['id'] );
			die();
		}
	}
	
	if(isset($_POST['delete_button'])){
		deleteChapter($chapter['book_id'],$chapter['id']);
		header('Location: '.$DIR_PATH.'library');
		die();
	}
?>

<?php 
	require_once $DIR_PATH.'core/section/overall/head.php';
?>
	
	<?php outputErrors($errors); ?>
	
	<form method="post" action="">
		<label for="chap_num">Chapter #</label><br/>
			<input type="number" name="chap_num" value="<?php if(isset($_POST['chap_num'])){ echo $chap_num; }else{echo $chapter['chap_num'];} ?>" /><br />
		<label for="title">Title</label><br/>
			<input type="text" name="title" size="30" value="<?php if(isset($_POST['title'])){ echo $title;}else{echo $chapter['title'];} ?>"/><br />
		<label for="content">Content</label><br/>
			<textarea name="content" cols="60" rows="20"><?php if(isset($_POST['content'])){echo $content;}else{echo $chapter['content'];} ?></textarea><br/>
		<label for="author">Author</label>
			<input type="text" name="author" size="15" value="<?php if( isset($_POST['author'])){echo $author; }else{ echo "Kameron"; } ?>" /><br />
		<input type="submit" name="revise_button" value="Revise Chapter" />
	</form>
	<form method="post" action="">
		<input type="submit" name="delete_button" value="Delete Chapter" />
	</form>
	
<?php 
	require_once $DIR_PATH.'core/section/overall/foot.php'; 
?>