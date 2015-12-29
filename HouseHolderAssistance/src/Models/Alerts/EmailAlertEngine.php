<?php

namespace Models\Alerts;

use Models\EmailModel\EmailManager;
use Models\EmailModel\Email;
class EmailAlertEngine implements AlertEngine
{

	private $_emailManager;
	
	
	public function __construct()
	{
		$this->_emailManager = new EmailManager();
	}
	
	
	public function sendAlert(Alert $alert)
	{
		$email = new Email();
		
		
		$mailAddresses = explode(",", EMAILS);
		foreach($mailAddresses as $mailAddress){
		
			$email->addReceiver($mailAddress);
		}
		
		$email->setSender('no-reply@msolution.com.hk');
		$email->addSubject($alert->getTitle());
		$email->addMessage($alert->getAlert());
		$email->setHtmlHeader();
		
		$this->_emailManager->sendEmail($email);
	}
}