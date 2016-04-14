<?php


namespace Database\DBHandler;

class DBConfig
{

	private $_driver;
	private $_dbName;
	private $_dbHost;
	private $_dbUserName;
	private $_dbPsd;
	private $_dbPort;



	public function __construct()
	{
		$this->_driver 		= DB_DRIVER;
		$this->_dbName 		= DB_NAME;
		$this->_dbHost 		= DB_HOST;
		$this->_dbUserName 	= DB_USER;
		$this->_dbPsd 		= DB_PASSWORD;
		$this->_dbPort 		= DB_PORT;
	}

	public function getDriver()
	{
		return $this->_driver;
	}

	public function getDBName()
	{
		return $this->_dbName;
	}

	public function getDBHost()
	{
		return $this->_dbHost;
	}

	public function getDBPort()
	{
		return $this->_dbPort;
	}

	public function getDBUserName()
	{
		return $this->_dbUserName;
	}

	public function getDBUserPassword()
	{
		return $this->_dbPsd;
	}

}