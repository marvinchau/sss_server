<?php

namespace Entities;

class HeatData
{
	private $_hOutsideIdx;
//	private $_hHighIdx;
//	private $_hHighIdxDt;
//	private $_hHighMonthlyIdx;
//	private $_hHighYearlyIdx;
//	private $_hInsideIdx;
//	private $_hThw;
	
	public function setOutsideIdx($value){
		$this->_hOutsideIdx = $value;
	}
	
	public function getOutsideIdx(){
		return $this->_hOutsideIdx;
	}
/*	
	public function setHighIdx($value){
		$this->_hHighIdx = $value;
	}
	
	public function getHighIdx(){
		return $this->_hHighIdx;
	}
	
	public function setHighIdxDt(\DateTime $value){
		$this->_hHighIdxDt = $value;
	}
	
	public function getHighIdxDt(){
		return $this->_hHighIdxDt;
	}
	
	public function setHighMonthlyIdx($value){
		$this->_hHighMonthlyIdx = $value;
	}
	
	public function getHighMonthlyIdx(){
		return $this->_hHighMonthlyIdx;
	}
	
	public function setHighYearlyIdx($value){
		$this->_hHighYearlyIdx = $value;
	}
	
	public function getHighYearlyIdx(){
		return $this->_hHighYearlyIdx;
	}
	
	public function setInsideIdx($value){
		$this->_hInsideIdx = $value;
	}
	
	public function getInsideIdx(){
		return $this->_hInsideIdx;
	}
	
	public function setThw($value){
		$this->_hThw = $value;
	}
	
	public function getThw(){
		return $this->_hThw;
	}
*/
}