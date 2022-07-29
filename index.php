<?php
	$VISITOR = $_SERVER['REMOTE_ADDR'];
	$DATE = date('Y-m-d');
	
	$connect_error = 'Sorry we\'re are experiencing connection problems';
	mysql_connect( '', 'root', 'ri1bbpQs') or die($connect_error);
	mysql_select_db('kBlog') or die($connect_error);
	
	$query = "INSERT INTO `views` (`date`, `ip`) VALUES (\"".$DATE."\", \"".$VISITOR."\")";
	
	mysql_query($query);
?>
<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Leanderian Lore</title>
	
	<link type="text/stylesheet" rel="stylesheet" href="structure" />
	<link type="text/stylesheet" rel="stylesheet" href="test.css" />
	
	<link rel="icon" type="image/ico" href="favicon.ico"/>
</head>
	
<body>
	<table id="structure">
	<tr id="top">
		<td class="left">
			<div>
			</div>
		</td>
		<td class="center">
		<div id="header">
			<img id="logo" alt="Leanderian Lore Logo" src="Presentation1.gif" />
		</div>
		</td>
		<td class="right">
		<div>
		
		</div>
		</td>
	</tr>
			
	<tr id="center">
		<td class="left">
		<div>
		</div>
		</td>
		<td class="center">
		<div id="main">
			<h1>Fixing flux capacitor...</h1>
			<p>We are currently duct taping together a new version of this site.
				Please stay tuned for a public release of leanderianlore.com in (hopefully) two months.
				This new version will include cooler graphics (ooooh so cool Taben), more cooler graphics (ok we get it. cool graphics),
				a regularly updated Joke of the Week, absolutely no accommodations for Internet Explorer users (beware IE users. this site
				will not be available to you), and most importantly no more registration to access the Golden material of Leanderian Lore
				and other various stories. 
				
				Sorry for the inconvenience for the maintenance but thank you for staying with us...except for IE users. Go away IE users.
			</p>
			
			<div class="divider">
			</div>
			
			<h2>BIG UPDATE June 17 2015</h2>
			<p>
				First off, sorry I haven't posted an update in a while. Leanderian Lore is still making progress, but we have taken a different direction.
				A month ago the small group of dedicated, and talented, volunteers of Leanderian Lore finally sat together in one room to discuss the future
				of Leanderian Lore. Collectively, we decided to go all out on the new design of the website. This new envision of the site is not an update,
				but the remodelling of Leanderian Lore The Website. We are starting from the bottom again to professionally document, create, and implement
				our new site and create a professional and interactive site comparable to a high budget designer.
				<br />
				<br />
				Thank you for your patience, and I will continue to post updates at least monthly.
				<br />
				Taben Malik
			</p>
			
			<div class="divider">
			<h2>UPDATE Apr. 14 2015</h2>
			<p>
				Still working on the Contact Page. The reason for taking so long on a simple page is that I am switching the means of how the page functions.
				Unfortunately this is all background stuff that doesn't precisely affect the users but it helps to make a dynamic page.
				For the users who are really interested, this is what I am doing:</br>
				</br>
				Originally all errors shown to the users were done by PHP which is a programming language on the server where the website is hosted. Meaning
				that every time you entered in a form wrong and I wanted to show you some errors, the browser has to reload the page run the code again and send
				you the new page with errors. Although Leanderian Lore is not a heavy traffic site, having to reload for every change in a page takes up more time
				and more server resources. Instead the errors can be calculated client-side, or where the web page is such as your desktop right now, and then 
				it doesn't have to ask the server for a new page request every time it wants to change. That would take Javascript which is a client side language.
				To take this even further, I can (and probably will) use AJAX (asynchronous Javascript and XML) which allows me to request information from the server
				or the database on the server without having to reload the whole page. A great example for this is Google Maps.
			</p>
			
			<div class="divider">
			</div>
			
			<h2>UPDATE Apr. 9 2015</h2>
			<p>
				Implementing the new design to the current pages. This isn't a whole lot of work since the structure
				is now pieced together, and the design was made months ago, so all I have to do is write two lines of code for each page and it becomes the
				full page. The content for each page is already there too, so no changing that. Fixing a few style bugs
				to the about page. The harder work will come later  with the dramatic change of how users will read the
				stories (it will look like a book where you actually flip the page) and when I make the website portal for
				Kameron.</br></br>
				
				+ Joke of the Week page now has the new design</br>
				+ contact page now has the new design</br>
				+ about page has the new design</br>
				* currently working on the scripting for the contact page</br>
			</p>
			
			<div class="divider">
			</div>
			
			<h2>UPDATE Apr. 7 2015</h2>
			<p>
				Worked on breaking down the website into units. Breaking into units is beneficial to me
				as I can just implement new elements of the same type of unit. For instance this site
				works similarly to a blog. Every post has the same format and look only with different text.
				So instead of re-writing code every time Kameron makes a new post, it is easier if I can generalize
				the format so that I only write the code to display a blog post once but then just implement
				that code for every post.
			</p>
			
			<div class="divider">
			</div>
			
			<h2>UPDATE Apr. 4 2015</h2>
			<p>
				I have added to the database the underlying structure for traffic monitoring. It is very rudimentary.
				Currently I am only taking of note of the date when a visitor views a page (not date and time) and their
				IP address. For now this gives me just some basic numbers of the amount of views the website gets. But this
				limits me by not being able to tell where they are looking in the site and more specifically when in the day.
				I think those functions will be for a later day.
			</p>
			
			<div class="divider">
			</div>
			
			<h2>UPDATE Apr. 4 2015</h2>
			<p>
				First thing's first: fix the time. The server on which the website runs on has had
				the incorrect time since the beginning. It always bothered me, but it was rather unimportant
				for any functions of the original site. For 2.0 I am adding in statistics and traffic tracking
				so I can see how many people are checking out the site. This made it imperative that the server
				knew the correct time. So now next step is to create the base in collecting views/hits.
			</p>
		</div>
		</td>
				
		<td class="right">
		<div>
		</div>
		</td>
	</tr>

	<tr id="bottom">
			
		<td class="left">
		<div>
		</div>
		</td>
				
		<td class="center">
		<div>
		</div>
		</td>
				
		<td class="right">
		<div>
		</div>
		</td>
				
	</tr>
	</table>
			
<script>
function navFix() {
    var i, navUnit, width, image, nav, navHeight, topCenterEdge, cellHeight;
    for (i = 0; i < 4; i = i + 1) {
        navUnit = document.getElementsByClassName("navUnit")[i];
        width = navUnit.getElementsByTagName("a")[0].offsetWidth;

        image = navUnit.getElementsByTagName("img")[0];
        image.style.width = width + 'px';
        image.style.height = '1.7em';
    }

    nav = document.getElementById("nav");
    navHeight = nav.offsetHeight;

    topCenterEdge = document.getElementById("header");
    cellHeight = topCenterEdge.offsetHeight;

    nav.style.marginTop = (cellHeight - navHeight - 3) + 'px';
}

function shift() {
    this.style.top = '3px';
    this.style.left = '-3px';
}

function unShift() {
    "use strict";
    this.style.top = '0px';
    this.style.left = '0px';
}

function eventListeners() {
    var i, navUnit;
    for (i = 0; i < document.getElementsByClassName("navUnit").length; i = i + 1) {
        navUnit = document.getElementsByClassName("navUnit")[i];
        navUnit.onmouseover = shift;
        navUnit.onmouseout = unShift;
    }
}

function loader() {
    navFix();
    eventListeners();
}

window.onload = loader;
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-64316026-1', 'auto');
  ga('send', 'pageview');

</script>
</body>
</html>