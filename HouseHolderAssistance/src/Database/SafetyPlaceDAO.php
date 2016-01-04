<?php

namespace Database;

use Models\DataObject\Place;
use Database\DBHandler\SDMDBParameters;
class SafetyPlaceDAO extends BasicDAO{
	
	public function set(Place $place)
	{
		$sp = "sp_place_set";
	
		$params = new SDMDBParameters();
	
		$params->add($place->getStudentId());
		$params->add($place->getLat());
		$params->add($place->getLng());
		$params->add($place->getRadius());
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 		var_dump($result);
	
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = $result['response']['resultSet'][0]['result'];
				}else{
					throw new SSSException(ErrorFactory::ERR_DB_INVALID_RESULT);
				}
			}else {;
			$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
	
	public function get($studentId){
		$sp = "sp_place_get";
		
		$params = new SDMDBParameters();
		
		$params->add($studentId);
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 		var_dump($result);
		
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'])){
					
					$item = $result['response']['resultSet'];
					$place = new Place();
					$place->setAddress($item['address']);
					$place->setId($item['id']);
					$place->setLat($item['lat']);
					$place->setLng($item['lng']);
					$place->setRadius($item['radius']);
					$place->setStudentId($item['studentId']);
					$ret = $place;
					
				}else{
					throw new SSSException(ErrorFactory::ERR_DB_INVALID_RESULT);
				}
			}else {;
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
}