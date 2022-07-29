<?php
	//this is the contact index page
	
	$PAGE = 'contact_index';
	$DIR_PATH = '../';
	
	require_once $DIR_PATH.'core/section/visitorinformation.php';
	require_once $DIR_PATH.'core/section/overall/head.php';
?>
<form id="contact_form" onsubmit="submitMessage()">
	<h1>Contact Us</h1>
	<ul class="errors">
	</ul>
	Name:  <input id="contact_name" type="text" name="name"></br></br>
	Email: <input id="contact_email" type="text" name="email"></br></br>
	<textarea id="contact_message"autofocus name="message" cols="75" rows="25" placeholder="Please type your message here. I mean really where else would you type your message?"></textarea><br />
	<p>Who is this message for?</p>
	<select id="contact_to" name='to'>
		<option value="Author"		>Author</option>
		<option value="Webmaster"	>Webmaster</option>
	</select><br /><br />
	<input id="contact_submit" type="submit" name="contact" value="Leave A Message!"/>
<form>

<script>
	var num = 0;
	
	function showErrors(errors)
	{
		var errorList = document.getElementsByClassName("errors")[0];
		var existingErrors = Array.prototype.slice.call(errorList.childNodes);
		
		//check for existing errors and delete them
		var error;
		while(error = existingErrors.pop())
		{
			if(error.firstChild)
			{
				errorList.removeChild(error);
			}
		}
		
		for(i = 0; i < errors.length; i++)
		{
			var li = document.createElement("li");
			li.appendChild(document.createTextNode(errors[i]));
			errorList.appendChild(li);
		}
	}
	
	function messageSuccess()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status == 200)
		{
			
		}
	}
	function validateEmail(email)
	{
		var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
		return re.test(email);
	}
	
	function submitMessage(evt)
	{
		evt.preventDefault();
		
		var form = document.getElementById("contact_form");
		var name = form.getElementById("contact_name").value;
		var email = form.getElementById("contact_email").value;
		var message = form.getElementById("contact_message").value;
		var to = form.getElementById("contact_to").value;
		var errors = [];
		
		if(message == "" && num == 0)
		{
			//replace with error messages on the page
			errors.push("The message box is empty. Please do not waste the Admin's time with empty messages.");
			num += 1;
		}
		else if(message == "" && num >= 1)
		{
			//replace with error messages on the page
			errors.push("I have a very particular set of skills, skills I have acquired over a very long career. Skills that make me a nightmare for people like you. If you stop trying to send empty messages now, that'll be the end of it. I will not look for you, I will not pursue you. But if you don't, I will look for you, I will find you, and I will spam your ass.");
			num += 1;
		}
		
		if(name == "")
		{
			errors.push("Your name must be so short that I can't even see it. Please enter a name.");
		}
		else if(name.length>24)
		{
			errors.push("Your name is too long so I am going to nickname you Bob for now. Please enter a shorter name");
		}
		
		if(!validateEmail(email))
		{
			errors.push("You have an email. I know you do. Please enter a correct email. We will only use your email if it is necessary to email you back");
		}
		
		if(to == "")
		{
			errors.push("Well that's weird. You want to contact us but we are not sure who you are contacting. Please be sure to select who this message is going to");
		}
		
		if(errors.length > 0)
		{
			showErrors(errors);
		}
		else
		{
			
		}
	}
	
	document.getElementById("submit_button").addEventListener('click', submitMessage, false);
</script>
<?php 
	require_once $DIR_PATH.'core/section/overall/tail.php'; 
?>