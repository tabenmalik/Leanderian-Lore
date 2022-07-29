<?php
	require_once $DIR_PATH.'core/functions/book.php';
	
	function bookExists($id)
	{
		$query = "	SELECT COUNT(1) FROM `books`
					WHERE `id` = '$id'";
					
		$sql = mysql_query($query);
		
		return(mysql_result($sql,0) == '0' ) ? false:true;
	}
	
	function bookTitleExists($book_title)
	{
		$book_title = mres($book_title);
		
		$query = "	SELECT COUNT(1) FROM `books` 
					WHERE `title` = '{$book_title}'";
		
		$sql = mysql_query($query);
		
		/*returns true if there is a chapter that already has the title*/
		return(mysql_result($sql, 0) == '0') ? false:true;
	}
	
	function addBook($title,$intro,$creator)
	{
		$title 		= htmlentities($title);
		$intro 		= htmlentities($intro);
		$creator 	= htmlentities($creator);
		
		$title 		= mres($title);
		$intro		= mres($intro);
		$creator 	= mres($creator);
		
		$date		= date('Y\-m\-d');
		
		$query = "INSERT INTO `books` SET
						`title` 		= '{$title}',
						`intro` 		= '{$intro}',
						`creator`		= '{$creator}',
						`date_created` 	= '$date'";
						
		mysql_query($query);
	}
	
	function deleteBook($id){
		$query = "	DELETE FROM `books` 
					WHERE 	`id` 	= '$id'";
					
		mysql_query($query);
	}
	
	function getBooks()
	{
		$books = array();
		
		$query = "	SELECT `id`,`title`,`intro`,`creator`,`date_created` 
					FROM `books`
					ORDER BY `id`
					DESC";
		
		$sql = mysql_query($query);
		
		while($book = mysql_fetch_assoc($sql) )
		{
			$books[] = $book;
		}
		
		return $books;
	}
	
	function getBook($id){
		$query = "	SELECT `id`,`title`,`intro`,`creator`,`date_created`
					FROM `books`
					WHERE `id` = '$id'";
					
		$sql = mysql_query($query);
		
		$book = mysql_fetch_assoc($sql);
		
		return $book;
	}
	
	function reviseBook($id,$title,$intro,$creator){
	
		$title 		= mres($title);
		$intro 		= mres($intro);
		$creator	= mres($creator);
		
		$query = "	UPDATE `books`
					SET	
					`title` 	= '$title',
					`intro` 	= '$intro',
					`creator`	= '$creator'
					WHERE `id` 	= '$id'";
		
		mysql_query($query);
	}
?>