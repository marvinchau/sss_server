<?php

namespace Entities;

class AWSData
{
	// Basic Station Information
	private $_recordDt;
	private $_stationId;
	private $_zone;
	private $_pcDt;
	private $_startDt;
	private $_endDt;
	private $_page;
	
	private $_temperatureData;
	
	private $_rainData;
	private $_windData;
	private $_uvData;
	private $_solarData;
	private $_humidityData;
	private $_soilData;
	private $_barometerData;
	private $_dewData;
	private $_heatData;
	
	private $_userData;
	
	private $_latitude;
	private $_longitude;
	
	
	
	public function getRecordDt()
	{
		return $this->_recordDt;
	}
	
	public function setRecordDt(\DateTime $date)
	{
		$this->_recordDt = $date;
	}

	public function getStationId()
	{
		return $this->_stationId;
	}
	
	public function setStationId($stationId)
	{
		$this->_stationId = $stationId;
	}
	
	public function getZone()
	{
		return $this->_zone;
	}
	
	public function setZone($zone)
	{
		$this->_zone = $zone;
	}
	
	public function getPcDt()
	{
		return $this->_pcDt;
	}
	
	public function setPcDt(\DateTime $date)
	{
		$this->_pcDt = $date;
	}
	
	public function getStartDt()
	{
		return $this->_startDt;
	}
	
	public function setStartDt(\DateTime $date)
	{
		$this->_startDt = $date;
	}
	
	public function getEndDt()
	{
		return $this->_endDt;
	}
	
	public function setEndDt(\DateTime $date)
	{
		$this->_endDt = $date;
	}
	
	public function getPage()
	{
		return $this->_page;
	}
	
	public function setPage($page)
	{
		$this->_page = $page;
	}
	
	public function setTemperatureData(TemperatureData $data)
	{
		$this->_temperatureData = $data;
	}
	
	public function getTemperatureData()
	{
		return $this->_temperatureData;
	}


	public function setRainData(RainData $data)
	{
		$this->_rainData = $data;
	}
	
	public function getRainData()
	{
		return $this->_rainData;
	}
	
	public function setWindData(WindData $data)
	{
		$this->_windData = $data;
	}
	
	public function getWindData()
	{
		return $this->_windData;
	}
	
	public function setUvData(UvData $data)
	{
		$this->_uvData = $data;
	}
	
	public function getUvData()
	{
		return $this->_uvData;
	}
	
	public function setSolarData(SolarData $data)
	{
		$this->_solarData = $data;
	}
	
	public function getSolarData()
	{
		return $this->_solarData;
	}
	
	public function setHumidityData(HumidityData $data)
	{
		$this->_humidityData = $data;
	}
	
	public function getHumidityData()
	{
		return $this->_humidityData;
	}
	
	public function setSoilData(SoilData $data)
	{
		$this->_soilData = $data;
	}
	
	public function getSoilData()
	{
		return $this->_soilData;
	}
	
	public function setBarometerData(BarometerData $data)
	{
		$this->_barometerData = $data;
	}
	
	public function getBarometerData()
	{
		return $this->_barometerData;
	}
	
	public function setDewData(DewData $data)
	{
		$this->_dewData = $data;
	}
	
	public function getDewData()
	{
		return $this->_dewData;
	}
	
	public function setHeatData(HeatData $data)
	{
		$this->_heatData = $data;
	}
	
	public function getHeatData()
	{
		return $this->_heatData;
	}
	
	public function getUserData()
	{
		return $this->_userData;
	}
	
	public function setUserData(UserData $data)
	{
		$this->_userData = $data;
	}
	
	public function getLatitude()
	{
		return $this->_latitude;
	}
	
	public function setLatitude($latitude)
	{
		$this->_latitude = $latitude;
	}	
	
	public function getLongitude()
	{
		return $this->_longitude;
	}
	
	public function setLongitude($longitude)
	{
		$this->_longitude = $longitude;
	}
}