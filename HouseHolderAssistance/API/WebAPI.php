<?php

use Controllers\ClientController;
use Controllers\LoginController;
use Models\DataObject\Device;
use Models\DataObject\DeviceReport;
use Models\DataObject\Place;
use Models\DataObject\Position;
use Models\Location_Model\LocationModel;
use Models\User_Model\User;
use Utilities\ErrorFactory;
use Utilities\SSSException;
use Controllers\WebController;
require_once '../autoload.php';

$action = "";
$params = "";


if(isset($_GET['test'])){
	require_once './testAPI.php';
	$params = json_decode($fakeParams, true);
	$action = $params['action'];
}
else{
	if(isset($_POST['params'])){
		$params = json_decode($_POST['params'], true);
		$action = $params['action'];
	}
}
// var_dump($params);
$result = ErrorFactory::getError(ErrorFactory::ERR_MISSING_PARAMETERS);


switch($action)
{
	case "login":
		
		if(validate_input_param($params,array('name', 'type', 'password'))){
			
			$user = new User();
			$user->setName($params['name']);
// 			$user->setId($params['id']);
			$user->setPassword(md5($params['password']));
			$user->setType($params['type']);
			
			
			$ctr = new LoginController();
			try{
				$result = $ctr->checkWebAdminLogin($user);
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
		break;	
	case "addUser":

		if(validate_input_param($params,array('name', 'type', 'password'))){
			$user = new User();
			$user->setName($params['name']);
			$user->setPassword(md5($params['password']));
			$user->setType($params['type']);

			$ctr = new WebController();
			try{
				$result = $ctr->addUser($user);
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
		break;
// 	case "updateUser":
// 		break;
	case "updateUserStatus":

		if(validate_input_param($params,array('userId', 'status'))){
			$user = new User();
			$user->setId($params['userId']);
			$user->setStatus($params['status']);

			$ctr = new WebController();
			try{
				$result = $ctr->updateUserStatus($user);
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
		break;
		if(validate_input_param($params,array('type'))){
			$user = new User();
			$user->setId($params['userId']);
			$user->setStatus($params['status']);

			$ctr = new WebController();
			try{
				$result = $ctr->updateUserStatus($user);
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
	case "getUsers":
		if(validate_input_param($params,array('type'))){

			$ctr = new WebController();
			try{
				$result = $ctr->getUserByType($params['type']);
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
		break;
	case "getGroupObservees":

		if(validate_input_param($params,array('userId'))){
		
			$ctr = new WebController();
			try{
				$result = $ctr->getGroupObservees($params['userId']);
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
		break;
	case "updateGroupObservees":

		if(validate_input_param($params,array('observerId', 'observeeIds'))){
		
			$ctr = new WebController();
			try{
				$result = $ctr->updateGroupObservees($params['observerId'], $params['observeeIds']);
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
		break;
	case "getObserveeLocationByDate":
		if(validate_input_param($params,array('observeeId', 'date'))){
		
			$ctr = new WebController();
			try{
// 				$result = $ctr->updateGroupObservees($params['observerId'], $params['observeeIds']);
				$result = $ctr->getObserveeLocationsByDate($params['observeeId'], $params['date']);
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
		break;
	case "exportReport":
// 		print 1;
		if(validate_input_param($params,array('observeeId'))){
// 			print 2;
			$ctr = new WebController();
			try{
				// 				$result = $ctr->updateGroupObservees($params['observerId'], $params['observeeIds']);
				$result = $ctr->exportObserveeLocationsByDate($params['observeeId'], date("Y-m-d H:i:s"));
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
// 		print 3;
		break;
	default:
		$result = ErrorFactory::getError(ErrorFactory::ERR_INVALID_ACTION);
		break;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);