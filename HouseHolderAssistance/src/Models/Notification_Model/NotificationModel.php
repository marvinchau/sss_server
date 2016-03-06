<?php

namespace Models\Notification_Model;

use Models\DataObject\Notification;
use Database\DAOFactory;
use Database\NotificationDAO;
class NotificationModel{
	
	/**
	 * 
	 * @var NotificationDAO dao
	 */
	private $dao;
	
	
	public function __construct(){
		$this->dao = DAOFactory::getDAO(DAOFactory::NOTIFICATION);
	}
	
	
	public function addNotification(Notification $notification){
		return $this->dao->add($notification);
	}
	
	public function getNotifications($userId){
		return $this->dao->getAll($userId);
	}
}