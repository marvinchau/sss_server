<?php

namespace Models\DeviceReport_Model;

use Models\DataObject\DeviceReport;
use Database\DAOFactory;
class DeviceReportModel{
	
	
	private $dao;
	
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::DEVICE_REPORT);
	}
	
	public function add(DeviceReport $report){
		return $this->dao->add($report);
	}
	
	
}