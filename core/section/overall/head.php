<!DOCTYPE HTML>
<html>
	<?php include_once 'core/section/head.php'; ?>
	
	<body>
		<table id="structure">
		
			<tr id="top">
				<td colspan="2">
					<?php
						if(loggedIn())
						{
							include_once 'core/section/header.php';
						}
					?>
				</td>
			</tr>
			
			<tr id="center">
				<td id="left">
					<div id="main">