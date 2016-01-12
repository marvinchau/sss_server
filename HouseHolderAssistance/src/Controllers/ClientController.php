<?php

namespace Controllers;

use Models\DataObject\DeviceReport;
use Models\DeviceReport_Model\DeviceReportModel;
use Models\Student_Model\StudentModel;
use Utilities;
use Utilities\DataConvertor;
use Utilities\SSSException;
use Utilities\ErrorFactory;
use Models\StudentClass_Model\StudentClassModel;
class ClientController{
	
	public function regularReport(DeviceReport $report){
		
		// add device status to database
// 		var_dump($report);
		$dReportMod = new DeviceReportModel();
		try{
			$res = $dReportMod->add($report);
			if($res == 1){
				$result['result'] = "success";
			}else{
				$Result['result'] = "fail";
			}
		}catch(SSSException $e){
			$result = ErrorFactory::getError($e->getCode());
		}
		return $result;
		
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
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){

			return $e->getError();
		}
		
	}
	
	public function getClasses(){
		$studentClassMod = new StudentClassModel();
		try{	
			$classes = $studentClassMod->getAll();
// 			var_dump($classes);
			if($classes === FALSE){
				$ret['data']['classes'] = array();
			}else{	
				$ret['data']['classes'] = DataConvertor::objectArrayToArray($classes);
			}
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	

	public function setSafetyPlace(Place $place){
		//TODO:
	}
	
}