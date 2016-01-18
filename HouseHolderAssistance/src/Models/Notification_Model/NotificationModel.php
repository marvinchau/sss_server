<?php

namespace Models\Notification_Model;

use Models\DataObject\Notification;
use Database\DAOFactory;
class NotificationModel{
	

	private $dao;
	
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::NOTIFICATION);
	}
	
	
	public function addNotification(Notification $notification){
		return $this->dao->add($notification);
	}
}