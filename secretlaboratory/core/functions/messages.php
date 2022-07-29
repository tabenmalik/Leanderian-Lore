<?php

/*Message Types:
	-1: All messages. Admin type
	0: request for activation. Admin type
	1: Conctact message. Admin Type
	2. Public announcement. Everyone.
*/

	function createMessage($title, $body, $type, $date){
		global $DIR_PATH;
		
		$query = "	INSERT INTO `messages`
					SET
					`title` 	= '$title',
					`body`		= '$body',
					`type` 		= '$type',
					`date`		= '$date'";
		
		mysql_query($query);
	}
	
	function getMessages($type){
	
		$messages = array();
		$query = "	SELECT `id`,`title`,`body`,`type`,`date`
					FROM `messages`";
					
		if($type === '-1'){
			$query = $query."WHERE `read` = 0
							ORDER BY `id`
							DESC";
		}else{
			$query = $query."WHERE `type` = '$type' AND `read` = 0
							ORDER BY `id`
							DESC";
		}
					
		$sql = mysql_query($query);
		
		while($message = mysql_fetch_assoc($sql) )
		{
			$messages[] = $message;
		}
		
		return $messages;
		
	}
	
	function messageRead($id){
		$query = "	UPDATE `messages`
					SET `read` = 1
					WHERE `id` = '$id'";
					
		mysql_query($query);
	}
?>