<?php

namespace Models\Student_Model;

use Database\DAOFactory;
class StudentModel{
	

	private $dao;
	
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::STUDENT);
	}
	
	public function getWithStatusByClassId($classId){
		return $this->dao->getWithStatusByClassId($classId);
	}
	
	public function getWithStatusByParentId($parentId){
		return $this->dao->getWithStatusByParentId($parentId);
	}
	
	
	
}