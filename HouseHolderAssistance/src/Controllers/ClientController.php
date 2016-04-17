<?php

namespace Controllers;

use Models\DataObject\DeviceReport;
use Models\DeviceReport_Model\DeviceReportModel;
use Models\Student_Model\StudentModel;
use Utilities;
use Utilities\DataConvertor;
use Utilities\SSSException;
use Utilities\ErrorFactory;
use Models\StudentClass_Model\StudentClassModel;
use Models\SafetyPlace_Model\SafetyPlaceModel;
use Models\DataObject\Place;
use Models\Location_Model\LocationModel;
use Models\Notification_Model\NotificationModel;
use Models\DataObject\Notification;
use Database\StudentDAO;
use Models\DataObject\Attendence;
use Models\Attendence_Model\AttendenceModel;
use Models\Task_Model\TaskType;
use Models\User_Model\User;
use Models\Task_Model\Task;
use Models\Task_Model\TaskModel;
class ClientController{
	
	//aabb0000
	
	public function regularReport(DeviceReport $report){
		
		// add device status to database
// 		var_dump($report);
		$locMod = new LocationModel();
		$placeMod = new SafetyPlaceModel();
		$notiMod = new NotificationModel();
		$dReportMod = new DeviceReportModel();
		$studMod = new StudentModel();
		
		
		$userId = $report->getUserId();
		$inSchool = false;
		$inHome = false;
		$placeMatched = false;
		$placeStatus = 3;
		
		try{
			
			
			//Get Latest Place Status
			$placeStatus = $placeMod->getLatestPlaceStatus($userId);
			
			
// 			$place = $placeMod->getSchool();
// 			if($place != null){
// 				$inSchool = $locMod->isInArea(
// 						$place->getLat(), 
// 						$place->getLng(), 
// 						$place->getRadius(), 
// 						$report->getPosition()->getLat(),
// 						$report->getPosition()->getLng()
// 				);
				
// 				if($inSchool){
// 					$placeMatched = true;
// 				}
// 			}
			
			if(!$placeMatched){
// 				print "user id :".$userId;
				$p = $placeMod->get($userId);
// 				var_dump($p);
				foreach($p as $placeItem){
					$inHome = $locMod->isInArea(
							$placeItem->getLat(), 
							$placeItem->getLng(), 
							$placeItem->getRadius(), 
							$report->getPosition()->getLat(),
							$report->getPosition()->getLng()
					);
// 					print "inHome :" . $inHome;
					if($inHome){
						$placeMatched = true;
						break;
					}
				}
			}
			
			if($placeMatched && $inSchool){
// 				print "updated place status :" . 1;
				$report->setPlaceStatus(1);
			}else if($placeMatched && $inHome){
// 				print "updated place status :" . 2;
				$report->setPlaceStatus(2);
			}else{
// 				print "updated place status :" . 3;
				$report->setPlaceStatus(3);
			}
			
			
// 			print 1111;
// 			print "report place status : " . $report->getPlaceStatus() . " | place status in server : ". $placeStatus ;
			
			// Add notification if place status changed
			if($report->getPlaceStatus() != $placeStatus){
				
// 				print 22222;
				
				$student = $studMod->getStudent($userId);
								
				$notification = new Notification();
				$notification->setEventDt($report->getDateTime());
				$notification->setProirity(2);
				$notification->setType("Place Changed");
				$notification->setStatus("P");
				$notification->setUserId($userId);
				
				switch ($report->getPlaceStatus()){
					case 1:
						$notification->setMsg("Observee : " . $student->getName() . " - Student in school now");
						break;
					case 2:
						$notification->setMsg("Observee : " . $student->getName() . " - Check in to a check point");
						break;
					case 3:
						$notification->setMsg("Observee : " . $student->getName() . " - Check Out of Check point");
						break;
				}

// 				print 33333;
				$notiMod->addNotification($notification);
// 				print 44444;
			}

// 			print 55555;
			//Add Device report
			$res = $dReportMod->add($report);
			if($res == 1){
				$result['result'] = "success";
			}else{
				$Result['result'] = "fail";
			}
		}catch(SSSException $e){
			$result = ErrorFactory::getError($e->getCode());
		}
		return $result;
		
	}
	
