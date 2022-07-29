<?php 

class Settings
{
    public $LoggingDir;
	public $MySQLUser;
	public $MySQLPassword;
	public $MySQLDatabase;
    
    public function __construct()
    {
        $this->LoggingDir = $DIR_PATH."core/_Logs/";
    }
}

$Settings = new Settings();
