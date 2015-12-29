<?php

namespace Entities;

class RainData
{
	// Rain
	
	//Basic
	private $_rUnit;
	
//	private $_rYearly;
//	private $_rMonthly;
	private $_rDaily;
//	private $_rStorm;
	
	//Rate
	private $_rRateUnit;
	private $_rRate;
	
	//Rate High
//	private $_rRateHigh;
//	private $_rRateHighDt;
//	private $_rRateHighHour;
//	private $_rRateHighMonthly;
//	private $_rRateHighYearly;
	
	
	
	//Basic
	public function setUnit($unit)
	{
		$this->_rUnit = $unit;
	}
	
	public function getUnit()
	{
		return $this->_rUnit;
	}
/*	
	public function setYearly($value)
	{
		$this->_rYearly = $value;
	}
	
	public function getYearly()
	{
		return $this->_rYearly;
	}
	

	public function setMonthly($value)
	{
		$this->_rMonthly = $value;
	}
	
	public function getMonthly()
	{
		return $this->_rMonthly;
	}
*/	
	public function setDaily($value)
	{
		$this->_rDaily = $value;
	}
	
	public function getDaily()
	{
		return $this->_rDaily;
	}
/*	
	public function setStorm($value)
	{
		$this->_rStorm = $value;
	}
	
	public function getStorm()
	{
		return $this->_rStorm;
	}
*/	
	//Rate
	public function setRateUnit($unit)
	{
		$this->_rRateUnit = $unit;
	}
	
	public function getRateUnit()
	{
		return $this->_rRateUnit;
	}
	
	public function setRate($rate)
	{
		$this->_rRate = $rate;
	}
	
	public function getRate()
	{
		return $this->_rRate;
	}
	

/*	
	//Rate High
	public function setRateHigh($value)
	{
		$this->_rRateHigh = $value;
	}
	
	public function getRateHigh()
	{
		return $this->_rRateHigh;
	}
	
	public function setRateHighDt(\DateTime $value)
	{
		$this->_rRateHighDt = $value;
	}
	
	public function getRateHighDt()
	{
		return $this->_rRateHighDt;
	}
	
	public function setRateHighHour($value)
	{
		$this->_rRateHighHour = $value;
	}
	
	public function getRateHighHour()
	{
		return $this->_rRateHighHour;
	}
	
	public function setRateHighMonthly($value)
	{
		$this->_rRateHighMonthly = $value;
	}
	
	public function getRateHighMonthly()
	{
		return $this->_rRateHighMonthly;
	}
	
	public function setRateHighYearly($value)
	{
		$this->_rRateHighYearly = $value;
	}
	
	public function getRateHighYearly()
	{
		return $this->_rRateHighYearly;
	}
*/	
	
}