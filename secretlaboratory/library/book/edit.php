<?php
	//this is the book edit page
	$PAGE = 'book_edit';
	$DIR_PATH = '../../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	adminProtect();
	
	require_once $DIR_PATH.'core/functions/library.php';
	
	if(!isset($_GET['id'])){
		header('Location: '.$DIR_PATH.'library/');
		die();
	}else{
		$book = getBook($_GET['id']);
	}
	
	if(isset($_POST['revise_button'])){
		
		$book_title = trim($_POST['book_title']);
		$intro = $_POST['intro'];
		$creator = $_POST['creator'];
		
		if(empty($book_title)){
			$errors[] = "You must enter a book title.";
		}else if($book_title !== $book['title']){
			if(bookTitleExists($title)){
				$errors[] = "This title already exists.";
			}
		}else if( strlen($book_title) > 255){
			$errors[] = "The chapter title must be less than 255 characters";
		}
		
		if(empty($intro)){
			$errors[] = "You must have something in the intro!";
		}
		
		if(empty($creator)){
			$errors[] = "There must be a creator of the book!";
		}
		
		if(isset($errors) && empty($errors)){
			reviseBook($book['id'], $book_title,$intro,$creator);
			header('Location: '.$DIR_PATH.'library/book/?id='.$book['id'] );
			die();
		}
	}
	
	if(isset($_POST['delete_button'])){
		deleteBook($book['id']);
		header('Location: '.$DIR_PATH.'library/');
		die();
	}
?>

<?php require_once $DIR_PATH.'core/section/overall/head.php'; ?>

	<?php outputErrors($errors); ?>
	
	<form method="post" action="">
		<label for="book_title">Title of Book</label><br/>
			<input type="text" name="book_title" value="<?php if(isset($_POST['book_title'])){ echo $book_title; }else{echo $book['title'];} ?>" /><br />
		<label for="intro">Introduction</label><br/>
			<textarea name="intro" cols="60" rows="20"><?php if(isset($_POST['intro'])){echo $intro;}else{echo $book['intro'];} ?></textarea><br/>
		<label for="creator">Creator</label><br/>
			<input type="text" name="creator" value="<?php if(isset($_POST['creator'])){ echo $creator; }else{echo $book['creator'];} ?>" /><br />
		
		<input type="submit" name="revise_button" value="Revise Book" />
	</form>
	
	<form method="post" action="">
		<input type="submit" name="delete_button" value="Delete Book" />
	</form>
	
<?php require_once $DIR_PATH.'core/section/overall/foot.php'; ?>