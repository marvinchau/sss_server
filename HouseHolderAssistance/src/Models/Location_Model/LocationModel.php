<?php

namespace Models\Location_Model;

class LocationModel{
	
	
	//Code amended form https://www.geodatasource.com/developers/php
	
	/**
	 * Compare two position and return is in area
	 * @param double $areaLat
	 * @param double $areaLng
	 * @param double $radius
	 * @param double $targetLat
	 * @param double $targetLng
	 * @return boolean
	 */
	
	
	public function isInArea($areaLat, $areaLng, $radius, $targetLat, $targetLng){
		
		$theta = $lon1 - $lon2;
		$dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
		$dist = acos($dist);
		$dist = rad2deg($dist);
		$miles = $dist * 60 * 1.1515;
		$unit = strtoupper($unit);
		
		if($miles <= $radius)
		{
			return true;
		}		
		else{
			return false;
		}
// 		if ($unit == "K") {
// 			return ($miles * 1.609344);
// 		} else if ($unit == "N") {
// 			return ($miles * 0.8684);
// 		} else {
// 			return $miles;
// 		}
// 		}
		
// 		echo distance(32.9697, -96.80322, 29.46786, -98.53506, "M") . " Miles<br>";
// 		echo distance(32.9697, -96.80322, 29.46786, -98.53506, "K") . " Kilometers<br>";
// 		echo distance(32.9697, -96.80322, 29.46786, -98.53506, "N") . " Nautical Miles<br>";
	}
	
}