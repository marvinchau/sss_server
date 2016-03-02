<?php

namespace Models\Student_Model;

use Database\DAOFactory;
use Database\StudentDAO;
class StudentModel{
	

	/**
	 * 
	 * @var StudentDAO $dao
	 */
	
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
	
	public function getStudent($sUserId){
		return $this->dao->get($sUserId);
	}
	
	public function getStudentWithStatus($sUserId){
		return $this->dao->getWithStatus($sUserId);
	}
	
	public function getWithStatusByObserverId($observerId){
		return $this->dao->get
	}
	
}