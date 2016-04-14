<?php

namespace Models\DataObject;

class Place{
	
	private $studentId;
	private $id;
	private $lat;
	private $lng;
	private $radius;
	private $address;
	
	public function getId(){
		return $this->id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getStudentId(){
		return $this->studentId;
	}
	
	public function setStudentId($studentId){
		$this->studentId = $studentId;
	}
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
	public function getRadius(){
		return $this->radius;
	}
	public function setRadius($radius){
		$this->radius = $radius;
	}
	public function getAddress(){
		return $this->address;
	}
	public function setAddress($address){
		$this->address = $address;
	}
	
	
}