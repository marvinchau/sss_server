<?php

namespace Models\Device_Model;

class Device{
	
	private $userId;
	private $id;
	private $wifiMacAddress;
	
	
	public function getUserId(){
		return $this->userId;
	}
	
	public function setUserId($id){
		$this->userId = $id;
	}
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getWifiMacAddress(){
		return $this->wifiMacAddress;
	}
	
	public function setWifiMacAddress($address){
		$this->wifiMacAddress = $address;
	}
}