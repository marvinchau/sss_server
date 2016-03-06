<?php

namespace Models\Attendence_Model;


use Database\DAOFactory;
use Models\DataObject\Attendence;
use Database\AttendenceDAO;
class AttendenceModel{
	
	/**
	 * 
	 * @var AttendenceDAO dao
	 */
	private $dao;
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::ATTENDENCE);
	}
	
	/**
	 * 
	 * @param Attendence $attend
	 */
	
	public function add(Attendence $attend){
		return $this->dao->add($attend);
	}
	
	
}