<?php

namespace Database;

use Database\DBHandler\SDMDBParameters;
use Models\DataObject\Student;
use Models\DataObject\Device;
use Models\DataObject\DeviceReport;
use Models\DataObject\Position;
class StudentDAO extends BasicDAO{
	
	
	/**
	 * get student record by user id
	 * @param int $userId
	 * @throws SSSException
	 * @return Student
	 */
	
	public function get($userId){
		$sp = "sp_student_get";
		
		$params = new SDMDBParameters();
		
		$params->add($userId);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		$ret = false;
		// 		var_dump($result);
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'][0])){
		
				$dataRow = $result['response']['resultSet'][0];						
				$student = new Student();
				$student->setId($userId);
				$student->setClassId($dataRow['class_id']);
				$student->setName($dataRow['login_name']);
				$student->setStudentId($dataRow['student_id']);
				$student->setClassName($dataRow['class_name']);
				$ret = $student;
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
	
	public function getWithStatus($userId){
		$sp = "sp_student_getWithStatus";
		
		$params = new SDMDBParameters();
		
		$params->add($userId);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		$ret = false;
// 				var_dump($result);
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'][0])){

					$dataRow = $result['response']['resultSet'][0];
						
					$student = new Student();
					$student->setId($userId);
					$student->setClassId($dataRow['class_id']);
					$student->setName($dataRow['login_name']);
					$student->setStudentId($dataRow['student_id']);
					$student->setClassName($dataRow['class_name']);
						
					$device = new Device();
					$device->setWifiMacAddress($dataRow['wifi_address']);
		
					$position = new Position();
					$position->setAccuracy($dataRow['gps_accuracy']);
					$position->setAtt($dataRow['altitude']);
					$position->setDateTime($dataRow['gps_Dt']);
					// 					$position->setEnable($dataRow['gps_accuracy']);
					$position->setLat($dataRow['latitude']);
					$position->setLng($dataRow['longitude']);
					// 					$position->setPlace($dataRow['gps_accuracy']);
						
					$deviceReport = new DeviceReport();
					$deviceReport->setBatt($dataRow['battery_status']);
					$deviceReport->setDateTime($dataRow['report_dt']);
					$deviceReport->setSignal($dataRow['network_coverage_status']);
					$deviceReport->setMovement($dataRow['movement_status']);
					$deviceReport->setUserId($dataRow['user_id']);
					$deviceReport->setId($dataRow['report_id']);
					$deviceReport->setGPS($dataRow['gps_status']);
					$deviceReport->setPlaceStatus($dataRow['place_status']);
						
						
						
					$deviceReport->setPosition($position);
					$student->setDevice($device);
					$student->setReport($deviceReport);
					return $student;
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;		
	}
	
	public function getWithStatusByClassId($classId){
		$sp = "sp_student_getWithStatusByClassId";
		
		$params = new SDMDBParameters();
		
		$params->add($classId);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		$ret = false;
// 		var_dump($result);
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				
				$students = array();
				
				foreach($result['response']['resultSet'] as $dataRow){
					
					$student = new Student();
					$student->setClassId($classId);
					$student->setId($dataRow['user_id']);
					$student->setName($dataRow['login_name']);
					$student->setStudentId($dataRow['student_id']);
					
					$device = new Device();
					$device->setWifiMacAddress($dataRow['wifi_address']);

					$position = new Position();
					$position->setAccuracy($dataRow['gps_accuracy']);
					$position->setAtt($dataRow['altitude']);
					$position->setDateTime($dataRow['gps_Dt']);
// 					$position->setEnable($dataRow['gps_accuracy']);
					$position->setLat($dataRow['latitude']);
					$position->setLng($dataRow['longitude']);
// 					$position->setPlace($dataRow['gps_accuracy']);
					
					$deviceReport = new DeviceReport();
					$deviceReport->setBatt($dataRow['battery_status']);
					$deviceReport->setDateTime($dataRow['report_dt']);
					$deviceReport->setSignal($dataRow['network_coverage_status']);
					$deviceReport->setMovement($dataRow['movement_status']);
					$deviceReport->setUserId($dataRow['user_id']);
					$deviceReport->setId($dataRow['report_id']);
					$deviceReport->setGPS($dataRow['gps_status']);	
					$deviceReport->setPlaceStatus($dataRow['place_status']);
					
					
					
					$deviceReport->setPosition($position);
					$student->setDevice($device);
					$student->setReport($deviceReport);
					array_push($students, $student);
				}
// 				var_dump($students);
				return $students;
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
	

	public function getWithStatusByParentId($parentId){
		$sp = "sp_student_getWithStatusByParentId";
	
		$params = new SDMDBParameters();
	
		$params->add($parentId);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		$ret = false;
		// 		var_dump($result);
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
	
				$students = array();
	
				foreach($result['response']['resultSet'] as $dataRow){
						
					$student = new Student();
					$student->setClassId($dataRow['class_id']);
					$student->setId($dataRow['user_id']);
					$student->setName($dataRow['login_name']);
					$student->setStudentId($dataRow['student_id']);
						
					$device = new Device();
					$device->setWifiMacAddress($dataRow['wifi_address']);
	
					$position = new Position();
					$position->setAccuracy($dataRow['gps_accuracy']);
					$position->setAtt($dataRow['altitude']);
					$position->setDateTime($dataRow['gps_Dt']);
					// 					$position->setEnable($dataRow['gps_accuracy']);
					$position->setLat($dataRow['latitude']);
					$position->setLng($dataRow['longitude']);
					// 					$position->setPlace($dataRow['gps_accuracy']);
						
					$deviceReport = new DeviceReport();
					$deviceReport->setBatt($dataRow['battery_status']);
					$deviceReport->setDateTime($dataRow['report_dt']);
					$deviceReport->setSignal($dataRow['network_coverage_status']);
					$deviceReport->setMovement($dataRow['movement_status']);
					$deviceReport->setUserId($dataRow['user_id']);
					$deviceReport->setId($dataRow['report_id']);
					$deviceReport->setGPS($dataRow['gps_status']);
					$deviceReport->setPlaceStatus($dataRow['place_status']);
						
						
						
					$deviceReport->setPosition($position);
					$student->setDevice($device);
					$student->setReport($deviceReport);
					array_push($students, $student);
				}
				// 				var_dump($students);
				return $students;
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
}