<?php

namespace Models\DataObject;

class DeviceReport{
	
	private $position;
	private $batt;
	private $signal;
	private $datetime;
	private $userId;
	private $id;
	private $movement;
	private $gps;
	private $placeStatus;
	
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getUserId(){
		return $this->userId;
	}
	
	public function setUserId($id){
		$this->userId = $id;
	}

	public function getPosition(){
		return $this->position;
	}
	
	public function setPosition(Position $pos){
		$this->position = $pos;
	}
	
	public function getBatt(){
		return $this->batt;
	}
	
	public function setBatt($batt){
		$this->batt = $batt;
	}
	
	public function getSignal(){
		return $this->signal;
	}
	
	public function setSignal($signal){
		$this->signal = $signal;
	}

	public function getDateTime(){
		return $this->datetime;
	}
	
	public function setDateTime($dt){
		$this->datetime = $dt;
	}
	
	public function getMovement(){
		return $this->movement;
	}
	
	public function setMovement($movement){
		$this->movement = $movement;
	}
	
	public function getGPS(){
		return $this->gps;
	}
	
	public function setGPS($gpsStatus){
		$this->gps = $gpsStatus;
	}
	
	public function getPlaceStatus(){
		return $this->placeStatus;
	}
	
	/**
	 * 1 mean school, 2 mean home, 3 mean out of area
	 * @param int $placeStatus
	 */
	
	public function setPlaceStatus($placeStatus){
		$this->placeStatus = $placeStatus;
	}
}