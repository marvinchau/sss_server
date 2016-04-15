<?php


namespace Models\Task_Model;

class TaskRecord{
	
	private $taskId;
	private $dt;
	private $status;
	
	public function getId(){
		return $this->taskId;
	}
	
	public function setId($id){
		$this->taskId = $id;
	}
	public function getDt(){
		return $this->dt;
	}
	
	public function setDt($date){
		$this->dt = $date;
	}
	
	public function getStatus()
	{
		return $this->status;
	}
	public function setStatus($status){
		$this->status = $status;
	}
	
}