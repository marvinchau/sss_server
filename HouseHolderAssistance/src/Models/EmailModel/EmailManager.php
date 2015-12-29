<?php

namespace Models\EmailModel;

use Models\Log\LogManager;
class EmailManager
{
	
	
	
	
	public function sendEmail(Email $email)
	{
		
// 		echo $email->getHeaders();
// 		echo "<BR>";
// 		echo $email->getMessage();
// 		echo "<BR>";
// 		echo $email->getReceivers();
// 		echo "<BR>";
// 		echo $email->getSubject();

		$logManager = LogManager::getInstance();
		if(mail($email->getReceivers(), $email->getSubject(), $email->getMessage(), $email->getHeaders()))
		{
			$logManager->log(new \DateTime(), "email", "send Success");
		}
		else
		{
			$logManager->log(new \DateTime(), "email", "send fail" . $email->getMessage());
		}
	}
}