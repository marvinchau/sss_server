<?php

namespace Models\DataObject;

class Attendence{
	
	private $classId;
	private $studentUserId;
	private $teacherUserId;
	private $submitDt;
	private $last_update;
	private $isAttendence;
	
	public function getClassId(){
		return $this->classId;
	}
	
	public function setClassId($id){
		$this->classId = $id;
	}
	
	public function getStudentUserId(){
		return $this->studentUserId;
	}
	
	public function setStudentUserId($userId){
		$this->studentUserId = $userId;
	}
	
	public function getTeacherUserId(){
		return $this->teacherUserId;
	}
	
	public function setTeacherUserId($userId){
		$this->teacherUserId = $userId;
	}
	
	public function getSubmitDt(){
		return $this->submitDt;
	}
	
	public function setSubmitDt($dt){
		$this->submitDt = $dt;
	}
	
	public function getLastUpdate(){
		return $this->last_update;
	}
	
	public function setLastUpdate($dt){
		$this->last_update = $dt;
	}
	
	public function isAttendence(){
		return $this->isAttendence;
	}
	
	public function setAttendence($isAttendence){
		$this->isAttendence - $isAttendence;
	}
	
}