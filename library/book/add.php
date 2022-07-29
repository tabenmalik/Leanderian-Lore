<?php
	//this is the adding page for a book
	
	$PAGE = 'book_add';
	$DIR_PATH = '../../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	adminProtect();
	
	require_once $DIR_PATH.'core/functions/library.php';
	
	if(isset($_POST['add_book'])){
	
		$book_title = trim($_POST['book_title']);
		$book_intro = $_POST['book_intro'];
		$creator 	= trim($_POST['creator']);
		
		if(empty($book_title)){
			$errors[] = "You must enter a book title";
		}else if(bookTitleExists($book_title)){
			$errors[] = "The book already exists";
		}
		
		if(empty($book_intro)){
			$errors[] = "You must enter an intro";
		}
		
		if(empty($creator)){
			$errors[] = "You must enter a creator";
		}
		
		if(empty($errors)){
			addBook($book_title,$book_intro,$creator);
		}
	}
?>

<?php
	
	require_once $DIR_PATH.'core/section/overall/head.php';
	
	outputErrors($errors);
	
	if(isset($_POST['add_book']) && empty($errors)){
		?>
		<p>
			A new book was added to the Leander Library!<br/>
			Click <a href="<?php echo $DIR_PATH; ?>library/book/chapter/add.php">here</a> to add a chapter to this new book.
			
			
		</p>
		<?php
	}
	else
	{
		?>
		<form method="post" action="">
			<label for="book_title">Title of New Book</label><br />
				<input type="text" name="book_title" value="<?php if(isset($_POST['book_title'])){ echo $book_title; } ?>" placeholder="ex. Leanderian Lore" /><br />
			<label for="book_intro">Introduction</label><br />
				<textarea name="book_intro" cols="60" rows="20" placeholder="Do you really need an example for this?"><?php if(isset($_POST['book_intro'])){ echo $book_intro;} ?></textarea><br/>
			<label for="creator">Creator of Book</label></br>
				<input type="text" name="creator" value="<?php if(isset($_POST['creator'])){ echo $creator; } ?>" placeholder="ex. The Ninja" /><br />
			<input type="submit" name="add_book" value="Add Book" />
		</form>
		<?php
	}
	?>
	
<?php 
	require_once $DIR_PATH.'core/section/overall/foot.php'; 
?>