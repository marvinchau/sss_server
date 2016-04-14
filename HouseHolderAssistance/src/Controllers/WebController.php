<?php

namespace Controllers;

use Models\User_Model\User;
use Utilities\SSSException;
use Utilities\ErrorFactory;
use Models\User_Model\UserModel;
use Utilities\DataConvertor;
use Models\Group_Model\GroupModel;
use Models\Student_Model\StudentModel;
use Models\CSV\CSVManager;
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
	
	public function getObserveeLocationsByDate($userId, $date)
	{
		try
		{
			$studMod = new StudentModel();
			$deviceReports = $studMod->getStudentLocationsByDate($userId, $date);
			if($deviceReports === FALSE)
			{
				return ErrorFactory::getError(ErrorFactory::ERR_RECORD_NOT_FOUND);
			}else
			{
				$ret['result'] = 'success';
				$ret['data']['records'] = DataConvertor::objectArrayToArray($deviceReports);
				return $ret;
			}
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	}

	public function exportObserveeLocationsByDate($userId, $date)
	{
		try
		{
// 			print 1;
			$studMod = new StudentModel();
			$deviceReports = $studMod->getStudentLocationsByDate($userId, $date);
			if($deviceReports === FALSE)
			{
// 				print 2;
				return ErrorFactory::getError(ErrorFactory::ERR_RECORD_NOT_FOUND);
			}else
			{
// 				print 3;
				$ret['result'] = 'success';
				$reportArray = DataConvertor::objectArrayToArray($deviceReports);
				
				$csvMgr = new CSVManager();
// 				$filename = $csvMgr->genCSV("location", $reportArray);
				$filename = $csvMgr->genCSV("location".$date.".csv", $reportArray);
				$ret['result'] = 'success';
				$ret['data'] = $filename;
				return $ret;
			}
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	}
}