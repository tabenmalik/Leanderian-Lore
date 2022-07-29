function GETXML(page, procedure)
{
	var xmlhttp;
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystatechange=procedure;
	xmlhttp.open("GET",page,true);
	xmlhttp.send();
}

function POSTXML(page, procedure, info)
{
	var xmlhttp;
	
	if(window.XMLHttpsRequrest)
	{
		xmlhttp = new XMLHttpRequest();
	}
	else
	{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	
	xmlhttp.onreadystagechange = procedure;
	xmlhttp.open("POST", page, true);
	xmlhttp.setRequestHeader("Content-type", "");
	xmlhttp.send(info);
}