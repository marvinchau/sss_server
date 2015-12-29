<?php
namespace Entities;

class Zone
{
	private $_zoneId;
	private $_zoneName;
	private $_zoneLat;
	private $_zonrLong;
	
	public function getZoneId()
	{
		return $this->_zoneId;
	}
	
	public function setZoneId($zoneId)
	{
		$this->_zoneId = $zoneId;
	}
	
	public function getZoneName()
	{
		return $this->_zoneName;
	}
	
	public function setZoneName($zoneName)
	{
		$this->_zoneName = $zoneName;
	}
	
	public function getZoneLat()
	{
		return $this->_zoneLat;	
	}
	
	public function setZoneLat($zoneLat)
	{
		$this->_zoneLat = $zoneLat;
	}
	
	public function getZoneLong()
	{
		return $this->_zonrLong;
	}
	
	public function setZoneLong($zoneLong)
	{
		$this->_zonrLong = $zoneLong;
	}
}
?>