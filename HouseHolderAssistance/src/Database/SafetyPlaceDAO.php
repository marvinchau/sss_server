<?php

namespace Database;

use Models\DataObject\Place;
use Database\DBHandler\SDMDBParameters;
class SafetyPlaceDAO extends BasicDAO{
	
	public function set(Place $place, $parentId)
	{
		$sp = "sp_place_set";
	
		$params = new SDMDBParameters();
	
		$params->add($parentId);
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
	
	public function get($sUserId){
		$sp = "sp_place_get";
		
		$params = new SDMDBParameters();
		
		$params->add($sUserId);
		
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
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
	
	public function getSchoolPlace(){
		$sp = "sp_systemSetting_get";
		
		$params = new SDMDBParameters();
		$params->add("SCHOOL_PLACE");
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 				var_dump($result);
		
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0])){
						
					$itemJson = $result['response']['resultSet'][0];
					$item = json_decode($itemJson['system_setting_value'], true);
					
					$place = new Place();
// 					$place->setAddress($item['address']);
// 					$place->setId($item['id']);
					$place->setLat($item['lat']);
					$place->setLng($item['lng']);
					$place->setRadius($item['radius']);
// 					$place->setStudentId($item['studentId']);
					$ret = $place;
						
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
	

	public function getLatestPlaceStatus($sUserId){
		$sp = "sp_place_latestPlaceStatus_get";
		
		$params = new SDMDBParameters();
		$params->add($sUserId);
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 				var_dump($result);
		
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'])){
		
					$ret = $result['response']['resultSet'][0]['place_status'];
					if($ret == null){
						$ret = 3; // 3 mean out of area, 2 mean home, 1 mean school
					}
		
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
	
	
	/////////////////////////////////////////////////
	
	public function add(Place $place)
	{

		$sp = "sp_place_add";

// 						var_dump($place);
		$params = new SDMDBParameters();
		$params->add($place->getStudentId());
		$params->add($place->getAddress());
		$params->add($place->getLat());
		$params->add($place->getLng());
		$params->add($place->getRadius());
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 						var_dump($result);
		
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
		
					$ret = $result['response']['resultSet'][0]['result'];
// 					print $ret;
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
	
	public function update(Place $place)
	{


		$sp = "sp_place_update";

// 		var_dump($place);
		$params = new SDMDBParameters();
		$params->add($place->getId());
		$params->add($place->getAddress());
		$params->add($place->getLat());
		$params->add($place->getLng());
		$params->add($place->getRadius());
// 		var_dump($params);
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 						var_dump($result);
		
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				$ret = true;
// 				if(isset($result['response']['resultSet'])){
		
// 					$ret = $result['response']['resultSet'][0];
		
// 				}else{
// 					throw new SSSException(ErrorFactory::ERR_DB_INVALID_RESULT);
// 				}
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
	

	public function remove($placeId)
	{
	
	
		$sp = "sp_place_remove";
	
		$params = new SDMDBParameters();
		$params->add($placeId);
	
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 				var_dump($result);
	
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				$ret = true;
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
	

	public function getAll($observeeId){
		$sp = "sp_place_get";
	
		$params = new SDMDBParameters();
	
		$params->add($observeeId);
	
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 		var_dump($result);
	
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'])){
						
					$items = $result['response']['resultSet'];
					$places = array();
					foreach($items as $item){
// 						var_dump($item);
						$place = new Place();
						$place->setAddress($item['place_name']);
						$place->setId($item['place_id']);
						$place->setLat($item['latitude']);
						$place->setLng($item['longitude']);
						$place->setRadius($item['radius']);
						$place->setStudentId($item['user_id']);
						array_push($places, $place);
					}
					if(sizeof($places) > 0){
						$ret = $places;
					}	
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