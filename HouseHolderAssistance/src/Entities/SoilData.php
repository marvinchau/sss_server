<?php

namespace Entities;

class SoilData
{
	private $_sUnit;
	private $_sSoilMoist1;
//	private $_sHighSoilMoist1;
//	private $_sLowSoilMoist1;
//	private $_sHighSoilMoistDt1;
//	private $_sLowSoilMoistDt1;
	private $_sSoilTemp1;
//	private $_sHighSoilTemp1;
//	private $_sLowSoilTemp1;
//	private $_sHighSoilTempDt1;
//	private $_sLowSoilTempDt1;
	
	public function setUnit($unit){
		$this->_sUnit = $unit;
	}
	
	public function getUnit(){
		return $this->_sUnit;
	}
	
	public function setSoilMoist1($value){
		$this->_sSoilMoist1 = $value;
	}
	
	public function getSoilMoist1(){
		return $this->_sSoilMoist1;
	}
/*	
	public function setHighSoilMoist1($value){
		$this->_sHighSoilMoist1 = $value;
	}
	
	public function getHighSoilMoist1(){
		return $this->_sHighSoilMoist1;
	}
	
	public function setLowSoilMoist1($value){
		$this->_sLowSoilMoist1 = $value;
	}
	
	public function getLowSoilMoist1(){
		return $this->_sLowSoilMoist1;
	}
	
	public function setHighSoilMoistDt1(\DateTime $value){
		$this->_sHighSoilMoistDt1 = $value;
	}
	
	public function getHighSoilMoistDt1(){
		return $this->_sHighSoilMoistDt1;
	}
	
	public function setLowSoilMoistDt1(\DateTime $value){
		$this->_sLowSoilMoistDt1 = $value;
	}
	
	public function getLowSoilMoistDt1(){
		return $this->_sLowSoilMoistDt1;
	}
*/	
	public function setSoilTemp1($value){
		$this->_sSoilTemp1 = $value;
	}
	
	public function getSoilTemp1(){
		return $this->_sSoilTemp1;
	}
/*	
	public function setHighSoilTemp1($value){
		$this->_sHighSoilTemp1 = $value;
	}
	
	public function getHighSoilTemp1(){
		return $this->_sHighSoilTemp1;
	}
	
	public function setLowSoilTemp1($value){
		$this->_sLowSoilTemp1 = $value;
	}
	
	public function getLowSoilTemp1(){
		return $this->_sLowSoilTemp1;
	}
	
	public function setHighSoilTempDt1(\DateTime $value){
		$this->_sHighSoilTempDt1 = $value;
	}
	
	public function getHighSoilTempDt1(){
		return $this->_sHighSoilTempDt1;
	}
	
	public function setLowSoilTempDt1(\DateTime $value){
		$this->_sLowSoilTempDt1 = $value;
	}
	
	public function getLowSoilTempDt1(){
		return $this->_sLowSoilTempDt1;
	}
*/	
}