<?php

namespace Controllers;

use Database\DAOFactory;

use Entities\AWSData;
use Entities\UserData;
use Models\User_Model\User;
use Models\DataObject\Device;
use Models\User_Model\UserModel;
use Models\Device_Model\DeviceModel;
use Utilities\ErrorFactory;
use Utilities\SSSException;

class LoginController
{
	
	public function checkClientLogin(User $user, Device $device){
		
		
		//Check User Login
		$userMod = new UserModel();	
		$userFound = $userMod->login($user);
		
		//Login Fail
		if(!$userFound){
			return ErrorFactory::getError(ErrorFactory::LOGIN_FAIL_INVALID_USER);
		}
// 		echo 1;
// 		echo $userFound;
		$user->setId($userFound);
		//Insert User Device record
		$deviceMod = new DeviceModel();
		$device->setUserId($user->getId());
		$isRecorded = $deviceMod->set($device);
		
		//Update User Device Fail
		if(!$isRecorded){
			return ErrorFactory::getError(ErrorFactory::LOGIN_FAIL_DEVICE_UPDATE_FAIL);
		}
// 		echo 2;
// 		$ret['data']['userID'] = $userId;
		$ret['result'] = "success";
		$ret['data']['user_id'] = $user->getId();
		return $ret;
	}
	
	public function checkWebAdminLogin(User $user)
	{
		
		if($user->getType() != 'A'){

			return ErrorFactory::getError(ErrorFactory::LOGIN_FAIL_INVALID_USER);
		}
		
		//Check User Login
		$userMod = new UserModel();
		$userFound = $userMod->login($user);
		
		//Login Fail
		if(!$userFound){
			return ErrorFactory::getError(ErrorFactory::LOGIN_FAIL_INVALID_USER);
		}
		$user->setId($userFound);
		$ret['result'] = "success";
		$ret['data']['user_id'] = $user->getId();
		session_start();
		$_SESSION['userId'] = $userFound;
		$_SESSION['userName'] = $user->getName();
		$_SESSION['loginDt'] = new \DateTime();
		
		return $ret;
	}
}