<?php

namespace Models\Zone;

use Models\Log\LogManager;

use Database\DAOFactory;
use Entities\ZoneScope;
use Entities\Zone;
use Utilities\GetDistance;
use Utilities\DistanceUtils;

class ZoneManager
{
	
	public function getZoneByLatLong($lat, $long){
		$mysqlDAOFactory = DAOFactory::getDAO(DAOFactory::MYSQL);
		
		
		$model = $mysqlDAOFactory->getZoneDAO();
		$zoneScopeResult = $model->getZoneScopeData();

		$minZoneName = "Out of area";
		if($zoneScopeResult == null){
			$logManager = LogManager::getInstance();
			$logManager->log(new \DateTime(), "Zone Manager", "No Zone Scope Defined");
		} else {
			if($zoneScopeResult->checkInsideScope($lat, $long)){
				$zoneResult = $model->getZoneData();
				$minDistance = -1;
				$distance = 0;
				foreach ($zoneResult as $zone)
				{
					if ($zone == "Data Not Found"){
						$logManager = LogManager::getInstance();
						$logManager->log(new \DateTime(), "Zone Manager", "No Zone Defined");
					} else {
						$distance = DistanceUtils::getDistance($lat, $long, $zone->getZoneLat(), $zone->getZoneLong(), "K");
						if($minDistance == -1 || $distance < $minDistance  ){
							$minDistance = $distance;
							$minZoneName = $zone->getZoneName();
						}
					}
				}
			}	
		}
		return $minZoneName;
	}
}