<?php

namespace Entities;

use Utilities\DistanceUtils;

class ZoneScope
{
// 	private $_zoneScopeVal;
	
// 	public function getZoneScopeVal()
// 	{
// 		return $this->_zoneScopeVal;
// 	}
	
// 	public function setZoneScopeVal($zoneScopeVal)
// 	{
// 		$this->_zoneScopeVal = $zoneScopeVal;
// 	}

	private $_zoneScopeLat;
	private $_zoneScopeLong;
	private $_zoneScopeRadius;
	
	public function getZoneScopeLat()
	{
		return $this->_zoneScopeLat;
	}
	
	public function setZoneScopeLat($zoneScopeLat)
	{
		$this->_zoneScopeLat = $zoneScopeLat;
	}
	
	public function getZoneScopeLong()
	{
		return $this->_zoneScopeLong;
	}
	
	public function setZoneScopeLong($zoneScopeLong)
	{
		$this->_zoneScopeLong = $zoneScopeLong;
	}
	
	public function getZoneScopeRadius()
	{
		return $this->_zoneScopeRadius;
	}
	
	public function setZoneScopeRadius($zoneScopeRadius)
	{
		$this->_zoneScopeRadius = $zoneScopeRadius;
	}

	public function checkInsideScope($lat, $long)
	{
		if($lat == 0 && $long == 0){
			return false;
		}
		
		$distance = DistanceUtils::getDistance($lat, $long, $this->_zoneScopeLat, $this->_zoneScopeLong, "K");
		$distance = $distance *1000;
// 		return $distance;
		
// 		$x = pow(abs($lat - $this->_zoneScopeLat), 2);
// 		$y = pow(abs($long - $this->_zoneScopeLong), 2);
// 		$result = ($x + $y);
		
		
		if($distance <= $this->_zoneScopeRadius){
			return true;
		}else {
			return false;
		}
	}
}

?>