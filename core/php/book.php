<?php

	$secret_chapter = array(
		"id" => 0,
		"chap_num" => 0,
		"title" => "The Secret Chapter",
		"content" =>	"     This story is one of the many interpretations of how this website came to be. Nobody knows if it is the true account of the site. But no matter how the story is told, the website still exists. It starts off in the early years, before the times of sharing stories around the dim glow of a monitor. It was all started by Sir Golden...
							
						     Sir Golden was a well rounded man. The amount of food that he consumed could probaly
						explain this phenomenom. He was also very adept in a variety of skills and tasks. Sir Golden's
						Irish accent was the standard dialect around the world...yet he was not born in Ireland.
						Sir Golden traveled a lot. To the likes of the Little Theatre, down to the Drama Room,
						occasionally into the PAC Auditorium, and always roaming The Halls. He had many great
						adventures travel back and forth, and ",
		"author" => "The Ninja",
		"date_posted" => "0000-00-00 00:00:00");
	
	function chapterTitleExists($book_id, $title)
	{
		
		$book_id	= (int)$book_id;
		$title 		= mres($title);
		
		$query 		= "	SELECT COUNT(1) FROM `chapters` 
						WHERE `title` = '$title'
						AND `book_id` = '$book_id'";
		$sql		= mysql_query($query);
		
		return(mysql_result($sql, 0) == '0') ? false:true;
	}

	function addChapter($book_id, $chap_num, $title, $content,$author){
		
		$book_id	= (int)$book_id;
		$chap_num	= (int)$chap_num;
		
		$title 		= htmlentities($title);
		$title		= mres($title);
		
		$content 	= htmlentities($content);
		$content 	= mres($content);
		
		$date = date('Y\-m\-d');
		
		$query = "INSERT INTO `chapters` SET
						`book_id`		= '{$book_id}',
						`chap_num` 		= '{$chap_num}',
						`title` 		= '{$title}',
						`content` 		= '{$content}'";
						
		if( !empty($author)){
			$author		= htmlentities($author);
			
			$query = $query.",`author` = '$author'";
		}
		
		$query = $query.",`date_posted` 	= '$date'";
						
		mysql_query($query);
	}
	
	function getChapter($book_id=null,$chapter_id=null) 
	{
	
		if(isset($book_id,$chapter_id))
		{
			$query 	= "	SELECT 	`id`,`book_id`,`chap_num`,`title`,`content`, `author`, `date_posted`
						FROM 	`chapters`
						WHERE 	`book_id` 	= '$book_id'
						AND 	`id` 		= '$chapter_id'";
		}
		else if(isset($chapter_id))
		{
			$query = "	SELECT 	`id`,`book_id`,`chap_num`,`title`,`content`, `author`, `date_posted`
						FROM 	`chapters`
						WHERE 	`id` 		= '$chapter_id'";
		}
		else
		{
			$query 	= "	SELECT 	`id`,`book_id`,`chap_num`, `title`, `content`, `author`,`date_posted` 
						FROM 	`chapters` 
						ORDER BY id 
						DESC 
						LIMIT 1";
		}
		$sql 	= mysql_query($query);
		$chapter = mysql_fetch_assoc($sql);
		
		if(empty($chapter))
		{
			global $secret_chapter;
			
			$chapter['id']=$secret_chapter['id'];
			$chapter['chap_num']=$secret_chapter['chap_num'];
			$chapter['title']=$secret_chapter['title'];
			$chapter['content']=$secret_chapter['content'];
			$chapter['author']=$secret_chapter['author'];
			$chapter['date_posted']=$secret_chapter['date_posted'];
		}
		$chapter['content'] = stripslashes($chapter['content']);
		
		return $chapter;
	}
	
	function getChapters($book_id=null) 
	{
		$chapters = array();
		
		if( isset($book_id) )
		{
			$query = "	SELECT `id`,`book_id`,`chap_num`,`title`,`content`,`author`,`date_posted`
						FROM `chapters`
						WHERE `book_id` = '$book_id'
						ORDER BY `id`
						ASC";
		}else{
			$query = "	SELECT `id`,`book_id`,`chap_num`,`title`,`content`,`author`,`date_posted` 
						FROM `chapters`
						ORDER BY `id`
						ASC";
		}
		
		$sql = mysql_query($query);
		
		while($row = mysql_fetch_assoc($sql) ){
			$chapters[] = $row;
		}
		
		return $chapters;
	}
	
	function reviseChapter($id,$chap_num,$title,$content,$author)
	{
		
		$title 		= mres($title);
		$content 	= mres($content);
		$author		= mres($author);
		
		$query	=	"	UPDATE `chapters`
						SET	`chap_num` 	= '$chap_num',
							`title` 	= '$title',
							`content`	= '$content',
							`author`	= '$author'
						WHERE `id` = '$id'";
		
		mysql_query($query);
		
	}
	
	function deleteChapter($book_id,$chapter_id) 
	{
		$query = "	DELETE FROM `chapters` 
					WHERE 	`book_id` 	= '$book_id'
					AND 	`id` 		= '$chapter_id'";

		mysql_query($query);
	
	}
?>