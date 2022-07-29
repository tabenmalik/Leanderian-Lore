<?php
	$connect_error = 'Sorry we\'re are experiencing connection problems';
	mysql_connect( 'localhost', 'root', 'JCL3XGfxq') or die($connect_error);
	mysql_select_db('kBlog') or die($connect_error);
?>