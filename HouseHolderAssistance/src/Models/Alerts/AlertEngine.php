<?php

namespace Models\Alerts;

interface AlertEngine
{
	
	public function sendAlert(Alert $alert);
	
}

