<?php

use Controllers\LoginController;
use Models\User_Model\User;
use Models\DataObject\Device;
use Utilities\ErrorFactory;
use Utilities\SSSException;
use Models\DataObject\DeviceReport;
use Models\DataObject\Position;
use Controllers\ClientController;
use Controllers\SafetyPlaceController;
use Models\DataObject\Place;
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
		
	// Student Features
	case "regularReport":
		
		if(validate_input_param($params, array('id', 'datetime', 'batt', 'pos', 'signal', 'movement'))){
			
			
			$pos = $params['pos'];
			$batt = $params['batt'];
			$signal = $params['signal'];
			$movement = $params['movement'];
			$dt = $params['datetime'];

			
			
			$report = new DeviceReport();
			$p = new Position();
			$p->setAtt($pos['att']);
			$p->setLat($pos['lat']);
			$p->setLng($pos['lng']);
			$p->setDateTime($pos['dt']);
			$p->setAccuracy($pos['acy']);
// 			$p->setEnable($pos['gpsStatus']);
// 			var_dump($p);

			$report->setUserId($params['id']);
			$report->setPosition($p);
			$report->setBatt($batt);
			$report->setSignal($signal);
			$report->setMovement($movement);
			$report->setDateTime($dt);
			$report->setGPS($pos['gpsStatus']);
// 			var_dump($report);
// 			var_dump($report->getPosition());
			$ctr = new ClientController();
			$result = $ctr->regularReport($report);
			
			
		}
		
		break;
	// Teacher Features
	case "getClasses":
		
		$ctr = new ClientController();
		try{
			$result = $ctr->getClasses();
		}catch(SSSException $e){
			$result = ErrorFactory::getError($e->getCode());
		}
		break;
	case "getClassStudents":

		$ctr = new ClientController();
		if(validate_input_param($params, array('classId'))){
			try{
				$result = $ctr->getClassStudents($params['classId']);
			}catch(SSSException $e){
				$result = ErrorFactory::getError($e->getCode());
			}
		}
		break;
	// Parent Features
	case "setSafetyPlace":

		$ctr = new ClientController();
		if(validate_input_param($params, array('studentId', 'lat', 'lng', 'radius'))){
			try{
				
				$place = new Place();
				$place->setStudentId($params['studentId']);
				$place->setLat($params['lat']);
				$place->setLng($params['lng']);
				$place->setRadius($params['radius']);
				
				$result = $ctr->setSafetyPlace($place);
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