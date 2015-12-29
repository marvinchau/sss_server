<?php

namespace Entities;

class SolarData
{
	private $_solarUnit;
	private $_solarEtDaily;
//	private $_solarEtMonthly;
//	private $_solarEtYearly;
	private $_solarRadiation;
//	private $_solarHighRadiation;
//	private $_solarHighRadiationMonthly;
//	private $_solarHighRadiationYearly;
	
	public function setUnit($unit){
		$this->_solarUnit = $unit;
	}
	
	public function getUnit(){
		return $this->_solarUnit;
	}
	
	public function setEtDaily($value){
		$this->_solarEtDaily = $value;
	}
	
	public function getEtDaily(){
		return $this->_solarEtDaily;
	}
/*	
	public function setEtMonthly($value){
		$this->_solarEtMonthly = $value;
	}
	
	public function getEtMonthly(){
		return $this->_solarEtMonthly;
	}
	
	public function setEtYearly($value){
		$this->_solarEtYearly = $value;
	}
	
	public function getEtYearly(){
		return $this->_solarEtYearly;
	}
*/	
	public function setRadiation($value){
		$this->_solarRadiation = $value;
	}
	
	public function getRadiation(){
		return $this->_solarRadiation;
	}
/*ß	
	public function setHighRadiation($value){
		$this->_solarHighRadiation = $value;
	}
	
	public function getHighRadiation(){
		return $this->_solarHighRadiation;
	}
	
	public function setHighRadiationMonthly($value){
		$this->_solarHighRadiationMonthly = $value;
	}
	
	public function getHighRadiationMonthly(){
		return $this->_solarHighRadiationMonthly;
	}
	
	public function setHighRadiationYearly($value){
		$this->_solarHighRadiationYearly = $value;
	}
	
	public function getHighRadiationYearly(){
		return $this->_solarHighRadiationYearly;
	}
*/
}