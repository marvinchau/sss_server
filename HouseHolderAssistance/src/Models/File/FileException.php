<?php



namespace Models\File;

use \Exception;

class FileException extends Exception
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
		$error =  FileErrorFactory::getError($code);
		$this->_customerMsg = $customerMsg;
		parent::__construct($error['body']["error_msg"], $code, null);

	}
	
	// custom string representation of object
	public function __toString() {
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}
	

	public function getError()
	{
		return FileErrorFactory::getError($this->code, $this->_customerMsg);
	}
	
}