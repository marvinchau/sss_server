<?php

namespace Database\DBHandler;

class DBConfigFactory
{


	const PRIMARY 	= 1;



	public static function getConfig($selDB)
	{

		$config = null;
		switch($selDB){
			case self::PRIMARY:
				$config = new DBConfig(
				DB_DRIVER,
				DB_HOST,
				DB_PORT,
				DB_NAME,
				DB_USER,
				DB_PASSWORD
				);
				break;
		}
		return $config;
	}


}