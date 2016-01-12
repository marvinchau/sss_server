<?php

namespace Database;

use Models\DataObject\StudentClass;
use Database\DBHandler\SDMDBParameters;
class StudentClassDAO extends BasicDAO{
	
	public function getAll(){
	
		$sp = "sp_studentClass_getAll";
		
		$params = new SDMDBParameters();
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		$ret = false;
// 		var_dump($result);
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				
				
				$classes = array();
				
				foreach($result['response']['resultSet'] as $dataRow){
					
					$class = new StudentClass();
					$class->setId($dataRow['class_id']);
					$class->setName($dataRow['class_name']);
					array_push($classes, $class);
				}
// 				var_dump($students);
				return $classes;
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
}