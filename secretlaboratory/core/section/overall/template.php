<!DOCTYPE HTML>

<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Leanderian Lore</title>
	
	<link type="text/stylesheet" rel="stylesheet" href="structure" />
	<link type="text/stylesheet" rel="stylesheet" href="test.css" />
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
	<table id="structure">
	<tr id="top">
		<td class="left">
			<div>
			</div>
		</td>
		<td class="center">
		<div id="header">
			<img id="logo" alt="Leanderian Lore Logo" src="Presentation1.gif" />
			<table id="nav">
			<tr>
				<td class="navUnit"><img alt="" src="bookmark2.gif"/><a class="blocklink" href="http://www.leanderianlore.com/secretlaboratory/core/section/overall/template">Lore</a></td>
				<td class="divider"></td>
				<td class="navUnit"><img alt="" src="bookmark2.gif"/><a class="blocklink" href="http://www.google.com">Library</a></td>
				<td class="divider"></td>
				<td class="navUnit"><img alt="" src="bookmark2.gif"/><a class="blocklink" href="http://www.google.com">JOTW</a></td>
				<td class="divider"></td>
				<td class="navUnit"><img alt="" src="bookmark2.gif"/><a class="blocklink" href="http://www.google.com">About</a></td>
			</tr>
			</table>
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
			<div id="socialmedia">
				<div class="googlepluslink sociallink">
					<img src="googlepluslogo.png">
				</div>
				
				<div class="twitterlink sociallink">
					<img src="twitterlogo.png">
				</div>
				
				<div class="facebooklink sociallink">
					<img src="fblogo.png">
				</div>
			</div>
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
	$(function () {
		$("#mybook").booklet({ pageNumbers: false });
	});
	
</script>
</body>
</html>