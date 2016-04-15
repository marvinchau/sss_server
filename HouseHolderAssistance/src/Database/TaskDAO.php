<?php

namespace Database;

use Utilities\ErrorFactory;



use Database\BasicDAO;
use Database\DBHandler\SDMDBParameters;
use Models\User_Model\User;
use Utilities\SSSException;
use Models\Task_Model\Task;
use Models\Task_Model\TaskType;
use Models\Task_Model\TaskStatus;
use Models\Task_Model\TaskRecord;

class TaskDAO extends BasicDAO
{

	/**
	 * 
	 * @param Task $task
	 * @throws SSSException
	 * @return boolean
	 */
	public function addTask($task)
	{

		$sp = "sp_task_add";
		
		$params = new SDMDBParameters();
		$params->add($task->getTaskType()->getId());
		$params->add($task->getReporter()->getId());
// 		$params->add($task->getHandler()->getId());
// 		$params->add($task->getTaskStatus()->getId());
		$params->add($task->getLat());
		$params->add($task->getLng());
		$params->add($task->getAddress());
		$params->add($task->getMsg());
// 		$params->add($task->getLastUpdate());
		
		
		
		// 				var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 						var_dump($result);
		
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			$ret = true;
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
	
	/**
	 * 
	 * @param int $taskId
	 * @throws SSSException
	 * @return Task | false
	 */
	
	public function getTask($taskId){
		$sp = "sp_task_get";
	
		$params = new SDMDBParameters();
		$params->add($taskId);
		// 		var_dump($params);
	
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 						var_dump($result);
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0])){
						
					$data = $result['response']['resultSet'][0];
					
					$task = new Task();
					$task->setId($data['id']);
					$task->setLat($data['lat']);
					$task->setLng($data['lng']);
					$task->setAddress($data['address']);
					$task->setMsg($data['msg']);
					$task->setLastUpdate($data['lastUpdate']);
					$task->setCreateDt($data['createDt']);
					
					$taskType = new TaskType();
					$taskType->setId($data['typeId']);
					$taskType->setName($data['taskType']);
					$task->setTaskType($taskType);
					
					$taskStatus = new TaskStatus();
					$taskStatus->setId($data['statusId']);
					$taskStatus->setName($data['status']);
					$task->setTaskStatus($taskStatus);
					
					$reporter = new User();
					$reporter->setId($data['reporterId']);
					$reporter->setName($data['reporter']);
					$task->setReport($reporter);
					
					if(isset($data['handlerId'])){
						$handler = new User();
						$handler->setId($data['handlerId']);
						$handler->setName($data['handler']);
						$task->setHandler($handler);
					}
					
					
					$ret = $task;
					
						
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
	
	/**
	 * 
	 * @param int $taskId
	 * @throws SSSException
	 * @return TaskRecord[] records
	 */
	
	public function getTaskRecord($taskId){
		$sp = "sp_task_history_get";
	
		$params = new SDMDBParameters();
		$params->add($taskId);
		// 		var_dump($params);
	
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 				var_dump($result);
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'])){
	
					$dataRows = $result['response']['resultSet'];
						
					$taskRecords = array();
					
					
					foreach($dataRows as $dataset)
					{
						$record = new TaskRecord();
						$record->setId($taskId);
						$record->setDt($dataset['dt']);
						$record->setStatus($dataset['name']);
						array_push($taskRecords, $record);
					}
					
						
						
					$ret = $taskRecords;
						
	
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
	
	

	/**
	 * 
	 * @param int $observerId
	 * @param string $date
	 * @throws SSSException
	 * @return Task[] | boolean
	 */
	
	public function getAllTaskByObserver($observerId, $dt){
		$sp = "sp_task_getAllByObserver";
	
		$params = new SDMDBParameters();
		$params->add($observerId);
		$params->add($dt);
// 				var_dump($params);
	
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 								var_dump($result);
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0])){
	
					
					$tasks = array();
					$dataRows = $result['response']['resultSet'];
					foreach($dataRows as $data){
					
							
						$task = new Task();
						$task->setId($data['id']);
						$task->setLat($data['lat']);
						$task->setLng($data['lng']);
						$task->setAddress($data['address']);
						$task->setMsg($data['msg']);
						$task->setLastUpdate($data['lastUpdate']);
						$task->setCreateDt($data['createDt']);
							
						$taskType = new TaskType();
						$taskType->setId($data['typeId']);
						$taskType->setName($data['taskType']);
						$task->setTaskType($taskType);
							
						$taskStatus = new TaskStatus();
						$taskStatus->setId($data['statusId']);
						$taskStatus->setName($data['status']);
						$task->setTaskStatus($taskStatus);
							
						$reporter = new User();
						$reporter->setId($data['reporterId']);
						$reporter->setName($data['reporter']);
						$task->setReport($reporter);
							
						if(isset($data['handlerId'])){
							$handler = new User();
							$handler->setId($data['handlerId']);
							$handler->setName($data['handler']);
							$task->setHandler($handler);
						}
						array_push($tasks, $task);
					}
						
					$ret = $tasks;
						
	
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
	
	/**
	 * 
	 * @param Task $task
	 * @throws SSSException
	 * @return boolean
	 */

	public function updateTask($task)
	{
		$sp = "sp_task_update";
	
		$params = new SDMDBParameters();
		$params->add($task->getId());
		$params->add($task->getTaskType()->getId());
		$params->add($task->getLat());
		$params->add($task->getLng());
		$params->add($task->getAddress());
		$params->add($task->getMsg());
		// 				var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 						var_dump($result);
	
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = $result['response']['resultSet'][0]['result'];
					if(strcmp($ret, "-1") == 0){
						throw new SSSException(ErrorFactory::ERR_RECORD_NOT_FOUND);
					}
					$ret = true;
// 					print 1;
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
	
	/**
	 *
	 * @param int $taskId
	 * @param int $statusId
	 * @throws SSSException
	 * @return boolean
	 */
	
	public function updateTaskStatus($taskId, $statusId)
	{
		$sp = "sp_task_status_update";
	
		$params = new SDMDBParameters();
		$params->add($taskId);
		$params->add($statusId);
		// 				var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 						var_dump($result);
	
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = $result['response']['resultSet'][0]['result'];
					if(strcmp($ret, "-1") == 0){
						throw new SSSException(ErrorFactory::ERR_RECORD_NOT_FOUND);
					}
					$ret = true;
					// 					print 1;
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
	
	/**
	 * 
	 * @param int $taskId
	 * @param int $handlerId
	 * @throws SSSException
	 * @return boolean
	 */

	public function assignTask($taskId, $handlerId)
	{
		$sp = "sp_task_assign";
	
		$params = new SDMDBParameters();
		$params->add($taskId);
		$params->add($handlerId);
		// 				var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 						var_dump($result);
	
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = $result['response']['resultSet'][0]['result'];
					if(strcmp($ret, "-1") == 0){
						throw new SSSException(ErrorFactory::ERR_RECORD_NOT_FOUND);
					}
					$ret = true;
					// 					print 1;
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
	

	/**
	 *
	 * @param int $taskId
	 * @param int $handlerId
	 * @throws SSSException
	 * @return boolean
	 */
	
	public function pickUpTask($taskId, $handlerId)
	{
		$sp = "sp_task_pickup";
	
		$params = new SDMDBParameters();
		$params->add($taskId);
		$params->add($handlerId);
		// 				var_dump($params);
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 						var_dump($result);
	
		$ret = false;
	
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = $result['response']['resultSet'][0]['result'];
					if(strcmp($ret, "-1") == 0){
						throw new SSSException(ErrorFactory::ERR_RECORD_NOT_FOUND);
					}
					$ret = true;
					// 					print 1;
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
	
	/**
	 * 
	 * @throws SSSException
	 * @return TaskType[] | boolean
	 */
	
	public function getTaskType()
	{
		$sp = "sp_task_type_get";
		
		$params = new SDMDBParameters();
		// 				var_dump($params);
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 								var_dump($result);
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0])){
		
						
					$types = array();
					$dataRows = $result['response']['resultSet'];
					foreach($dataRows as $data){
							
						$type = new TaskType();
						$type->setId($data['id']);
						$type->setName($data['type']);
						array_push($types, $type);
					}
		
					$ret = $types;
		
		
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