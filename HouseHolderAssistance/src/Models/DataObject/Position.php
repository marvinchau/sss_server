<?php

namespace Models\DataObject;


class Position{
	
	private $lat;
	private $lng;
	private $att;
	private $accuracy;
	private $datetime;
	private $place;
	private $isEnable;
	
	public function getLat(){
		return $this->lat;
	}
	
	public function setLat($lat){
		$this->lat = $lat;
	}
	
	public function getLng(){
		return $this->lng;
	}
	
	public function setLng($lng){
		$this->lng = $lng;
	}
	
	public function getAtt(){
		return $this->att;
	}
	
	public function setAtt($att){
		$this->att = $att;
	}
	
	public function getPlace(){
		return $this->place;
	}
	
	public function setPlace($place){
		$this->place = $place;
	}
	
	public function getDateTime(){
		return $this->datetime;
	}
	
	public function setDateTime($dt){
		$this->datetime = $dt;
	}
	
	public function isEnable(){
		return $this->isEnable;
	}
	
	public function setEnable($bool){
		$this->isEnable = $bool;
	}
	
	public function getAccuracy(){
		return $this->accuracy;
	}
	
	public function setAccuracy($accuracy){
		$this->accuracy = $accuracy;
	}
	
}