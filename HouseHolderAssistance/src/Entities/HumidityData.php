<?php

namespace Entities;

class HumidityData
{
	private $_hUnit;
//	private $_hInside;
//	private $_hHighInside;
//	private $_hHighInsideDt;
//	private $_hHighInsideMonthly;
//	private $_hHighInsideYearly;
//	private $_hLowInside;
//	private $_hLowInsideDt;
//	private $_hLowInsideMonthly;
//	private $_hLowInsideYearly;
	private $_hOutside;
//	private $_hLow;
//	private $_hLowDt;
//	private $_hLowMonthly;
//	private $_hLowYearly;
//	private $_hHigh;
//	private $_hHighDt;
//	private $_hHighMonthly;
//	private $_hHighYearly;
	
	public function setUnit($unit){
		$this->_hUnit = $unit;
	}
	
	public function getUnit(){
		return $this->_hUnit;
	}
/*	
	public function setInside($value){
		$this->_hInside = $value;
	}
	
	public function getInside(){
		return $this->_hInside;
	}
	
	public function setHighInside($value){
		$this->_hHighInside = $value;
	}
	
	public function getHighInside(){
		return $this->_hHighInside;
	}
	
	public function setHighInsideDt(\DateTime $value){
		$this->_hHighInsideDt = $value;
	}
	
	public function getHighInsideDt(){
		return $this->_hHighInsideDt;
	}
	
	public function setHighInsideMonthly($value){
		$this->_hHighInsideMonthly = $value;
	}
	
	public function getHighInsideMonthly(){
		return $this->_hHighInsideMonthly;
	}
	
	public function setHighInsideYearly($value){
		$this->_hHighInsideYearly = $value;
	}
	
	public function getHighInsideYearly(){
		return $this->_hHighInsideYearly;
	}
	
	public function setLowInside($value){
		$this->_hLowInside = $value;
	}
	
	public function getLowInside(){
		return $this->_hLowInside;
	}
	
	public function setLowInsideDt(\DateTime $value){
		$this->_hLowInsideDt = $value;
	}
	
	public function getLowInsideDt(){
		return $this->_hLowInsideDt;
	}
	
	public function setLowInsideMonthly($value){
		$this->_hLowInsideMonthly = $value;
	}
	
	public function getLowInsideMonthly(){
		return $this->_hLowInsideMonthly;
	}
	
	public function setLowInsideYearly($value){
		$this->_hLowInsideYearly = $value;
	}
	
	public function getLowInsideYearly(){
		return $this->_hLowInsideYearly;
	}
*/	
	public function setOutside($value){
		$this->_hOutside = $value;
	}
	
	public function getOutside(){
		return $this->_hOutside;
	}
/*	
	public function setLow($value){
		$this->_hLow = $value;
	}
	
	public function getLow(){
		return $this->_hLow;
	}
	
	public function setLowDt(\DateTime $value){
		$this->_hLowDt = $value;
	}
	
	public function getLowDt(){
		return $this->_hLowDt;
	}
	
	public function setLowMonthly($value){
		$this->_hLowMonthly = $value;
	}
	
	public function getLowMonthly(){
		return $this->_hLowMonthly;
	}
	
	public function setLowYearly($value){
		$this->_hLowYearly = $value;
	}
	
	public function getLowYearly(){
		return $this->_hLowYearly;
	}
	
	public function setHigh($value){
		$this->_hHigh = $value;
	}
	
	public function getHigh(){
		return $this->_hHigh;
	}
	
	public function setHighDt(\DateTime $value){
		$this->_hHighDt = $value;
	}
	
	public function getHighDt(){
		return $this->_hHighDt;
	}
	
	public function setHighMonthly($value){
		$this->_hHighMonthly = $value;
	}
	
	public function getHighMonthly(){
		return $this->_hHighMonthly;
	}
	
	public function setHighYearly($value){
		$this->_hHighYearly = $value;
	}
	
	public function getHighYearly(){
		return $this->_hHighYearly;
	}
*/
}