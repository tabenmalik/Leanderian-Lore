<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Leanderian Lore</title>
	
	<link type="text/css" rel="stylesheet" href="booklet/jquery.booklet.latest.css" />
	
	<link rel="icon" type="image/ico" href="favicon.ico"/>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
	<script> window.jQuery || document.write('<script src="booklet/jquery-2.1.0.min.js"><\/script>') </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
	<script> window.jQuery.ui || document.write('<script src="booklet/jquery-ui-1.10.4.min.js"><\/script>') </script>
    <script src="booklet/jquery.easing.1.3.js"></script>
    <script src="booklet/jquery.booklet.latest.js"></script>
	
	
</head>
	
<body>

			


<div id="main">

	<div id="mybook">
		<div title="first page">
			<h3>Stuff</h3>
		</div>
		<div>
			<h3>More Stuff</h3>
		</div>
		<div>
		<h3>Even More Stuff</h3>
		</div>
		<div>
			<h3>Too Much Stuff</h3>
		</div>
	</div>
	
	<input id="clicker" type="submit" />
	
	
</div>


<script>
	
	$(document).ready(function(){
		$("#mybook").booklet({ pageNumbers: false});
		
		$("#clicker").on("click", function(){
			$.ajax({
				url: "newPage.html",
			}).done(function(html){
				$("#mybook").booklet("add", "end", html);
			});
		});
	});
	
</script>
</body>
</html>