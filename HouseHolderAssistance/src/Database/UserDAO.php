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
		
		$params->add($user->getId());
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