<?php
	// this is the add chapter page
	
	$PAGE = 'chapter_add';
	$DIR_PATH = '../../../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	adminProtect();
	
	require_once $DIR_PATH.'core/functions/library.php';
	
	$books = getBooks();
	
	if(isset($_POST['add_chapter'])){
		$book_id	= $_POST['book'];
		$chap_num 	= $_POST['chap_num'];
		$title 		= trim($_POST['title']);
		$content 	= ($_POST['content']);
		$author		= trim($_POST['author']);
		
		if(!bookExists($book_id)){
			$errors[] = "The book does not exist.";
		}
		
		if(empty($title)){
			$errors[] = "You must enter a chapter title.";
		}else if(chapterTitleExists($book_id,$title)){
			$errors[] = "That title already exists.";
		}else if(strlen($title) > 255){
			$errors[] = "The chapter title must be less than 255 characters";
		}
		
		if(empty($content)){
			$errors[] = "You must have something in the content!";
		}
		
		if(isset($errors) && empty($errors)){
			addChapter($book_id,$chap_num,$title,$content,$author);
			header('Location: '.$DIR_PATH);
		}
	}
	
	if(isset($_POST['add_book'])){
		header('Location: '.$DIR_PATH.'library/book/add.php');
	}
?>


<?php require_once $DIR_PATH.'core/section/overall/head.php'; ?>
		<p class="reminder">
			This is where you fill in the data for a new chapter.
			Some things to remeber:
			<ul>
				<li>The Archive does not order the chapters by the chapter number.
					So you can put in any chapter number and it will stay in order
					according to when you posted it. This allows you to 'skip' chapters
					if you want to. Other wise just keep yourself in check for which
					chapter you are on.</li>
				<li>There cannot be two chapters with the same title.</li>
				<li>Do whatever in the contents...keep it lively though</li>
				<li>In case you are ever to forget these things, that's ok.
					I created error handling into the site, so it will let you
					know if you messed up, and how you can fix it.</li>
			</ul>
		</p>
		
	<h1>Add a New Chapter</h1>
	<p>The story continues...</p>
	
	<?php
		if( isset($errors) && !empty($errors) ) 
		{
			echo '<ul><li>', implode('</li><li>', $errors), '</li></ul>';
		}
	?>
	
	<form method="post" action="" >
		<select name="book">
			<?php
				foreach( $books as $book )
				{
					?>
						<option value="<?php echo $book['id']; ?>"><?php echo $book['title']; ?></option>
					<?php
				}
			?>
		</select>
		<input type="submit" name="add_book" value="Add Book"/><br/>
		<label for="chap_num">Chapter #</label><br/>
			<input type="number" name="chap_num" value="<?php if( isset($_POST['chap_num'])){echo $chap_num; } ?>" /><br />
		<label for="title">Title</label><br/>
			<input type="text" name="title" size="30" placeholder="ex. The Return of the Graduates" value="<?php if( isset($_POST['title'])){ echo $title; } ?>"/><br />
		<label for="content">Content</label><br/>
			<textarea name="content" cols="60" rows="20" placeholder="And thus Leander theatre lived on..."><?php if(isset($_POST['content'])){ echo $content; } ?></textarea><br/>
		<label for="author">Author</label>
			<input type="text" name="author" size="15" value="<?php if( isset($_POST['author'])){echo $author; }else{ echo "Kameron"; } ?>" /><br />
		
		<input type="submit" name="add_chapter" value="Add Chapter" />
	</form>
	
<?php
	require_once $DIR_PATH.'core/section/overall/foot.php'; 
?>