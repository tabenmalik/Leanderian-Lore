<?php 
	include_once 'core/init.php';
	protect($user_data);
	adminProtect($user_data);
	
	if(isset($_POST['add_book'])){
		$book_title = trim($_POST['book_title']);
		$book_intro = $_POST['book_intro'];
		
		if(empty($book_title)){
			$errors[] = "You must enter a book title";
		}else if(bookTitleExists($book_title)){
			$errors[] = "The book already exists";
		}
		
		if(empty($book_intro)){
			$errors[] = "You must enter an intro";
		}
		
		if(empty($errors)){
			addBook($book_title,$book_intro);
		}
	}
?>

<?php
	
	include_once 'core/section/overall/head.php';
	
	outputErrors($errors);
	
	if(isset($_POST['add_book']) && empty($errors)){
		?>
		<p>
			A new book was added to the Leander Library!<br/>
			Click <a href="add_chapter.php">here</a> to add a chapter to this new book.
			
		</p>
		<?php
	}
	else
	{
		?>
		<form method="post" action="">
			<label for="book_title">Title of New Book</label>
			<br />
				<input type="text" name="book_title" value="<?php if(isset($_POST['book_title'])){ echo $book_title; } ?>" placeholder="ex. Leanderian Lore" />
			<br />
			<label for="book_intro">Introduction</label>
			<br />
				<textarea name="book_intro" cols="60" rows="20" placeholder="Do you really need an example for this?"><?php if(isset($_POST['book_intro'])){ echo $book_intro;} ?></textarea>
			<br/>
			<input type="submit" name="add_book" value="Add Book" />
		</form>
		<?php
	}
	?>
	
<?php 
	include_once 'core/section/overall/foot.php'; 
?>