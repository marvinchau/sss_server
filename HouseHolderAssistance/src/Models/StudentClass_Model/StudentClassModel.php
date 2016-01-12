<?php

namespace Models\StudentClass_Model;

use Database\DAOFactory;
class StudentClassModel{


	private $dao;
	
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::STUDENT_CLASS);
	}
	
	public function getAll(){
		return $this->dao->getAll();
	}
	
	
	
}