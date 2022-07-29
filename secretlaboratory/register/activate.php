<?php
	$PAGE = 'register_activate';
	$DIR_PATH = '../';
	
	require_once $DIR_PATH.'core/init/maininit.php';
	protect();
	adminProtect();
	
	if(!isset($_GET['ac'])){
		header('Location: '.$DIR_PATH);
	}
	
	$ac = $_GET['ac'];
	
	activateUser($ac);
?>

<?php require_once $DIR_PATH.'core/section/overall/head.php'; ?>

	<h1>Success!</h1>
	<p>A new Leanderian has been added to your great sovereign</p>
	<p><a href="<?php echo $DIR_PATH; ?>account">Return to account board</a></p>


<?php require_once $DIR_PATH.'core/section/overall/foot.php'; ?>