<?php

namespace Database;

use Database\DBHandler\SDMDBParameters;
use Models\DataObject\Attendence;
class NotificationDAO extends BasicDAO{
	
	
	/**
	 * Add a attendence record
	 * @param Attendence $attend
	 * @throws SSSException
	 * @return boolean
	 */
	
	public function add(Attendence $attend){
		

		$sp = "sp_attendence_add";
		
		$params = new SDMDBParameters();
		$params->add($attend->getClassId());
		$params->add($attend->getStudentUserId());
		$params->add($attend->getTeacherUserId());
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
	
	
	
}