<?php

namespace Models\SafetyPlace_Model;

use Models\DataObject\Place;
use Database\DAOFactory;
class SafetyPlaceModel{

	private $dao;
	
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::SAFETY_PLACE);
	}
	
	
	public function set(Place $place, $parentId){
		return $this->dao->set($place, $parentId);		
	}
	
	/**
	 * Get a home place array
	 * @param int $sUserId
	 * @return Place[]
	 */
	
	public function get($sUserId){
		return $this->dao->get($sUserId);
	}
	
	/**
	 * Get school place lat, lng and radius
	 * @return Place
	 */
	
	public function getSchool(){
		return $this->dao->getSchoolPlace();
	}
	
	public function getLatestPlaceStatus($sUserId){
		return $this->dao->getLatestPlaceStatus($sUserId);
	}
}