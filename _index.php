<?php
$DIR_PATH = "";

require_once $DIR_PATH . "core/_App_Start/App_Start.php";
//$Settings
//$Logger
$Logger->InsertAll("Application Started");
$Logger->InsertSystemLog("On Home page. Adding home controller.");
require_once $DIR_PATH . "core/_Controllers/HomeController.php";

?>