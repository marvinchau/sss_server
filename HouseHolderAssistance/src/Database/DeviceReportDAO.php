<?php

namespace Database;

use Models\DataObject\DeviceReport;
use Database\DBHandler\SDMDBH;
use Database\DBHandler\SDMDBParameters;
use Utilities\SSSException;
use Utilities\ErrorFactory;
class DeviceReportDAO extends BasicDAO{
	
	public function add(DeviceReport $report){
		
		$sp = "sp_deviceReport_add";
		
		
		$pos = $report->getPosition();
// 		var_dump($pos);
// 		var_dump($report);
		$params = new SDMDBParameters();		
		$params->add($report->getUserId());
		$params->add($report->getDateTime());
		$params->add($report->getBatt());
		$params->add($report->getGPS());
		$params->add($report->getMovement());
		$params->add($report->getSignal());
		$params->add($pos->getLat());
		$params->add($pos->getLng());
		$params->add($pos->getAccuracy());
		$params->add($pos->getAtt());
		$params->add($pos->getDateTime());
// 		var_dump($params);
// 		echo "<BR>";
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
	
}