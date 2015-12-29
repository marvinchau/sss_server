<?php


namespace Models\User_Model;

class User{
	
	private $userID;
	private $name;
	private $password;
	private $status;
	private $type;
	private $lastUpdate;
	
	public function getId(){
		return $this->userID;
	}
	
	public function setId($id){
		$this->userID = $id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function getPassword(){
		return $this->password;
	}
	
	public function setPassword($pwd){
		$this->password = $pwd;
	}
	
	public function getStatus(){
		return $this->status;
	}
	
	public function setStatus($status){
		$this->status = $status;
	}
	
	public function getType(){
		return $this->type;
	}
	
	public function setType($type){
		$this->type = $type;
	}
	
	public function getLastUpdate(){
		return $this->lastUpdate;
	}
	
	public function setLastUpdate(\DateTime $dt){
		$this->lastUpdate = $dt;
	}

	
}