<?php

namespace Models\Alerts;

class Alert
{
	private $_dt;
	private $_title;
	private $_content;
	
	public function __construct(\DateTime $date, $title, $content)
	{
		$this->_dt = $date;
		$this->_title = $title;
		$this->_content = $content;	
	}
	
	
	public function getAlert()
	{
		return $this->_dt->format(DATE_FORMAT). " | Title : ". $this->_title . " | Content : ". $this->_content;
	}
	
	public function getTitle()
	{
		return $this->_title;
	}
}