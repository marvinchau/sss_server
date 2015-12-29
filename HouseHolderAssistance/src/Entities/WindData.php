<?php

namespace Entities;

class WindData
{
	// Rain
	
	//Basic
	private $_wUnit;
	
	private $_wDegrees;

	//Speed
	private $_wSpeed;
	private $_w10MinAvg;
//	private $_wSpeedHigh;
//	private $_wSpeedHighDt;
//	private $_wSpeedHighMonthly;
//	private $_wSpeedHighYearly;
	
	private $_wDirection;
	
	private $_wChill;
//	private $_wChillLow;
//	private $_wChillLowDt;
//	private $_wChillLowMonthly;
//	private $_wChillLowYearly;
	
	
	
	//Basic
	public function setUnit($unit)
	{
		$this->_wUnit = $unit;
	}
	
	public function getUnit()
	{
		return $this->_wUnit;
	}
	
	public function setDegrees($value)
	{
		$this->_wDegrees = $value;
	}
	
	public function getDegrees()
	{
		return $this->_wDegrees;
	}
	
	//Speed
	public function setSpeed($value)
	{
		$this->_wSpeed = $value;
	}
	
	public function getSpeed()
	{
		return $this->_wSpeed;
	}
	

	public function set10MinAvg($value)
	{
		$this->_w10MinAvg = $value;
	}
	
	public function get10MinAvg()
	{
		return $this->_w10MinAvg;
	}
/*
	public function setSpeedHigh($value)
	{
		$this->_wSpeedHigh = $value;
	}
	
	public function getSpeedHigh()
	{
		return $this->_wSpeedHigh;
	}

	public function setSpeedHighDt(\DateTime $value)
	{
		$this->_wSpeedHighDt = $value;
	}
	
	public function getSpeedHighDt()
	{
		return $this->_wSpeedHighDt;
	}

	public function setSpeedHighMonthly($value)
	{
		$this->_wSpeedHighMonthly = $value;
	}
	
	public function getSpeedHighMonthly()
	{
		return $this->_wSpeedHighMonthly;
	}

	public function setSpeedHighYearly($value)
	{
		$this->_wSpeedHighYearly = $value;
	}
	
	public function getSpeedHighYearly()
	{
		return $this->_wSpeedHighYearly;
	}
*/
	public function setDirection($value)
	{
		$this->_wDirection = $value;
	}
	
	public function getDirection()
	{
		return $this->_wDirection;
	}

	public function setChill($value)
	{
		$this->_wChill = $value;
	}
	
	public function getChill()
	{
		return $this->_wChill;
	}
/*	
	public function setChillLow($value)
	{
		$this->_wChillLow = $value;
	}
	
	public function getChillLow()
	{
		return $this->_wChillLow;
	}
	
	public function setChillLowDt(\DateTime $value)
	{
		$this->_wChillLowDt = $value;
	}
	
	public function getChillLowDt()
	{
		return $this->_wChillLowDt;
	}
	
	public function setChillLowMonthly($value)
	{
		$this->_wChillLowMonthly = $value;
	}
	
	public function getChillLowMonthly()
	{
		return $this->_wChillLowMonthly;
	}
	
	public function setChillLowYearly($value)
	{
		$this->_wChillLowYearly = $value;
	}
	
	public function getChillLowYearly()
	{
		return $this->_wChillLowYearly;
	}
*/	
}