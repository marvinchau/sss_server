<?php

use Controllers\LoginController;
use Models\User_Model\User;
use Models\Device_Model\Device;
use Utilities\ErrorFactory;
use Utilities\SSSException;
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
		
		if(validate_input_param($params,array('id', 'type', 'password', 'deviceID', 'wifiMac' ))){
			
			$user = new User();
// 			$user->setName($params['name']);
			$user->setId($params['id']);
			$user->setPassword(md5($params['password']));
			$user->setType($params['type']);
			
			$device = new Device();
			$device->setId($params['deviceID']);
			$device->setWifiMacAddress($params['wifiMac']);
			
			$ctr = new LoginController();
			try{
				$result = $ctr->checkClientLogin($user, $device);
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
		break;
	default:
		$result = ErrorFactory::getError(ErrorFactory::ERR_INVALID_ACTION);
		break;
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode($result);