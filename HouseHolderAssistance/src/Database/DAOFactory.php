<?php

namespace Database;

use Database\BasicDAO;
use Database\DBHandler\DBConfigFactory;

abstract class DAOFactory
{
	
	
	const USER = 1;
	const DEVICE = 2;

	public static function getDAO($selDao)
	{

		$dao = null;
		switch($selDao){
			case self::USER:
				$dao =  new UserDAO();
				break;
			case self::DEVICE:
				$dao =  new DeviceDAO();
				break;
		}
		return $dao;
		
	}
	
	
}