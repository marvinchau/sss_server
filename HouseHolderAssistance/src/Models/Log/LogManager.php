<?php

namespace Models\Log;

use Models\File\FileManager;
use Models\File\FileException;
class LogManager
{
	
	
	private static $_instance = null;
	private $_fileManager = null;
	

	private function __construct(){}
	
	public static function getInstance()
	{
		if(self::$_instance == null)
		{
			self::$_instance = new LogManager();
			
			self::$_instance->_fileManager = new FileManager();
			self::$_instance->_fileManager->createDir(AWS_LOG_DIR, 0777, true);
			
			
		}
		return self::$_instance;
	}
	
	public function log(\Datetime $date, $title, $message)
	{
		//Prepare

		$now = new \DateTime();
		$filename = AWS_LOG_DIR . "log". $now->format('Y-m-d').".txt";
		
		$logformat = "%19s:[%10s] [%s]";
		
// 		$fileManager = new FileManager();
		try{
			if(!($this->_fileManager->isFile($filename))){
				$this->_fileManager->createFile($filename, 0777);
			}
			$this->_fileManager->fileWrite($filename, sprintf($logformat, $date->format(DATE_FORMAT), $title, $message));
		}catch(FileException $fe)
		{
			var_dump( $fe->getError() );
			echo "fail during write log";
		}
	
	}
	
	public function logRecoery(\Datetime $date, $title, $message)
	{
		//Prepare
	
		$now = new \DateTime();
		$filename = AWS_LOG_DIR . "log". $now->format('Y-m-d')."recovery.txt";
	
		$logformat = "%19s:[%10s] [%s]";
	
		// 		$fileManager = new FileManager();
		try{
			if(!($this->_fileManager->isFile($filename))){
				$this->_fileManager->createFile($filename, 0777);
			}
			$this->_fileManager->fileWrite($filename, sprintf($logformat, $date->format(DATE_FORMAT), $title, $message));
		}catch(FileException $fe)
		{
			var_dump( $fe->getError() );
			echo "fail during write log";
		}
	
	}
	
	
}