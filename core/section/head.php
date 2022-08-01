<head>
	<?php include $DIR_PATH.'core/section/title.php'; ?>
	
	<!--imported files-->
	<!--stylesheets-->
	<link href='http://fonts.googleapis.com/css?family=Indie+Flower' rel='stylesheet' type='text/css'>
	<link type="text/css" rel="stylesheet" href="<?php echo $DIR_PATH; ?>core/css/reset.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $DIR_PATH; ?>core/css/structure.css" />
	<link type="text/css" rel="stylesheet" href="<?php echo $DIR_PATH; ?>core/css/style.css" />
	
	<?php
	if($PAGE == 'accountindex'){
	?>
		<link type="text/css" rel="stylesheet" href="<?php echo $DIR_PATH; ?>core/css/account.css" />
	<?php
	}else if($PAGE == 'jotw'){
	?>
		<link type="text/css" rel=stylesheet" href="<?php echo $DIR_PATH; ?>core/css/jotw.css" />
	<?php
	}
	?>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
	</script>
	
	<link rel="icon" type="image/ico" href="<?php echo $DIR_PATH; ?>core/images/favicon.ico"/>
</head>