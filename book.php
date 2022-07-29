<?php 
	include_once 'core/init.php';
	protect($user_data);
	adminProtect($user_data);
	
	if(!isset($_GET['id']))
	{
		header('Location: archive.php');
		die();
	}
?>

<?php include_once 'core/section/overall/head.php'; ?>

<?php include_once 'core/section/overall/foot.php'; ?>