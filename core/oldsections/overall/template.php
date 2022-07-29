<!DOCTYPE HTML>

<html>
	<head>
		<title>Leanderian Lore</title>

		<link type="text/stylesheet" rel="stylesheet" href="core/css/basic.css" />
	</head>
	
	<body>
		<table id="structure">
			<tr id="top">
				<td colspan="2">
					<header>
					<?php
						if(loggedIn())
						{
						?>
							<nav>
								<table>
									<tr>
										<td><a href="index.php"		>Lore</a></td>
										<td><a href="archive.php"	>Archive</a></td>
										<td><a href="about.php"		>About</a></td>
										<td><a href="contact.php"	>Contact</a></td>
										<td><a href="account.php"	>Account</a></td>
										<td><a href="logout.php"	>Logout</a></td>
									</tr>
								</table>
							</nav>
							
							<h1 id="logo">Leanderian Lore</h1>
						<?php
						}
						?>
					</header>
				</td>
			</tr>
			
			<tr id="center">
				<td id="left">
					<div id="main">
					
					</div>
				</td>
				
				<td id="right">
					<aside>
		
					</aside>
				</td>
			</tr>

			<tr id="bottom">
				<td colspan="2">
					<footer>
					<?php
						if(loggedIn())
						{
						?>
							<p>Any questions, comments, or suggestions? Please fill out <a href="contact.php">this form</a> and let us know!</p>
							<p><a href="about.php">Taben</a> snapped his fingers and said, "You are now with website..."</p>
						<?php
						}
					?>
					</footer>
				</td>
			</tr>
	</body>
</html>