<?php


namespace Models\Task_Model;

use Models\User_Model\User;
class Task{
	
	private $taskId;
	private $lat;
	private $lng;
	private $address;
	private $msg;
	private $taskType;
	private $reporter;
	private $handler;
	private $taskRecords;
	private $status;
	private $lastUpdate;
	private $createDt;
	
	public function getId()
	{
		return $this->taskId;
	}
	public function setId($id)
	{
		$this->taskId = $id;
	}
	
	public function getLat()
	{
		return $this->lat;
	}
	public function setLat($lat)
	{
		$this->lat = $lat;
	}
	
	public function getLng()
	{
		return $this->lng;
	}
	public function setLng($lng)
	{
		$this->lng = $lng;
	}
	public function getAddress()
	{
		return $this->address;
	}
	public function setAddress($address)
	{
		$this->address = $address;
	}
	
	public function getMsg()
	{
		return $this->msg;
	}
	public function setMsg($msg)
	{
		$this->msg = $msg;
	}
	
	/**
	 * @return TaskType
	 */
	
	public function getTaskType(){
		return $this->taskType;
	}
	
	/**
	 * @param TaskType $type
	 */
	
	public function setTaskType($type)
	{
		$this->taskType = $type;
	}
	
	/**
	 * @return User
	 */
	
	public function getReporter()
	{
		return $this->reporter;
	}
	
	/**
	 * @param User $reporter
	 */
	
	public function setReport($reporter)
	{
		$this->reporter = $reporter;
	}
	
	/**
	 * @return User
	 */
	
	public function getHandler()
	{
		return $this->handler;
	}
	
	/**
	 * @param User $handler
	 */
	
	public function setHandler($handler)
	{
		$this->handler = $handler;
	}
	
	/**
	 * @return TaskRecord[]
	 */
	
	public function getTaskRecords()
	{
		return $this->taskRecords;
	}
	
	/**
	 * @param TaskRecord[] taskRecords
	 */
	
	public function setTaskRecords($taskRecords)
	{
		$this->taskRecords = $taskRecords;
	}
	
	/**
	 * @return TaskStatus
	 */
	
	public function getTaskStatus()
	{
		return $this->status;
	}
	
	/**
	 * 
	 * @param TaskStatus $status
	 */
	
	public function setTaskStatus($status)
	{
		$this->status = $status;
	}
	
	public function getLastUpdate() {
		return $this->lastUpdate;
	}
	
	public function setLastUpdate($lastUpdate)
	{
		$this->lastUpdate = $lastUpdate;
	}
	
	public function getCreateDt()
	{
		return $this->createDt;
	}
	
	public function setCreateDt($date)
	{
		$this->createDt = $date;
	}
	
	
}