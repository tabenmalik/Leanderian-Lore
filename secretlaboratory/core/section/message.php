<div class="message">
<h2 class="messagetitle"><?php echo $message['title']; ?></h2>
<p><?php echo $message['body']; ?></p>
<?php if($message['type'] != 2){ ?>
<form action="" method="post">
	<input type="submit" name="<?php echo $message['id']?>" value="Read"/>
</form>
<?php } ?>
</div>