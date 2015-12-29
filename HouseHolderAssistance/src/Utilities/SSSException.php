<?php



namespace Utilities;

use Utilities\ErrorFactory;
use \Exception;

class SSSException extends Exception
{

	public function __construct($code)
	{
		$error =  ErrorFactory::getError($code);

		parent::__construct($error["err_msg"], $code, null);

	}

	// custom string representation of object
	public function __toString() {
		return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
	}

	public function getError()
	{
		return ErrorFactory::getError($this->code);
	}

	}