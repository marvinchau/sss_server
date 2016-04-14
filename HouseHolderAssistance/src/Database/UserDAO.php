<?php

namespace Database;

use Utilities\ErrorFactory;

use Entities\UserData;

use Database\DBHandler\SDMDBH;
use Database\DBHandler\SDMDBParameters;
use Database\BasicDAO;
use Models\User_Model\User;
use Utilities\SSSException;

class UserDAO extends BasicDAO
{
	public function login(User $user)
	{
		$sp = "sp_clientLogin_check";
		
		$params = new SDMDBParameters();
		
// 		$params->add($user->getId());
		$params->add($user->getName());
		$params->add($user->getPassword());
		$params->add($user->getType());
// 		var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 		var_dump($result);
		
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = $result['response']['resultSet'][0]['result'];
// 					print $ret;
				}else{
// 					print 333;
// 					throw new SSSException(ErrorFactory::ERR_DB_INVALID_RESULT);
					$ret = false;
				}
			}else {
					$ret = false;
// 				print 111111;
			}
		} else {
// 				print 111112;
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
	
	public function add(User $user)
	{
		$sp = "sp_user_add";
		
		$params = new SDMDBParameters();
		$params->add($user->getType());
		$params->add($user->getName());
		$params->add($user->getPassword());
		// 		var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 				var_dump($result);
		
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = $result['response']['resultSet'][0]['result'];
					if(strcmp($ret, "-1") == 0){
						throw new SSSException(ErrorFactory::ERR_RECORD_IS_EXIST);
					}
				}else{
					$ret = false;
				}
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;			
	}
	
	public function updateStatus(User $user)
	{
		$sp = "sp_user_statusUpdate";
		
		$params = new SDMDBParameters();
		$params->add($user->getId());
		$params->add($user->getStatus());
// 				var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 				var_dump($result);
		
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = $result['response']['resultSet'][0]['result'];
					if(strcmp($ret, "-1") == 0){
						throw new SSSException(ErrorFactory::ERR_RECORD_NOT_FOUND);
					}
				}else{
					$ret = false;
				}
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;			
	}
	

	public function getByType($type)
	{
		$sp = "sp_user_getByType";
	
		$params = new SDMDBParameters();
		$params->add($type);
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
}