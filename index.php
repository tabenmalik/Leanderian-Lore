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
				This new version will include cooler graphics (ooooh so cool Taben), more cooler graphics (ok we get. cool graphics),
				a regularly update Joke of the Week, absolutely no accommodations for Internet Explorer users (beware IE users. this site
				will not be available to you), and most importantly no more registration to access the Golden material of Leanderian Lore
				and other various stories. 
				
				Sorry for the inconvenience for the maintenance but thank you for staying with us...except to IE users. Go away IE users.
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
</body>
</html>