<?php

namespace Models\Group_Model;

use Database\GroupDAO;
use Database\DAOFactory;
use Utilities\SSSException;

class GroupModel
{
	/**
	 * 
	 * @var GroupDAO $dao
	 */
	private $dao;
	
	public function __construct()
	{
		$this->dao = DAOFactory::getDAO(DAOFactory::GROUP);
	}
	
	
	public function getObserver($observerId)
	{
		return $this->dao->getObservees($observerId);
	}
	
	public function removeGroup($observerId)
	{
		return $this->dao->remove($observerId);	
	}
	
	
	/**
	 * 
	 * @param int $observerId
	 * @param int[] $observeeIds
	 */
	public function addObservee($observerId, $observeeIds){
		try{
			foreach($observeeIds as $observeeId){
				$this->dao->addObservee($observerId, $observeeId);
			}
			return true;
		}catch(SSSException $e){
			return $e->getError();
		}
	}
}