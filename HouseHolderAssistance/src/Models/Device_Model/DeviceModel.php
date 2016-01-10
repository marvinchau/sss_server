<?php

namespace Models\Device_Model;

use Database\DAOFactory;
use Models\DataObject\Device;
class DeviceModel{
	
	private $dao;
	
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::DEVICE);
	}
	public function set(Device $device){
		return $this->dao->set($device);
	}
}