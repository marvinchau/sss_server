<?php

namespace Entities;

class UvData
{
	private $_uUnit;
	private $_uCurrent;
//	private $_uHigh;
//	private $_uHighMonthly;
//	private $_uHighYearly;
	
	public function setUnit($unit){
		$this->_uUnit = $unit;
	}
	
	public function getUnit(){
		return $this->_uUnit;
	}
	
	public function setCurrent($value){
		$this->_uCurrent = $value;
	}
	
	public function getCurrent(){
		return $this->_uCurrent;
	}
/*	
	public function setHigh($value){
		$this->_uHigh = $value;
	}
	
	public function getHigh(){
		return $this->_uHigh;
	}
	
	public function setHighMonthly($value){
		$this->_uHighMonthly = $value;
	}
	
	public function getHighMonthly(){
		return $this->_uHighMonthly;
	}
	
	public function setHighYearly($value){
		$this->_uHighYearly = $value;
	}
	
	public function getHighYearly(){
		return $this->_uHighYearly;
	}
*/	
}