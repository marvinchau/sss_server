<?php

namespace Database;

class StudentDAO extends BasicDAO{
	
	public function getWithStatusByClassId($classId){
		$sp = "sp_student_getWithStatusByClassId";
		
		$params = new SDMDBParameters();
		
		$params->add($classId);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = $result['response']['resultSet'][0]['result'];
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