	public function getNotifications($userId){
		
		$notifiMod = new NotificationModel();
		$notifications = null;
		try{
			$notifications = $notifiMod->getNotifications($userId);
			if($notifications === FALSE){
				$result['data']['notifications'] = array();
			}else{	
				$result['data']['notifications'] = DataConvertor::objectArrayToArray($notifications);
			}
			$result['result'] = "success";
		}catch(SSSException $e){
			$result = ErrorFactory::getError($e->getCode());
		}
		return $result;
	}
	
	
	public function submitPanic($userId){
		
		$notifiMod = new NotificationModel();
		$studMod = new StudentModel();
		$student = null;
		try{
			$student = $studMod->getStudent($userId);
			
// 			var_dump($student);
			
			$date = new \DateTime();
			
			$notification = new Notification();
			$notification->setEventDt($date->format(DATETIME_FORMAT));
			$notification->setProirity(1);
			$notification->setType("Panic");
			$notification->setStatus("P");
			$notification->setUserId($userId);
			$notification->setMsg($student->getName() . " call help");
			$notifiMod->addNotification($notification);

			$result['result'] = "success";
			
		}catch(SSSException $e){
			$result = ErrorFactory::getError($e->getCode());
		}
		return $result;
	}
	
	//For Teacher
	
	public function initClassStudentsView($classId){
		
		//TODO:
	}
	public function getClassStudents($classId){
		$studentMod = new StudentModel();
		try{
			$students = $studentMod->getWithStatusByClassId($classId);
// 			var_dump($students);
			if($students === FALSE){
				$ret['data']['student'] = array();
			}else{	
				$ret['data']['student'] = DataConvertor::objectArrayToArray($students);
			}
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){

			return $e->getError();
		}
		
	}
	
