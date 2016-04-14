<?php

namespace Database;

use Utilities\ErrorFactory;



use Database\BasicDAO;
use Database\DBHandler\SDMDBParameters;
use Models\User_Model\User;
use Utilities\SSSException;

class GroupDAO extends BasicDAO
{
	public function getObservees($observerId)
	{
		$sp = "sp_group_observee_get";
	
		$params = new SDMDBParameters();
		$params->add($observerId);
		// 				var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 				var_dump($result);
	
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				
				$items = $result['response']['resultSet'];
				$array = array();
				foreach($items as $item)
				{
					$user = new User();
					$user->setName($item['login_name']);
					$user->setId($item['user_id']);
					$user->setType($item['user_type']);
					$user->setStatus($item['status']);
					$user->setLastUpdate($item['last_update']);
					array_push($array, $user);
				}
				return $array;
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
	
	public function remove($observerId)
	{
		
		$sp = "sp_group_remove";
	
		$params = new SDMDBParameters();
		$params->add($observerId);
		// 				var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 						var_dump($result);
	
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
				$ret = true;
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}	
	/**
	 * 
	 * @param int $observerId
	 * @param int $observeeId
	 */
	public function addObservee($observerId, $observeeId)
	{

		$sp = "sp_group_observee_add";
		
		$params = new SDMDBParameters();
		$params->add($observerId);
		$params->add($observeeId);
		// 				var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 				var_dump($result);
		
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			$ret = true;
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
}