<?php


namespace Models\Task_Model;

use Database\DAOFactory;
use Database\BasicDAO;
use Utilities\SSSException;
use Database\UserDAO;
use Database\TaskDAO;
use Models\Task_Model\Task;


class TaskModel{
	
	/**
	 * @var TaskDAO $dao
	 */
	
	private $dao;
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::TASK);
		
	}
	

	/**
	 * @param Task $task
	 * @throws SSSException
	 * @return boolean
	 */
	
	public function add($task)
	{
		return $this->dao->addTask($task);
	}
	
	public function get($taskId){
		
		$task = $this->dao->getTask($taskId);
		if($task === FALSE){
			return false;
		}else{
			$task->setTaskRecords($this->dao->getTaskRecord($taskId));
		}
		return $task;
		
	}
	
	/**
	 * 
	 * @param int $observerId
	 * @param string $date
	 * @throws SSSException
	 * @return Task[] | boolean
	 */
	
	public function getAllByObserverIdAndDate($observerId, $date)
	{
		return $this->dao->getAllTaskByObserver($observerId, $date);
	}
	
	/**
	 * 
	 * @param Task $task
	 * @return boolean
	 */
	
	public function update($task)
	{
		return $this->dao->updateTask($task);
	}
	
	/**
	 * 
	 * @param int $taskId
	 * @param int $statusId
	 * @return boolean
	 */
	
	public function updateStatus($taskId, $statusId)
	{
		return $this->dao->updateTaskStatus($taskId, $statusId);
	}

	/**
	 *
	 * @param int $taskId
	 * @param int $handlerId
	 * @return boolean
	 */
	
	public function assign($taskId, $handlerId)
	{
		return $this->dao->assignTask($taskId, $handlerId);
	}

	/**
	 *
	 * @param int $taskId
	 * @param int $handlerId
	 * @return boolean
	 */
	
	public function pickUp($taskId, $handlerId)
	{
		return $this->dao->pickUpTask($taskId, $handlerId);
	}
	
	/**
	 * @return TaskType[] | boolean
	 */
	
	public function getTypes()
	{
		return $this->dao->getTaskType();
	}
}