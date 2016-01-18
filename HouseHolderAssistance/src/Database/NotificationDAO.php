<?php

namespace Database;

use Models\DataObject\Notification;
use Database\DBHandler\SDMDBParameters;
class NotificationDAO extends BasicDAO{
	
	public function add(Notification $notification){
		

		$sp = "sp_notification_set";
		
		$params = new SDMDBParameters();
		$params->add($notification->getProirity());
		$params->add($notification->getUserId());
		$params->add($notification->getType());
		$params->add($notification->getMsg());
		$params->add($notification->getEventDt());
// 		var_dump($params);
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
// 		var_dump($result);
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'][0]['result'])){
					$ret = $result['response']['resultSet'][0]['result'];
				}else{
					throw new SSSException(ErrorFactory::ERR_DB_INVALID_RESULT);
				}
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
		
		
	}	
	
	public function getAll($userId){
		$sp = "sp_notification_getAllByUserId";

		$params = new SDMDBParameters();
		$params->add($userId);
		// 		var_dump($params);
		
		$result = $this->handler->execute_stored_procedure($sp, $params, 'array');
		// 		var_dump($result);
		$ret = false;
		
		if($result && $result['response']['system']['errorNo'] == 0){
			if(isset($result['response']['resultSet'])){
				if(isset($result['response']['resultSet'])){
					
					$dataRows = $result['response']['resultSet'];
					$notifications = array();
					
					foreach($dataRows as $dataRow){
						$notification = new Notification();
						$notification->setId($dataRow['notification_id']);
						$notification->setStatus($dataRow['status']);
						$notification->setProirity($dataRow['proirity']);
						$notification->setUserId($dataRow['user_id']);
						$notification->setType($dataRow['type']);
						$notification->setMsg($dataRow['message']);
						$notification->setEventDt($dataRow['event_dt']);
						$notification->setLastUpate($dataRow['last_update']);
						array_push($notifications, $notification);
					}
					$ret = $notifications;
					
				}else{
					throw new SSSException(ErrorFactory::ERR_DB_INVALID_RESULT);
				}
			}else {
				$ret = false;
			}
		} else {
			throw new SSSException(ErrorFactory::ERR_DB_EXECUTE);
		}
		return $ret;
	}
	
	
}