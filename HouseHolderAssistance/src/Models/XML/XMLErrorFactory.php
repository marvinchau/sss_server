<?php

namespace Models\XML;

class XMLErrorFactory
{
	const ERR_XML_UNKNOW		= 3001;
	const ERR_XML_NOT_FOUND 	= 3002;
	const ERR_XML_IS_EXIST		= 3003;
	const ERR_XML_READ_FAIL		= 3004;
	const ERR_XML_WRITE_FAIL	= 3005;
	const ERR_XML_COPY_FAIL		= 3006;
	const ERR_XML_DEL_FAIL		= 3007;
	const ERR_XML_ATTR_NOT_FOUND= 3008;
	const ERR_XML_CHILD_NOT_FOUND= 3009;
	
	
	public static function getError($selErr, $customerMsg = "")
	{

		$json = null;
		switch($selErr)
		{
			case self::ERR_XML_UNKNOW:
				$json['body']["error_msg"] = "Unknown Error";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_XML_NOT_FOUND:
				$json['body']["error_msg"] = "Parse XML Error";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_XML_IS_EXIST:
				$json['body']["error_msg"] = "File is exist";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_XML_READ_FAIL:
				$json['body']["error_msg"] = "Read file fail";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_XML_WRITE_FAIL:
				$json['body']["error_msg"] = "Write file fail";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_XML_COPY_FAIL:
				$json['body']["error_msg"] = "Copy file fail";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_XML_DEL_FAIL:
				$json['body']["error_msg"] = "Delete file fail";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_XML_ATTR_NOT_FOUND:
				$json['body']["error_msg"] = "XML Attribute not found";
				$json['body']["result"] = $selErr;
				break;
			case self::ERR_XML_CHILD_NOT_FOUND:
				$json['body']["error_msg"] = "XML Child element not found";
				$json['body']["result"] = $selErr;
				break;
			default:
				$json['body']["error_msg"] = "Unknown Error";
				$json['body']["result"] = self::ERR_XML_UNKNOW;
				break;
		}
		

		$json['body']["customer_msg"] = $customerMsg;
		return $json;
	}
}