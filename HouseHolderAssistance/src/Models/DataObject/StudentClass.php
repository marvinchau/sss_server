<?php

namespace Models\DataObject;

class StudentClass{
	
	private $id;
	private $name;
	private $students;
	
	public function getId(){
		return $id;
	}
	
	public function setId($id){
		$this->id = $id;
	}
	
	public function getName(){
		return $this->name;
	}
	
	public function setName($name){
		$this->name = $name;
	}
	
	public function getStudents(){
		return $this->students;
	}
	
	public function addStudent(Student $student){
		if(!(isset($this->students) || is_array($this->students))){
			$this->students = array();
		}
		
		array_push($this->students, $student);
	}
	
	public function setStudents($studentList){
		$this->students = $studentList;
	}
	
}