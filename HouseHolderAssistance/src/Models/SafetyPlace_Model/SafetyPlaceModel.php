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
}