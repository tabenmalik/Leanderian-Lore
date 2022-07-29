<?php

class SysLogger
{
	public $ProcessID;
	public $RandomNumber;
	public $Settings;
	public $SysLogName = "SystemLog";
	public $ErrorLogName = "ErrorLog";
	public $QueryLogName = "QueryLog";
	
	public function __construct($s)
	{
		$this->Settings = $s;
		
		if (!empty($_SERVER['HTTP_CLIENT_IP']))
		{
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} 
		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) 
		{
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		}
		else
		{
			$ip = $_SERVER['REMOTE_ADDR'];
		}
		
		$this->ProcessID = $ip;
		
		$this->RandomNumber = rand();
	}
	
	//inserts a message into a specified file
	public function InsertLog($FilePath, $Message)
	{		
		$File = fopen($FilePath, "a");
		if(!$File)
		{
			throw new Exception("Can not create log");
		}
		fwrite($File, $Message."\n");
		fclose($File);
	}
	
	//Inserts message to System log
	public function InsertSystemLog($Message)
	{
		//File path for System Log
        $FilePath = $this->Settings->LoggingDir . $this->DateString() . " " . $this->SysLogName . ".txt";
		
		//Adds trace stamp to message
		$Message = $this->AddTraceStamp($Message);
		
		//Inserts to log
        $this->InsertLog($FilePath, $Message);
	}
	
	//Inserts message to Error log
	public function InsertErrorLog($Message)
	{
		//File path for Error Log
		$FilePath = $this->Settings->LoggingDir . $this->DateString() . " " . $this->ErrorLogName . ".txt";
		
		//Adds Trace information to the message
		$Message = $this->AddTraceStamp($Message);
		
		//Inserts into ErrorLog
		$this->InsertLog($FilePath, $Message);
	}
	
	//Inserts message to query log
	public function InsertQueryLog($Message)
	{
		//File path for Query Log
		$FilePath = $this->Settings->LoggingDir . $this->DateString() . " " . $this->QueryLogName . ".txt";
		
		//Adds Trace information to the message
		$Message = $this->AddTraceStamp($Message);
		
		//Inserts message to Query Log
		$this->InsertLog($FilePath, $Message);
	}
	
	//Logs message to System and Error Log
	public function InsertSystemAndError($Message)
	{
		$this->InsertSystemLog($Message);
		$this->InsertErrorLog($Message);
	}
	
	//Logs message to System and Query Log
	public function InsertSystemAndQuery($Message)
	{
		$this->InsertSystemLog($Message);
		$this->InsertQueryLog($Message);
	}
	
	//Logs message to all logs
	public function InsertAll($Message)
	{
		$this->InsertSystemLog($Message);
		$this->InsertErrorLog($Message);
		$this->InsertQueryLog($Message);
	}
	
	//adds a timestamp and unique stamp for tracing purposes
	public function AddTraceStamp($Message)
	{
		$timestamp = $this->TimeStamp();
		$ThreadStamp = $this->ThreadStamp();
		
		$Message = $timestamp . " : " . $ThreadStamp . " : " . $Message;
		
		return $Message;
	}
    
	//generates a pseudo unique stamp for tracing purposes
	public function ThreadStamp()
	{
		$ThreadStamp = "[Unique ID " . $this->ProcessID . ":" . $this->RandomNumber ."]";
		
		return $ThreadStamp;
	}
	
	//generates a timestamp for logs
	public function TimeStamp()
	{
		$CurrentTime = getdate();
		
		$dateString = $this->DateString();
		$hour       = str_pad($CurrentTime["hours"],2,"0",STR_PAD_LEFT);
		$minute     = str_pad($CurrentTime["minutes"],2,"0",STR_PAD_LEFT);
		$second     = str_pad($CurrentTime["seconds"],2,"0",STR_PAD_LEFT);
		
		$timestamp = "[$dateString $hour:$minute:$second]";
		
		return $timestamp;
	}
	
	//creates a date string in the format of yyyy-mm-dd
	public function DateString()
	{
		$CurrentTime = getdate();
			
		$year       = $CurrentTime["year"];
		$month      = str_pad($CurrentTime["mon"],2,"0",STR_PAD_LEFT);
		$day        = str_pad($CurrentTime["mday"],2,"0",STR_PAD_LEFT);
		
		$dateString = "$year-$month-$day";
		
		return $dateString;
	}
}

$Logger = new SysLogger($Settings);














