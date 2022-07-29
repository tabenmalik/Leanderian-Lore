<?php
	//this is the Library index page
	$PAGE = "library_index";
	$DIR_PATH = '../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	
	require_once $DIR_PATH.'core/functions/library.php';
	
	if(isset($_POST['add_book'])){
		header('Location: '.$DIR_PATH.'library/book/add.php');
	}
	
	if(isset($_POST['add_chapter'])){
		header('Location: '.$DIR_PATH.'library/book/chapter/add.php');
	}
?>

<?php 
	require_once $DIR_PATH.'core/section/overall/head.php';
	
	$books = getBooks();
	
	if(isAdmin()){
	?>
		<p>
			A new set of adventures? Create a new book!
		</p>
		<!--admin privelages-->
		<form action="" method="post">
			<input type="submit" name="add_book" value="Add Book"/><br/><br/>
		</form>
		
		<?php
			
			if(!empty($books)){
			?>
					<p>
						Getting that itch to write? Put in your next chapter!
					</p>
					<form action="" method="post">
						<input type="submit" name="add_chapter" value="Add Chapter" />
					</form>
			<?php
			}
			?>
	<?php
	}
	?>
	
	
	
	<ul>
	<?php
		foreach( $books as $book ){
		?>
			<li><a href="<?php echo $DIR_PATH; ?>library/book/?id=<?php echo $book['id']; ?>"> <?php echo $book['title']; ?></a><?php if(isAdmin()){ ?> - <a href="<?php echo $DIR_PATH; ?>library/book/edit.php?id=<?php echo $book['id']; ?>">Edit</a><?php } ?></li>
			<ul>
				<?php
				$chapters = getChapters($book['id']);
				
				if(empty($chapters)){
					?><li>There are no current chapters available</li><?php
				}else{
					
					foreach( getChapters($book['id']) as $chapter)
					{
						?>
						<li>
							<a href="<?php echo $DIR_PATH; ?>library/book/chapter/?id=<?php echo $chapter['id']; ?>"> Chapter <?php echo $chapter['chap_num']; ?>: <?php echo $chapter['title']; ?></a><?php if(isAdmin()){ ?> - <a href="<?php echo $DIR_PATH; ?>library/book/chapter/edit.php?id=<?php echo $chapter['id']; ?>">Edit</a><?php } ?>
						</li>
						<?php
					}
				}
				?>
			</ul>
		<?php
		}
	?>
	</ul>
<?php 
	require_once $DIR_PATH.'core/section/overall/foot.php'; 
?>