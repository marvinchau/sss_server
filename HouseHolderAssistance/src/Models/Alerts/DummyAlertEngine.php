<?php

namespace Models\Alerts;

class DummyAlertEngine implements AlertEngine
{
	
	

	public function sendAlert(Alert $alert)
	{
		
		echo $alert->getAlert();
		
	}
}