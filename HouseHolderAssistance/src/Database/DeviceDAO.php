<?php

namespace Database;

use Utilities\ErrorFactory;

use Entities\UserData;

use Database\DBHandler\SDMDBH;
use Database\DBHandler\SDMDBParameters;
use Database\BasicDAO;
use Models\User_Model\User;
use Utilities\SSSException;
use Models\DataObject\Device;

class DeviceDAO extends BasicDAO
{
	public function set(Device $device)
	{
		$sp = "sp_device_set";
		
		$params = new SDMDBParameters();
		
		$params->add($device->getId());
		$params->add($device->getWifiMacAddress());
		$params->add($device->getUserId());
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
			}else {;
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
}