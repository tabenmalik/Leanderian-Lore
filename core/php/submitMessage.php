<?php
	require_once "connect.php";
	require_once "messages.php";
	
	
?>

<div id="contact_success" class="success">
	<p>Success!</p>
</div>

<script>
	var successMessage = document.getElementById('contact_success');
	var contactForm = document.getElementById('contact_form');
	
	contactForm.insertBefore(successMessage, contactForm.firstChild);
</script>