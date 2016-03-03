<?php

namespace Models\Attendence_Model;


use Database\DAOFactory;
use Models\DataObject\Attendence;
class AttendenceModel{
	
	
	private $dao;
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::ATTENDENCE);
	}
	
	public function add(Attendence $attend){
		return $this->add($attend);
	}
	
	
}