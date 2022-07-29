<?php
	include_once 'core/init.php';
	protect($user_data);
?>

<?php 
	include_once 'core/section/overall/head.php';
	
	if(isAdmin($user_data['user_type'])){
		?>
		<p class="reminder">
			While you are logged in, the archive page allows you to do your editing.
			There is an 'Add Chapter' button for you at the very top that directs you 
			to the new chapter submit form. Each chapter title links to a read only
			view of the chapter. The 'Edit' link goes to the form to edit or delete	
			that chapter.
		</p>
		
		<form action="add_chapter.php">
			<input type="submit" name="add_book" value="Add Book"/><br/><br/>
			<input type="submit" value="Add Chapter" />
		</form>
		<?php
	}
	?>
	<ul>
	<?php
		foreach( getBooks() as $book ){
		?>
			<li><a href="book.php?id=<?php echo $book['id']; ?>"> <?php echo $book['title']; ?></a><?php if(isAdmin($user_data['user_type'])){ ?> - <a href="edit_book.php?id=<?php echo $book['id']; ?>">Edit</a><?php } ?></li>
			<ul>
				<?php
				foreach( getChapters($book['id']) as $chapter)
				{
					?>
					<li>
						<a href="chapter.php?id=<?php echo $chapter['id']; ?>"> Chapter <?php echo $chapter['chap_num']; ?>: <?php echo $chapter['title']; ?></a><?php if(isAdmin($user_data['user_type'])){ ?> - <a href="edit_chapter.php?id=<?php echo $chapter['id']; ?>">Edit</a><?php } ?>
					</li>
					<?php
				}
				?>
			</ul>
		<?php
		}
	?>
	</ul>
<?php 
	include_once 'core/section/overall/foot.php'; 
?>