<?php
	
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
	
	function addBook($title,$intro)
	{
		$title = htmlentities($title);
		$intro = htmlentities($intro);
		$intro = str_replace(' ', '&nbsp',$intro);
		$title = mres($title);
		$intro = mres($intro);
		
		$query = "INSERT INTO `books` SET
						`title` = '{$title}',
						`intro` = '{$intro}'";
						
		mysql_query($query);
	}
	
	function getBooks()
	{
		$books = array();
		
		$query = "	SELECT `id`,`title`,`intro` 
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

	include_once 'core/functions/book.php';
?>