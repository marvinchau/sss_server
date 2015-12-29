<?php

namespace Utilities;

class ErrorFactory
{

	const ERR_UNKNOWN 						= 9000;
	const ERR_INVALID_ACTION				= 9001;
	const ERR_MISSING_PARAMETERS 			= 9002;
	const ERR_RECORD_NOT_FOUND 				= 9003;
	const ERR_RECORD_IS_EXIST 				= 9004;
	
	const ERR_DB_EXECUTE					= 8001;
	const ERR_DB_INVALID_RESULT				= 8002;
	
	const LOGIN_FAIL_INVALID_USER			= 1001;
	const LOGIN_FAIL_DEVICE_UPDATE_FAIL		= 1002;
	
	
	public static function getError($selErr)
	{

		$json['result'] = 'fail';
		$json['err_code'] = $selErr;
		
		switch($selErr)
		{
			/******** Common Fail ********/
			case self::ERR_UNKNOWN:
				$json["err_msg"] = "Unknown Error";
				break;
			case self::ERR_INVALID_ACTION:
				$json["err_msg"] = "Invalid Action";
				break;
			case self::ERR_MISSING_PARAMETERS:
				$json["err_msg"] = "Missing Parameters";
				break;
			case self::ERR_RECORD_NOT_FOUND:
				$json["err_msg"] = "Record Not Found";
				break;
			case self::ERR_RECORD_IS_EXIST:
				$json["err_msg"] = "Record is exist";
				break;
			
			/******** Database Error *******/
			case self::ERR_DB_EXECUTE:
				$json["err_msg"] = "Database Execution Error";
				break;
			case self::ERR_DB_INVALID_RESULT:
				$json["err_msg"] = "Database Return Unexpected Result";
				break;
			/******* Login Fail *********/
			case self::LOGIN_FAIL_INVALID_USER:
				$json["err_msg"] = "Invalid User Name or Password";
				break;
			case self::LOGIN_FAIL_DEVICE_UPDATE_FAIL:
				$json["err_msg"] = "Cannot update user device record";
				break;
			default:
				$json["err_msg"] = "Unknown Error";
				$json["err_code"] = self::ERR_UNKNOWN;
				break;
		}
		
		return $json;
	}
}