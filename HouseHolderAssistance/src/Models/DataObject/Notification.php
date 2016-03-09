<?php

namespace Models\DataObject;

class Notification{
	
	private $userId;
	private $proirity;
	private $status;
	private $id;
	private $type; //Notification Type (Panic, Missing Device )
	private $msg;
	private $last_update;
	private $eventDt;
	private $observeeId;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getProirity(){
		return $this->proirity;
	}
	
	public function setProirity($proirity){
		$this->proirity = $proirity;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function getUserId(){
		return $this->userId;
	}
	
	public function setUserId($userId){
		$this->userId = $userId;
	}
	
	public function getType(){
		return $this->type;
	}
	
	public function setType($type){
		$this->type = $type;
	}
	
	public function getMsg(){
		return $this->msg;
	}
	
	public function setMsg($msg){
		$this->msg = $msg;
	}
	
	public function getLastUpdate(){
		return $this->last_update;
	}
	
	public function setLastUpate($lastUpdate){
		$this->last_update = $lastUpdate;
	}
	
	public function getEventDt(){
		return $this->eventDt;
	}
	
	public function setEventDt($eventDt){
		$this->eventDt = $eventDt;
	}
	public function getObserveeId(){
		return $this->observeeId;
	}
	
	public function setObserveeId($observeeId){
		$this->observeeId = $observeeId;
	}
}