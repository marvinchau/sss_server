<?php



namespace Models\XML;

use \Exception;

class XMLException extends Exception
{
	
// 	// Redefine the exception so message isn't optional
// 	public function __construct($message, $code = 0, Exception $previous = null) {
// 		// some code
	
// 		// make sure everything is assigned properly
// 		parent::__construct($message, $code, $previous);
// 	}
	
	private $customerMsg = "";
	
	public function __construct($code, $customerMsg = "")
	{
		$error =  XMLErrorFactory::getError($code);
		$this->_customerMsg = $customerMsg;
		parent::__construct($error['body']["error_msg"], $code, null);

	}
	
	// custom string representation of object
	public function __toString() {
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}
	

	public function getError()
	{
		return XMLErrorFactory::getError($this->code, $this->_customerMsg);
	}
	
}