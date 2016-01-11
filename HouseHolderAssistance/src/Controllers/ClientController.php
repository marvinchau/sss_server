<?php

namespace Controllers;

use Models\DataObject\DeviceReport;
use Models\DeviceReport_Model\DeviceReportModel;
use Models\Student_Model\StudentModel;
use Utilities;
use Utilities\DataConvertor;
use Utilities\SSSException;
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
		$studentMod = new StudentModel();
		try{
			$students = $studentMod->getWithStatusByClassId($classId);
// 			var_dump($students);
			if($students === FALSE){
				$ret['data']['student'] = array();
			}else{	
				$ret['data']['student'] = DataConvertor::objectArrayToArray($students);
			}
			return $ret;
		}catch(SSSException $e){

			return $e->getError();
		}
		
	}
	

	public function setSafetyPlace(Place $place){
		//TODO:
	}
	
}