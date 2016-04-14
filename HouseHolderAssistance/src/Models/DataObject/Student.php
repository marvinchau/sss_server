<?php

namespace Models\DataObject;

class Student{
	
	private $name;
	private $userId;
	private $studentId;
	private $classId;
	private $report;
	private $device;
	private $className;
	
	public function getId(){
		return $this->userId;
	}
	
	public function setId($id){
		$this->userId = $id;
	}
	
	public function getStudentId(){
		return $this->studentId;
	}
	
	public function setStudentId($id){
		$this->studentId = $id;
	}
	
	public function getClassId(){
		return $this->classId;
	}
	
	public function setClassId($id){
		$this->classId = $id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function getReport(){
		return $this->report;
	}
	
	public function setReport(DeviceReport $report){
		$this->report = $report;
	}
	
	public function getDevice(){
		return $this->device;
	}
	
	public function setDevice(Device $device){
		$this->device = $device;
	}
	
	public function getClassName(){
		return $this->className;
	}
	
	public function setClassName($name){
		$this->className = $name;
	}
	
}