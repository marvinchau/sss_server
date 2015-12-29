<?php

namespace Entities;

class TemperatureData
{
	// Temperature
	
	//Basic
	private $_tUnit;
	
	
	//Inside
//	private $_tInside;
// 	private $_tInsideDt;
	
	//High
//	private $_tInsideHigh;
//	private $_tInsideHighDt;
//	private $_tInsideHighMonthly;
//	private $_tInsideHighYearly;
	
	//Low
//	private $_tInsideLow;
//	private $_tInsideLowDt;
//	private $_tInsideLowMonthly;
//	private $_tInsideLowYearly;
	
	
	//Outside
	private $_tOutside;
// 	private $_tOutsideDt;
	
	//High
//	private $_tOutsideHigh;
//	private $_tOutsideHighDt;
//	private $_tOutsideHighMonthly;
//	private $_tOutsideHighYearly;
	
	//Low
//	private $_tOutsideLow;
//	private $_tOutsideLowDt;
//	private $_tOutsideLowMonthly;
//	private $_tOutsideLowYearly;
	
	
	
	//Basic
	public function setUnit($unit)
	{
		$this->_tUnit = $unit;
	}
	
	public function getUnit()
	{
		return $this->_tUnit;
	}
/*	
	//Inside
	public function setInsideTemperature($value)
	{
		$this->_tInside = $value;
	}
	
	public function getInsideTemperature()
	{
		return $this->_tInside;
	}
	
// 	public function setInsideTemperatureDt(\DateTime $value)
// 	{
// 		$this->_tInsideDt = $value;
// 	}
	
// 	public function getInsideTemperatureDt()
// 	{
// 		return $this->_tInsideDt;
// 	}
	
	//Inside - High
	public function setInsideHighTemperature($value)
	{
		$this->_tInsideHigh = $value;
	}
	
	public function getInsideHighTemperature()
	{
		return $this->_tInsideHigh;
	}
	
	public function setInsideHighTemperatureDt(\DateTime $value)
	{
		$this->_tInsideHighDt = $value;
	}
	
	public function getInsideHighTemperatureDt()
	{
		return $this->_tInsideHighDt;
	}

	public function setInsideHighTemperatureMonthly($value)
	{
		$this->_tInsideHighMonthly = $value;
	}
	
	public function getInsideHighTemperatureMonthly()
	{
		return $this->_tInsideHighMonthly;
	}

	public function setInsideHighTemperatureYearly($value)
	{
		$this->_tInsideHighYearly = $value;
	}
	
	public function getInsideHighTemperatureYearly()
	{
		return $this->_tInsideHighYearly;
	}
	
	//Inside - Low
	
	public function setInsideLowTemperature($value)
	{
		$this->_tInsideLow = $value;
	}
	
	public function getInsideLowTemperature()
	{
		return $this->_tInsideLow;
	}
	
	public function setInsideLowTemperatureDt(\DateTime $value)
	{
		$this->_tInsideLowDt = $value;
	}
	
	public function getInsideLowTemperatureDt()
	{
		return $this->_tInsideLowDt;
	}
	
	public function setInsideLowTemperatureMonthly($value)
	{
		$this->_tInsideLowMonthly = $value;
	}
	
	public function getInsideLowTemperatureMonthly()
	{
		return $this->_tInsideLowMonthly;
	}
	
	public function setInsideLowTemperatureYearly($value)
	{
		$this->_tInsideLowYearly = $value;
	}
	
	public function getInsideLowTemperatureYearly()
	{
		return $this->_tInsideLowYearly;
	}
	
	
*/
	//Outside
	public function setOutsideTemperature($value)
	{
		$this->_tOutside = $value;
	}
	
	public function getOutsideTemperature()
	{
		return $this->_tOutside;
	}
/*	
// 	public function setOutsideTemperatureDt(\DateTime $value)
// 	{
// 		$this->_tOutsideDt = $value;
// 	}
	
// 	public function getOutsideTemperatureDt()
// 	{
// 		return $this->_tOutsideDt;
// 	}
	
	//Outside - High
	public function setOutsideHighTemperature($value)
	{
		$this->_tOutsideHigh = $value;
	}
	
	public function getOutsideHighTemperature()
	{
		return $this->_tOutsideHigh;
	}
	
	public function setOutsideHighTemperatureDt(\DateTime $value)
	{
		$this->_tOutsideHighDt = $value;
	}
	
	public function getOutsideHighTemperatureDt()
	{
		return $this->_tOutsideHighDt;
	}
	
	public function setOutsideHighTemperatureMonthly($value)
	{
		$this->_tOutsideHighMonthly = $value;
	}
	
	public function getOutsideHighTemperatureMonthly()
	{
		return $this->_tOutsideHighMonthly;
	}
	
	public function setOutsideHighTemperatureYearly($value)
	{
		$this->_tOutsideHighYearly = $value;
	}
	
	public function getOutsideHighTemperatureYearly()
	{
		return $this->_tOutsideHighYearly;
	}
	
	//Outside - Low
	
	public function setOutsideLowTemperature($value)
	{
		$this->_tOutsideLow = $value;
	}
	
	public function getOutsideLowTemperature()
	{
		return $this->_tOutsideLow;
	}
	
	public function setOutsideLowTemperatureDt(\DateTime $value)
	{
		$this->_tOutsideLowDt = $value;
	}
	
	public function getOutsideLowTemperatureDt()
	{
		return $this->_tOutsideLowDt;
	}
	
	public function setOutsideLowTemperatureMonthly($value)
	{
		$this->_tOutsideLowMonthly = $value;
	}
	
	public function getOutsideLowTemperatureMonthly()
	{
		return $this->_tOutsideLowMonthly;
	}
	
	public function setOutsideLowTemperatureYearly($value)
	{
		$this->_tOutsideLowYearly = $value;
	}
	
	public function getOutsideLowTemperatureYearly()
	{
		return $this->_tOutsideLowYearly;
	}
*/	
}