<?php


namespace Models\Alerts;

class AlertManager
{
	
	private $_engine;
	
	public function __construct(AlertEngine $engine)
	{
		$this->_engine = $engine;
	}
	
	public function alert(Alert $alert)
	{
		$this->_engine->sendAlert($alert);
	}
	
}