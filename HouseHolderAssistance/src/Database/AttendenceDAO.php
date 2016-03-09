<?php

namespace Database;

use Database\DBHandler\SDMDBParameters;
use Models\DataObject\Attendence;
use Utilities\SSSException;
use Utilities\ErrorFactory;
class AttendenceDAO extends BasicDAO{
	
	
	/**
	 * Add a attendence record
	 * @param Attendence $attend
	 * @throws SSSException
	 * @return boolean
	 */
	
	public function add(Attendence $attend){
		

		$sp = "sp_attendance_add";
		
		$params = new SDMDBParameters();
// 		$params->add($attend->getClassId());
		$params->add($attend->getTeacherUserId());
		$params->add($attend->getSubmitDt());
		$params->add($attend->getStudentUserId());
		$params->add($attend->isAttendence());
// 		var_dump($params);
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 		var_dump($result);
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = true;
				}else{
					throw new SSSException(ErrorFactory::ERR_DB_INVALID_RESULT);
				}
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
		
		
	}	
	

	public function getByObserveeIdAndObserverId($observeeId, $observerId){
	
	
		$sp = "sp_attendance_getByObserveeIdAndObserverId";
	
		$params = new SDMDBParameters();
		// 		$params->add($attend->getClassId());
		$params->add($observeeId);
		$params->add($observerId);
		// 		var_dump($params);
	
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 		var_dump($result);
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				
				$attends = array();
				$records = $result['response']['resultSet'];
				foreach($records as $record)
				{
					
					$attend = new Attendence();
					$attend->setSubmitDt($record['submit_dt']);
					$attend->setAttendence($record['isAttendence']);
					$attend->setStudentUserId($observeeId);
					$attend->setTeacherUserId($observerId);
					array_push($attends, $attend);
				}
				$ret = $attends;
				
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	
	
	}
	
	
}