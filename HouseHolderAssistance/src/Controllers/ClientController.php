<?php

namespace Controllers;

use Models\DataObject\DeviceReport;
use Models\DeviceReport_Model\DeviceReportModel;
class ClientController{
	
	public function regularReport(DeviceReport $report){
		
		// add device status to database
		$dReportMod = new DeviceReportModel();
		$dReportMod->add($report);
		
	}
	
	
	//For Teacher
	
	public function initClassStudentsView($classId){
		
		//TODO:
	}
	public function getClassStudents($classId){
		//TODO:
	}
	

	public function setSafetyPlace(Place $place){
		//TODO:
	}
	
}