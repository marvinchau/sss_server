<?php

namespace Entities;

class UserData
{
	private $_userId;
	private $_userPassword;
	
	public function setId($id){
		$this->_userId = $id;
	}
	
	public function getId(){
		return $this->_userId;
	}
	
	public function setPassword($pwd){
		$this->_userPassword = $pwd;
	}
	
	public function getPassword(){
		return $this->_userPassword;
	}
}