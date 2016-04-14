<?php

namespace Models\File;

class FileErrorFactory
{
	const ERR_FILE_UNKNOW		= 2001;
	const ERR_FILE_NOT_FOUND 	= 2002;
	const ERR_FILE_IS_EXIST		= 2003;
	const ERR_FILE_READ_FAIL	= 2004;
	const ERR_FILE_WRITE_FAIL	= 2005;
	const ERR_FILE_COPY_FAIL	= 2006;
	const ERR_FILE_DEL_FAIL		= 2007;
	
	
	public static function getError($selErr, $customerMsg = "")
	{

		$json = null;
		switch($selErr)
		{
			case self::ERR_FILE_UNKNOW:
				$json['body']["error_msg"] = "Unknown Error";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_FILE_NOT_FOUND:
				$json['body']["error_msg"] = "File not found";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_FILE_IS_EXIST:
				$json['body']["error_msg"] = "File is exist";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_FILE_READ_FAIL:
				$json['body']["error_msg"] = "Read file fail";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_FILE_WRITE_FAIL:
				$json['body']["error_msg"] = "Write file fail";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_FILE_COPY_FAIL:
				$json['body']["error_msg"] = "Copy file fail";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_FILE_DEL_FAIL:
				$json['body']["error_msg"] = "Delete file fail";
				$json['body']["result"] = $selErr;
				break;
			default:
				$json['body']["error_msg"] = "Unknown Error";
				$json['body']["result"] = self::ERR_FILE_UNKNOW;
				break;
		}
		

		$json['body']["customer_msg"] = $customerMsg;
		return $json;
	}
}