<?php

namespace Models\DataObject;

class Student{
	
	private $name;
	private $userId;
	private $studentId;
	private $classId;
	
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
	
}