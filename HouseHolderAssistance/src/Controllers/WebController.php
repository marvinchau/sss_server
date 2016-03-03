<?php

namespace Controllers;

use Models\User_Model\User;
use Utilities\SSSException;
use Utilities\ErrorFactory;
use Models\User_Model\UserModel;
use Utilities\DataConvertor;
use Models\Group_Model\GroupModel;
class WebController{
	

	public function addUser(User $user){

		if(!($user->getType() == 'P' || $user->getType() == 'O')){

			throw new SSSException(ErrorFactory::ERR_WRONG_USER_TYPE);
		}
		
		$userMod = new UserModel();
		try{
			$userFound = $userMod->add($user);
			if($userFound === FALSE){
				throw new SSSException(ErrorFactory::ERR_DB_INVALID_RESULT);
			}
			$ret['result'] = "success";
			$ret['data']['user_id'] = $userFound;
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}


	public function updateUserStatus(User $user){
	
		if(!($user->getStatus() == 'N' || $user->getStatus() == 'I')){
	
			throw new SSSException(ErrorFactory::ERR_WRONG_USER_STATUS);
		}
	
		$userMod = new UserModel();
		try{
			$userFound = $userMod->updateStatus($user);
			if($userFound === FALSE){
				throw new SSSException(ErrorFactory::ERR_DB_INVALID_RESULT);
			}
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	
	public function getUserByType($type)
	{
		if(!($type == 'P' || $type == 'O'))
		{
			throw new SSSException(ErrorFactory::ERR_WRONG_USER_TYPE);		
		}
		
		
		$userMod = new UserModel();
		try{
			$users = $userMod->getByType($type);
			$ret['data']['users'] = DataConvertor::objectArrayToArray($users);
			$ret['result'] = 'success';
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	
	public function getGroupObservees($observerId)
	{
		$groupMod = new GroupModel();
		try
		{
			$groupObservees = $groupMod->getObserver($observerId);
			$ret['data']['observees'] = DataConvertor::objectArrayToArray($groupObservees);
			$ret['result'] = 'success';
			return $ret;			
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	}
	
	/**
	 * 
	 * @param int $observerId
	 * @param int[] $observeeIds
	 */
	public function updateGroupObservees($observerId, $observeeIds)
	{
		$groupMod = new GroupModel();
		try
		{
			$ret['result'] = 'success';
			$groupMod->removeGroup($observerId);
			if($groupMod->addObservee($observerId, $observeeIds) === false){

				$ret['result'] = 'fail';
			};
			return $ret;
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
		
	}
}