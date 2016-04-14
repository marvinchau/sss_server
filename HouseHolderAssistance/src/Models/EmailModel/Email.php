<?php


namespace Models\EmailModel;

class Email
{
	
	private $_receivers = array();
	private $_subject;
	private $_message;
	private $_headers = array();
// 	private $_parameters = array();
	private	$_sender = "";
	private $_htmlHeader = "";
	private $_cc = array();
	private $_bcc = array();
	
	
	public function addReceiver($receiver)
	{
		if(filter_var($receiver, FILTER_VALIDATE_EMAIL))
		{
			array_push($this->_receivers, $receiver);
		}else
		{
			// TODO : throw exception
		}
	}
	
	public function addSubject($subject)
	{
		$this->_subject = $subject;
	}
	
	public function addMessage($message)
	{
		$this->_message = $message;
	}
	
	public function addHeader($header)
	{
		/*
		 * http://www.w3schools.com/php/func_mail_mail.asp
		 * 
		 * Optional. Specifies additional headers, like From, Cc, and Bcc. The additional headers should be separated with a CRLF (\r\n).
		 * Note: When sending an email, it must contain a From header. This can be set with this parameter or in the php.ini file.
		 */

		array_push($this->_headers, $header);
	}
	
// 	public function addParams($param)
// 	{
		
// 		/*
// 		 * http://www.w3schools.com/php/func_mail_mail.asp
// 		 * 
// 		 * Optional. 
// 		 * Specifies an additional parameter to the sendmail program (the one defined in the sendmail_path configuration setting).
// 		 * (i.e. this can be used to set the envelope sender address when using sendmail with the -f sendmail option)
// 		 */
		
// 		if($this->parameters == null)
// 		{
// 			$this->parameters = array();
// 		}
		
		
// 	}
	
	public function setSender($sender)
	{
		if(filter_var($sender, FILTER_VALIDATE_EMAIL))
		{
			$this->_sender = $sender;
		}else
		{
			// TODO : throw exception
		}	
	}
	
	public function getReceivers()
	{
		
		$output = "";
		
		foreach($this->_receivers as $receiver)
		{
			" ". $output .= $receiver . ",";
		}
		
		if($output == "")
		{
			// TODO : throw exception
		}else
		{
			$output = substr($output, 0, -1);
// 			echo $output . "<BR>";
		}
		return $output;
	}
	
	
	public function getSubject()
	{
// 			$this->_subject = chunk_split(base64_encoe($subject));

			/*
			 * http://stackoverflow.com/questions/1450846/how-to-send-mail-with-binary-word-in-mail-subject-using-php
			 * 
			 * encoded-word = "=?" charset "?" encoding "?" encoded-text "?=" 
			 */

// 			return 'Subject: =?UTF-8?Q?'.imap_8bit($this->_subject).'?=';
			return 'Subject: =?UTF-8?B?'.base64_encode($this->_subject).'?=';
	}
	
	public function getMessage()
	{

		/*
		 * http://www.w3schools.com/php/func_mail_mail.asp
		 *
		 * Required. Defines the message to be sent. Each line should be separated with a LF (\n). Lines should not exceed 70 characters.
		 * Windows note: If a full stop is found on the beginning of a line in the message, it might be removed. To solve this problem, replace the full stop with a double dot:
		 *
		 */
		
		// TODO : encode message
		return str_replace("\n.", "\n..", $this->_message);
	}
	
	public function getHeaders()
	{
		$output = "";
		
		//Add Headers
		foreach($this->_headers as $header)
		{
			$output .= $header . "\r\n";
		}
		
		//Add Html Header
		if($this->_htmlHeader != "")
		{
// 			echo 1;
			$output .= $this->_htmlHeader;
// 			echo $output;
		}
		
		//Add From
		if($this->_sender != "")
		{
// 			echo "sender";
// 			$output .= "From: " .  '=?UTF-8?Q?'.imap_8bit($this->_sender).'?=' . "\r\n";
			$output .= "From: " .  '=?UTF-8?B?'.base64_encode($this->_sender).'?=' . "\r\n";
// 			echo $$output;
		}
		
		//Add BCC
		$bccHeader = "Bcc: ";
		$bccList = "";
		foreach($this->_bcc as $bcc)
		{
			$bccList .= $bcc . ",";
		}
		
		if($bccList != "")
		{
			$bccList = substr($bccList, 0, -1);
			$output .= $bccHeader . $bccList . "\r\n";
		}
		

		//Add CC
		$ccHeader = "Cc: ";
		$ccList = "";
		foreach($this->_cc as $cc)
		{
			$ccList .= $cc . ",";
		}
		
		if($ccList != "")
		{
			$ccList = substr($ccList, 0, -1);
			$output .= $ccHeader . $ccList . "\r\n";
		}
		
		
		return $output;
		
	}
	
	public function setHtmlHeader()
	{
		$this->_htmlHeader = 'MIME-Version: 1.0' . "\r\n";	
// 		$this->_htmlHeader .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
		$this->_htmlHeader .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	}
	

	public function removeHtmlHeader()
	{
		$this->_htmlHeader = "";
	}
	
	public function addCC($receiver)
	{
		array_push($this->_cc, $receiver);
	}
	
	public function addBCC($receiver)
	{

		array_push($this->_bcc, $receiver);
	}
	
}