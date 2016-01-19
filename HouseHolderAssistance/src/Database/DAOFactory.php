<?php

namespace Database;



abstract class DAOFactory
{
	
	
	const USER = 1;
	const DEVICE = 2;
	const DEVICE_REPORT = 3;
	const STUDENT = 4;
	const STUDENT_CLASS = 5;
	const SAFETY_PLACE = 6;
	const NOTIFICATION = 7;
	const ATTENDENCE = 8;

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
			case self::DEVICE_REPORT:
				$dao = new DeviceReportDAO();
				break;
			case self::STUDENT:
				$dao = new StudentDAO();
				break;
			case self::STUDENT_CLASS:
				$dao = new StudentClassDAO();
				break;
			case self::SAFETY_PLACE:
				$dao = new SafetyPlaceDAO();
				break;
			case self::NOTIFICATION:
				$dao = new NotificationDAO();
				break;
			case self::ATTENDENCE:
				$dao = new NotificationDAO();
				break;
		}
		return $dao;
		
	}
	
	
}