	public function getClasses(){
		$studentClassMod = new StudentClassModel();
		try{	
			$classes = $studentClassMod->getAll();
// 			var_dump($classes);
			if($classes === FALSE){
				$ret['data']['classes'] = array();
			}else{	
				$ret['data']['classes'] = DataConvertor::objectArrayToArray($classes);
			}
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	

	public function setSafetyPlace(Place $place, $parentId){
// 		var_dump($place);
		$placeMod = new SafetyPlaceModel();
		try{
			$ret = $placeMod->set($place, $parentId);
			if($ret == 1){
				$result['result'] = "success";
			}else{
				$result['result'] = "fail";
			}
			return $result;
			
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	
	public function getParentStudents($parentId){
		$studentMod = new StudentModel();
		try{

			$students = $studentMod->getWithStatusByParentId($parentId);
			// 			var_dump($students);
			if($students === FALSE){
				$ret['data']['student'] = array();
			}else{
				$ret['data']['student'] = DataConvertor::objectArrayToArray($students);
			}
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	
	public function getStudent($studentId){
		$studentMod = new StudentModel();
		try{

			$student = $studentMod->getStudentWithStatus($studentId);
			// 			var_dump($students);
			if($student === FALSE){
				$ret['data']['student'] = null;
			}else{
				$ret['data']['student'] = DataConvertor::objectToArray($student);
			}
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	
	/**
	 * @param array Attendence $attends
	 */
	
	public function submitAttendences(array $attends){
		$attendMod = new AttendenceModel();
		try{
			
			foreach($attends as $attend){
				$attendMod->add($attend);
			}
			return $ret['result'] = "success";
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	
	//////////////////// Group Functions ////////////////////
	
// 	public function getGroupObservee($observerId)
// 	{

// 		$studentMod = new StudentModel();
// 		try{
// 			$students = $studentMod->getWithStatusByObserverId($observerId);
// 			// 			var_dump($students);
// 			if($students === FALSE){
// 				$ret['data']['student'] = array();
// 			}else{
// 				$ret['data']['student'] = DataConvertor::objectArrayToArray($students);
// 			}
// 			$ret['result'] = "success";
// 			return $ret;
// 		}catch(SSSException $e){
		
// 			return $e->getError();
// 		}
// 	}
	
	
	///////////////// Place Functions ///////////////////
	
	public function addPlace(Place $place)
	{
		$placeMod = new SafetyPlaceModel();
		try{
			$ret['data']['placeId'] = $placeMod->add($place);
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	

	public function updatePlace(Place $place)
	{
		$placeMod = new SafetyPlaceModel();
		try{
			$placeMod->update($place);
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	
	public function removePlace($placeId)
	{
		$placeMod = new SafetyPlaceModel();
		try{
			$placeMod->remove($placeId);
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}		
	}
	
	public function getPlacesByObserveeId($observeeId)
	{
		$placeMod = new SafetyPlaceModel();
		try{
			$places = $placeMod->getAll($observeeId);
// 			var_dump($places);
			if(is_array($places)){
				$ret['data']['places'] = DataConvertor::objectArrayToArray($places);
			}else{
				$ret['data']['places'] = array();
			}
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	
	/**
	 * 
	 * @param Attendence[] $attendances
	 */
	public function addAttendences($attendances)
	{

		
		try{
			$attMod = new AttendenceModel();
			foreach($attendances as $attendance)
			{
				$attMod->add($attendance);
			}
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
	
	public function getAttendencesByObserveeIdAndObserverId($observeeId, $observerId)
	{

		try{
			$attMod = new AttendenceModel();
			$attends = $attMod->getByObserveeIdAndObserverId($observeeId, $observerId);
			
			$totalCheck = count($attends);
			$totalAttend = 0;
			foreach($attends as $attend){
				if(strcmp($attend->isAttendence(), "T") == 0){
					$totalAttend ++;
				}
			}
			
			$ret['data']['attendRecords'] = DataConvertor::objectArrayToArray($attends);
			$ret['data']['totalCheck'] = $totalCheck;
			$ret['data']['totalAttend'] = $totalAttend;
			$ret['data']['attendPercentage'] = ($totalAttend / $totalCheck * 100 ) ."%";
			
			$ret['result'] = "success";
			return $ret;
		}catch(SSSException $e){
			return $e->getError();
		}
		
		
	}

	//Task Management
	
	public function addTask($observerId, $taskTypeId, $lat, $lng, $address, $msg)
	{
		try
		{
			// 			print 1;
				
			$type = new TaskType();
			$type->setId($taskTypeId);
				
			$reporter = new User();
			$reporter->setId($observerId);
				
			$task = new Task();
			$task->setTaskType($type);
			$task->setReport($reporter);
			$task->setLat($lat);
			$task->setLng($lng);
			$task->setAddress($address);
			$task->setMsg($msg);
				
			$taskMod = new TaskModel();
			$result = $taskMod->add($task);
			if($result === FALSE)
			{
				$ret['result'] = 'fail';
			}else
			{
				// 				print 3;
				$ret['result'] = 'success';
			}
			return $ret;
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	}
	
	public function getTask($taskId)
	{
		try
		{
			$taskMod = new TaskModel();
			$task = $taskMod->get($taskId);
			if($result === FALSE)
			{
				$ret['result'] = 'fail';
				
			}else{

				$ret['result'] = 'success';
				$ret['data']['task'] = DataConvertor::objectToArray($task);
			}
			return $ret;
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	}
	
	public function getAllTaskByObserverAndDate($observerId, $date)
	{
		try
		{
			$taskMod = new TaskModel();
			$tasks = $taskMod->getAllByObserverIdAndDate($observerId, $date);
			
			
			
			if($tasks === FALSE)
			{
				$ret['result'] = 'fail';
				
			}else{

				$totalTask = count($tasks);
				$noOfCompleteTask = 0;
				$noOfPendingTask = 0;
				$noOfInProgressTask = 0;
				$noOfCancelTask = 0;
				$noOfDelayCompletedTask = 0;
				$noOfExpiredTask = 0;
				
				foreach($tasks as $task)
				{
					switch($task->getTaskStatus()->getId())
					{
						case 1:
							
// 							$createDt = $task->getCreateDt();
							
// 							if( get_datetime_distance($createDt, $date) < 0){
// 								$noOfExpiredTask++;
// 							}else{
// 								$noOfPendingTask++;
// 							}
							$noOfPendingTask++;
							break;
						case 2:
							$noOfCancelTask++;
							break;
						case 5:
// 							if( get_datetime_distance($task->, $date) < 0){
// 								$noOfExpiredTask++;
// 							}else{
// 								$noOfPendingTask++;
// 							}
							
							$noOfCompleteTask++;
							break;
						default:
							$noOfInProgressTask++;
							break;
						
					}
					
				}
				
				
				$ret['result'] = 'success';
				$ret['data']['task'] = DataConvertor::objectArrayToArray($tasks);
				$ret['data']['summary']['total'] = $totalTask;
				$ret['data']['summary']['pending'] = $noOfPendingTask;
				$ret['data']['summary']['cancel'] = $noOfCancelTask;
				$ret['data']['summary']['inProgress'] = $noOfInProgressTask;
				$ret['data']['summary']['completed'] = $noOfCompleteTask;
			}
			return $ret;
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
		
	}
	
	public function updateTask($taskId, $typeId, $lat, $lng, $address, $msg)
	{

		try
		{
			
			$taskType = new TaskType();
			$taskType->setId($typeId);
			
			$task = new Task();
			$task->setId($taskId);
			$task->setTaskType($taskType);
			$task->setLat($lat);
			$task->setLng($lng);
			$task->setAddress($address);
			$task->setMsg($msg);
			
			$taskMod = new TaskModel();
			$result = $taskMod->update($task);
			if($result === FALSE)
			{
				$ret['result'] = 'fail';
		
			}else{
		
				$ret['result'] = 'success';
			}
			return $ret;
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	}
	
	public function updateTaskStatus($taskId, $statusId)
	{

		try
		{
				
			
				
			$taskMod = new TaskModel();
			$result = $taskMod->updateStatus($taskId, $statusId);
			if($result === FALSE)
			{
				$ret['result'] = 'fail';
		
			}else{
		
				$ret['result'] = 'success';
			}
			return $ret;
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	}

	public function assignTask($taskId, $handlerId)
	{
	
		try
		{
	
				
	
			$taskMod = new TaskModel();
			$result = $taskMod->assign($taskId, $handlerId);
			if($result === FALSE)
			{
				$ret['result'] = 'fail';
	
			}else{
	
				$ret['result'] = 'success';
			}
			return $ret;
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	}

	public function pickUpTask($taskId, $handlerId)
	{
	
		try
		{
			$taskMod = new TaskModel();
			$result = $taskMod->pickUp($taskId, $handlerId);
			if($result === FALSE)
			{
				$ret['result'] = 'fail';
	
			}else{
	
				$ret['result'] = 'success';
			}
			return $ret;
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	}
	
	public function getTaskType()
	{

		try
		{
			$taskMod = new TaskModel();
			$result = $taskMod->getTypes();
			if($result === FALSE)
			{
				$ret['result'] = 'fail';
		
			}else{
		
				$ret['result'] = 'success';
				$ret['data']['types'] = DataConvertor::objectArrayToArray($result);
			}
			return $ret;
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	}
	
	

	public function getAllTaskByObservee($observeeId)
	{
		try
		{
			$taskMod = new TaskModel();
			$tasks = $taskMod->getAllByObserveeId($observeeId);
				
				
				
			if($tasks === FALSE)
			{
				$ret['result'] = 'fail';
	
			}else{
	
				$ret['result'] = 'success';
				$ret['data']['task'] = DataConvertor::objectArrayToArray($tasks);
			}
			return $ret;
		}
		catch(SSSException $e)
		{
			return $e->getError();
		}
	
	}
}