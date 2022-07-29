<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="Admin.css" />
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	</head>
	
	<body>
		<div class="wrapper">
		
			<div id="banner" class="fullLength">
				<h1 id="title">Leanderian Lore Admin Panel</h1>
			</div>
			
			<div id="navBarContainer" class="fullLength">
			
				<div id="nav">
					<ul>
						<li><a href="#Books">Books</a></li>
						<li><a href="#Admins">Admins</a></li>
						<li><a href="#Stats">Stats</a></li>
					</ul>
				</div>
			
			</div>
			
			<div id="contentContainer" class="fullLength">
				<div class="content">
				
				</div>
			</div>
		
			<div class="push"></div>
		</div>
		
		<footer>
			<p>Created by Taben Malik</p>
		</footer>
	</body>
</html>

<script>
	$(document).ready(function(){
		verticalCenter($("#title"), $("#banner"));
		verticalCenter($("#nav a"), $("#nav li"));
		verticalCenter($("footer p"), $("footer"));
	});
	
	//vertically centers an object inside of a given container
	function verticalCenter(innerObject, container)
	{
		var innerObjectHeight = innerObject.height();
		var outerObjectHeight = container.height();
		
		var offset = (outerObjectHeight/2)-(innerObjectHeight/2);
		
		innerObject.css("position","relative");
		innerObject.css("top", offset+"px");
	}
</script>