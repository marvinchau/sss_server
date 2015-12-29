<?php

namespace Entities;

class BarometerData
{
	private $_bUnit;
	private $_bCurrent;
//	private $_bTrend;
//	private $_bLow;
//	private $_bHigh;
//	private $_bLowMonthly;
//	private $_bHighMonthly;
//	private $_bLowYearly;
//	private $_bHighYearly;
//	private $_bLowDt;
//	private $_bHighDt;
	
	public function setUnit($unit){
		$this->_bUnit = $unit;
	}
	
	public function getUnit(){
		return $this->_bUnit;
	}
	
	public function setCurrent($value){
		$this->_bCurrent = $value;
	}
	
	public function getCurrent(){
		return $this->_bCurrent;
	}
/*	
	public function setTrend($value){
		$this->_bTrend = $value;
	}
	
	public function getTrend(){
		return $this->_bTrend;
	}
	
	public function setLow($value){
		$this->_bLow = $value;
	}
	
	public function getLow(){
		return $this->_bLow;
	}
	
	public function setHigh($value){
		$this->_bHigh = $value;
	}
	
	public function getHigh(){
		return $this->_bHigh;
	}
	
	public function setLowMonthly($value){
		$this->_bLowMonthly = $value;
	}
	
	public function getLowMonthly(){
		return $this->_bLowMonthly;
	}
	
	public function setHighMonthly($value){
		$this->_bHighMonthly = $value;
	}
	
	public function getHighMonthly(){
		return $this->_bHighMonthly;
	}
	
	public function setLowYearly($value){
		$this->_bLowYearly = $value;
	}
	
	public function getLowYearly(){
		return $this->_bLowYearly;
	}
	
	public function setHighYearly($value){
		$this->_bHighYearly = $value;
	}
	
	public function getHighYearly(){
		return $this->_bHighYearly;
	}
	
	public function setLowDt(\DateTime $value){
		$this->_bLowDt = $value;
	}
	
	public function getLowDt(){
		return $this->_bLowDt;
	}
	
	public function setHighDt(\DateTime $value){
		$this->_bHighDt = $value;
	}
	
	public function getHighDt(){
		return $this->_bHighDt;
	}
*/
}