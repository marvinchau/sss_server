<?php

namespace Models\XML;

use Entities\SolarData;

use Entities\HeatData;

use Entities\DewData;

use Entities\BarometerData;

use Entities\SoilData;

use Entities\HumidityData;

use Entities\UvData;

use Entities\WindData;

use Entities\AWSData;
use Entities\TemperatureData;
use Entities\RainData;
use Models\Log\LogManager;
class AWSXMLParser implements XMLParser
{
	public function parse(\SimpleXMLElement $xmlDoc)
	{
		$result = $xmlDoc->xpath('/AWSData/Station');
		$logManager = LogManager::getInstance();
		$logManager->log(new \DateTime(), "AWS Cntr", "XML can be parser");
		$logManager->log(new \DateTime(), "AWS Cntr", "data");
		$data = new AWSData();

		foreach($result[0]->attributes() as $attr=>$value)
		{
		
			// 			echo $attr . "<BR>";
			// 			echo $value . "<BR>";
		
			if($value == "" || strpos($value, '----')|| strpos($value, '---') !== false)
			{
				$value = null;
			}
			//echo $value . "<BR>";
			switch($attr)
			{
				case "id":
					$logManager->log(new \DateTime(), "AWS Cntr", "ID" . $value);
					$data->setStationId($value);
					break;
				case "date":
// 					echo $value;
					$logManager->log(new \DateTime(), "AWS Cntr", "Date Start" . $value);
					$data->setRecordDt(new \DateTime($value));
					$logManager->log(new \DateTime(), "AWS Cntr", "Date End" . $value);
// 					var_dump($data);
// 					echo $data->getRecordDt()->format(DATE_FORMAT);
					break;
				case "pc-date":
					$logManager->log(new \DateTime(), "AWS Cntr", "PC Date Start" . $value);
					$data->setPcDt(new \DateTime($value));
					$logManager->log(new \DateTime(), "AWS Cntr", "PC Date End" . $value);
					break;
				default:
					break;
			}
		}
		
		foreach($result[0]->children() as $child)
		{
			
// 			var_dump($child);
// 			echo($child->getName());
// 			echo "<BR>";
			
			switch($child->getName())
			{
				case "temperature":
// 					var_dump($tempData);
// 					echo "<BR>";
					
					$logManager->log(new \DateTime(), "AWS Cntr", "parser tempature");
					$data->setTemperatureData($this->parseTemperatureData($child));
					$logManager->log(new \DateTime(), "AWS Cntr", "parser tempature end");
					
					break;
				case "rain":
// 					var_dump($tempData);
// 					echo "<BR>";
					//print_r($child);
					$logManager->log(new \DateTime(), "AWS Cntr", "parser rain");
					$data->setRainData($this->parseRainData($child));
					break;
				case "wind":
					$logManager->log(new \DateTime(), "AWS Cntr", "parser wind");
					$data->setWindData($this->parseWindData($child));
					break;
				case "uv":
					$logManager->log(new \DateTime(), "AWS Cntr", "parser uv");
					$data->setUvData($this->parseUvData($child));
					break;
				case "solar":
					$logManager->log(new \DateTime(), "AWS Cntr", "parser solar");
					$data->setSolarData($this->parseSolarData($child));
					break;
				case "humidity":
					$logManager->log(new \DateTime(), "AWS Cntr", "parser humidity");
					$data->setHumidityData($this->parseHumidityData($child));
					break;
				case "soil":
					$logManager->log(new \DateTime(), "AWS Cntr", "parser soil");
					$data->setSoilData($this->parseSoilData($child));
					break;
				case "barometer":
					$logManager->log(new \DateTime(), "AWS Cntr", "parser barometer");
					$data->setBarometerData($this->parseBarometerData($child));
					break;
				case "dew":
					$logManager->log(new \DateTime(), "AWS Cntr", "parser dew");
					$data->setDewData($this->parseDewData($child));
					break;
				case "heat":
					$logManager->log(new \DateTime(), "AWS Cntr", "parser heat");
					$data->setHeatData($this->parseHeatData($child));
					$logManager->log(new \DateTime(), "AWS Cntr", "parser heat -end");
					break;
				default:
					break;
			}
			
		}

// 		if($result[0]->hasChildren())
// 		{
// 			while($result[0]->next())
// 			{
// 				$child = $result[0]->getChildren();
// 				switch($child->getName)
// 				{
// 					case "temperature":
// 						$data->setTemperatureData($this->parseTemperatureData($child));
// 						break;
// 					default:
// 						break;
// 				}
// 			}
// 		}
		
		return $data;
	}
	
	
	private function parseRainData($tempNode)
	{
// 		echo "1<BR>";
// 		var_dump($tempNode);
// 		echo "<BR>";
		$temp = new RainData();
		foreach($tempNode->children() as $child=>$value)
		{
			if($value == "" || strpos($value, '----') || strpos($value, '---') || strpos($value, '--') !== false)
			{
// 						echo $child . "<BR>";
// 						echo $value . "<BR>";
				$value = null;
			}
				
			switch($child)
			{
				case "unit":
					$temp->setUnit($value);
					break;
// 				case "yearly":
// 					$temp->setYearly($value);
// 					break;
// 				case "monthly":
// 					$temp->setMonthly($value);
// 					break;
				case "daily":
					$temp->setDaily($value);
					break;
// 				case "storm":
// 					$temp->setStorm($value);
// 					break;
				case "rate_unit":
					$temp->setRateUnit($value);
					break;
				case "rate":
// 					echo $value;
					$temp->setRate($value);
					break;
// 				case "hi_rate":
// 					$temp->setRateHigh($value);
// 					break;
// 				case "hi_rate_dt":
// 						echo $value;
// 					if($value != null){
// 						$temp->setRateHighDt(new \DateTime($value));
// 					}
// 					else
// 					{
// 						$temp->setRateHighDt(null);
// 					}
					
// 					break;
// 				case "hi_rate_hour":
// 					$temp->setRateHighHour($value);
// 					break;
// 				case "hi_rate_monthly":
// 					$temp->setRateHighMonthly($value);
// 					break;
// 				case "hi_rate_yearly":
// 					$temp->setRateHighYearly($value);
// 					break;
				default:
					break;
			}
				
		}
// 		var_dump($temp);
		return $temp;
	}

	private function parseTemperatureData($tempNode)
	{
		$temp = new TemperatureData();
		foreach($tempNode->children() as $child=>$value)
		{
			if($value == "" || strpos($value, '----') || strpos($value, '---') || strpos($value, '--') !== false)
			{
			$value = null;
			}
	
			switch($child)
			{
 				case "unit":
 					$temp->setUnit($value);
 					break;
// 				case "inside":
// 					$temp->setInsideTemperature($value);
// 					break;
// 				case "hi_inside":
// 					$temp->setInsideHighTemperature($value);
// 					break;
// 				case "hi_inside_dt":
// 					if($value != null)
// 						$temp->setInsideHighTemperatureDt(new \DateTime($value));
// 					break;
// 				case "hi_inside_monthly":
// 					$temp->setInsideHighTemperatureMonthly($value);
// 					break;
// 				case "hi_inside_yearly":
// 					$temp->setInsideHighTemperatureYearly($value);
// 					break;
// 				case "low_inside":
// 					$temp->setInsideLowTemperature($value);
// 					break;
// 				case "low_inside_dt":
// 					if($value != null)
// 						$temp->setInsideLowTemperatureDt(new \DateTime($value));
// 					break;
// 				case "low_inside_monthly":
// 					$temp->setInsideLowTemperatureMonthly($value);
// 					break;
// 				case "low_inside_yearly":
// 					$temp->setInsideLowTemperatureYearly($value);
// 					break;
				case "outside":
					$temp->setOutsideTemperature($value);
					break;
// 				case "hi_outside":
// 					$temp->setOutsideHighTemperature($value);
// 					break;
// 				case "hi_outside_dt":
// 					if($value != null)
// 						$temp->setOutsideHighTemperatureDt(new \DateTime($value));
// 					break;
// 				case "hi_outside_monthly":
// 					$temp->setOutsideHighTemperatureMonthly($value);
// 					break;
// 				case "hi_outside_yearly":
// 					$temp->setOutsideHighTemperatureYearly($value);
// 					break;
// 				case "low_outside":
// 					$temp->setOutsideLowTemperature($value);
// 					break;
// 				case "low_outside_dt":
// 					if($value != null)
// 						$temp->setOutsideLowTemperatureDt(new \DateTime($value));
// 					break;
// 				case "low_outside_monthly":
// 					$temp->setOutsideLowTemperatureMonthly($value);
// 					break;
// 				case "low_outside_yearly":
// 					$temp->setOutsideLowTemperatureYearly($value);
// 					break;
				default:
					break;
			}
	
		}
		return $temp;
	}

	private function parseWindData($tempNode)
	{
		// 		echo "1<BR>";
		// 		var_dump($tempNode);
		// 		echo "<BR>";
		$temp = new WindData();
		foreach($tempNode->children() as $child=>$value)
		{
			if($value == "" || strpos($value, '----') || strpos($value, '---') || strpos($value, '--') !== false)
			{
				// 						echo $child . "<BR>";
				// 						echo $value . "<BR>";
				$value = null;
			}
	
			switch($child)
			{
				case "unit":
					$temp->setUnit($value);
					break;
 				case "degrees":
					$temp->setDegrees($value);
 					break;
				case "speed":
					$temp->setSpeed($value);
					break;
				case "ten_min_avg":
					$temp->set10MinAvg($value);
					break;
// 				case "hi_speed":
// 					$temp->setSpeedHigh($value);
// 					break;
// 				case "hi_speed_dt":
// 					if($value != null){
// 						$temp->setSpeedHighDt(new \DateTime($value));
// 					}
// 					break;
// 				case "hi_speed_monthly":
// 					// 					echo $value;
// 					$temp->setSpeedHighMonthly($value);
// 					break;
// 				case "hi_speed_yearly":
// 					$temp->setSpeedHighYearly($value);
// 					break;
				case "direction":
					$temp->setDirection($value);
					break;
				case "chill":
					$temp->setChill($value);
					break;
// 				case "low_chill":
// 					$temp->setChillLow($value);
// 					break;
// 				case "low_chill_dt":
// 					if($value != null){
// 						$temp->setChillLowDt(new \DateTime($value));
// 					}
// 					break;
// 				case "low_chill_monthly":
// 					$temp->setChillLowMonthly($value);
// 					break;
// 				case "low_chill_yearly":
// 					$temp->setChillLowYearLy($value);
// 					break;
				default:
					break;
			}
	
		}
		// 		var_dump($temp);
		return $temp;
	}
	
	
	private function parseUvData($tempNode)
	{
		// 		echo "1<BR>";
		// 		var_dump($tempNode);
		// 		echo "<BR>";
		$temp = new UvData();
		foreach($tempNode->children() as $child=>$value)
		{
			if($value == "" || strpos($value, '----') || strpos($value, '---') || strpos($value, '--') !== false)
			{
				// 						echo $child . "<BR>";
				// 						echo $value . "<BR>";
				$value = null;
			}
	
			switch($child)
			{
				case "unit":
					$temp->setUnit($value);
					break;
				case "current":
					$temp->setCurrent($value);
					break;
// 				case "hi":
// 					$temp->setHigh($value);
// 					break;
// 				case "hi_monthly":
// 					$temp->setHighMonthly($value);
// 					break;
// 				case "hi_yearly":
// 					$temp->setHighYearly($value);
// 					break;
				default:
					break;
			}
	
		}
		 		//var_dump($temp);
		return $temp;
	}
	
	private function parseSolarData($tempNode)
	{
		// 		echo "1<BR>";
		// 		var_dump($tempNode);
		// 		echo "<BR>";
		$temp = new SolarData();
		foreach($tempNode->children() as $child=>$value)
		{
			if($value == "" || strpos($value, '----') || strpos($value, '---') || strpos($value, '--') !== false)
			{
				// 						echo $child . "<BR>";
				// 						echo $value . "<BR>";
				$value = null;
			}
			switch($child)
			{
				case "unit":
					$temp->setUnit($value);
					break;
				case "et_daily":
					$temp->setEtDaily($value);
					break;
// 				case "et_monthly":
// 					$temp->setEtMonthly($value);
// 					break;
// 				case "et_yearly":
// 					$temp->setEtYearly($value);
// 					break;
 				case "radiation":
 					$temp->setRadiation($value);
					break;
// 				case "hi_radiation":
// 					$temp->setHighRadiation($value);
// 					break;
// 				case "hi_radiation_monthly":
// 					$temp->setHighRadiationMonthly($value);
// 					break;
// 				case "hi_radiation_yearly":
// 					$temp->setHighRadiationYearly($value);
// 					break;
				default:
					break;
			}
	
		}
		//var_dump($temp);
		return $temp;
	}
	
	private function parseHumidityData($tempNode)
	{
		// 		echo "1<BR>";
		// 		var_dump($tempNode);
		// 		echo "<BR>";
		$temp = new HumidityData();
		foreach($tempNode->children() as $child=>$value)
		{
			if($value == "" || strpos($value, '----') || strpos($value, '---') || strpos($value, '--') !== false)
			{
				// 						echo $child . "<BR>";
				// 						echo $value . "<BR>";
				$value = null;
			}
	
			switch($child)
			{
				case "unit":
					$temp->setUnit($value);
					break;
// 				case "inside":
// 					$temp->setInside($value);
// 					break;
// 				case "hi_inside":
// 					$temp->setHighInside($value);
// 					break;
// 				case "hi_inside_dt":
// 					if($value != null){
// 						$temp->setHighInsideDt(new \DateTime($value));
// 					}
// 					break;
// 				case "hi_inside_monthly":
// 					$temp->setHighInsideMonthly($value);
// 					break;
// 				case "hi_inside_yearly":
// 					$temp->setHighInsideYearly($value);
// 					break;
// 				case "low_inside":
// 					$temp->setLowInside($value);
// 					break;
// 				case "low_inside_dt":
// 					if($value != null){
// 						$temp->setLowInsideDt(new \DateTime($value));
// 					}
// 					break;
// 				case "low_inside_monthly":
// 					$temp->setLowInsideMonthly($value);
// 					break;
// 				case "low_inside_yearly":
// 					$temp->setLowInsideYearly($value);
// 					break;
				case "outside":
					$temp->setOutside($value);
					break;
// 				case "low":
// 					$temp->setLow($value);
// 					break;
// 				case "low_dt":
// 					if($value != null){
// 						$temp->setLowDt(new \DateTime($value));
// 					}
// 					break;
// 				case "low_monthly":
// 					$temp->setLowMonthly($value);
// 					break;
// 				case "low_yearly":
// 					$temp->setLowYearly($value);
// 					break;
// 				case "hi":
// 					$temp->setHigh($value);
// 					break;
// 				case "hi_dt":
// 					if($value != null){
// 						$temp->setHighDt(new \DateTime($value));
// 					}
// 					break;
// 				case "hi_monthly":
// 					$temp->setHighMonthly($value);
// 					break;
// 				case "hi_yearly":
// 					$temp->setHighYearly($value);
// 					break;
				default:
					break;
			}
	
		}
		// 		var_dump($temp);
		return $temp;
	}
	
	private function parseSoilData($tempNode)
	{
		// 		echo "1<BR>";
		// 		var_dump($tempNode);
		// 		echo "<BR>";
		$temp = new SoilData();
		foreach($tempNode->children() as $child=>$value)
		{
			if($value == "" || strpos($value, '----') || strpos($value, '---') || strpos($value, '--') !== false)
			{
				// 						echo $child . "<BR>";
				// 						echo $value . "<BR>";
				$value = null;
			}
	
			switch($child)
			{
				case "unit":
					$temp->setUnit($value);
					break;
				case "soil_moist_1":
					$temp->setSoilMoist1($value);
					break;
// 				case "hi_soil_moist_1":
// 					$temp->setHighSoilMoist1($value);
// 					break;
// 				case "low_soil_moist_1":
// 					$temp->setLowSoilMoist1($value);
// 					break;
// 				case "hi_soil_moist_dt_1":
// 					if($value != null){
// 						$temp->setHighSoilMoistDt1(new \DateTime($value));
// 					}
// 					break;
// 				case "low_soil_moist_dt_1":
// 					if($value != null){
// 						$temp->setLowSoilMoistDt1(new \DateTime($value));
// 					}
// 					break;
				case "soil_temp_1":
					$temp->setSoilTemp1($value);
					break;
// 				case "hi_soil_temp_1":
// 					$temp->setHighSoilTemp1($value);
// 					break;
// 				case "low_soil_temp_1":
// 					$temp->setLowSoilTemp1($value);
// 					break;
// 				case "hi_soil_temp_dt_1":
// 					if($value != null){
// 						$temp->setHighSoilTempDt1(new \DateTime($value));
// 					}
// 					break;
// 				case "low_soil_temp_dt_1":
// 					if($value != null){
// 						$temp->setLowSoilTempDt1(new \DateTime($value));
// 					}
// 					break;
				default:
					break;
			}
	
		}
		// 		var_dump($temp);
		return $temp;
	}
	
	private function parseBarometerData($tempNode)
	{
		// 		echo "1<BR>";
		// 		var_dump($tempNode);
		// 		echo "<BR>";
		$temp = new BarometerData();
		foreach($tempNode->children() as $child=>$value)
		{
			if($value == "" || strpos($value, '----') || strpos($value, '---') || strpos($value, '--') !== false)
			{
				// 						echo $child . "<BR>";
				// 						echo $value . "<BR>";
				$value = null;
			}
	
			switch($child)
			{
				case "unit":
					$temp->setUnit($value);
					break;
				case "current":
					$temp->setCurrent($value);
					break;
// 				case "trend":
// 					$temp->setTrend($value);
// 					break;
// 				case "low":
// 					$temp->setLow($value);
// 					break;
// 				case "hi":
// 					$temp->setHigh($value);
// 					break;
// 				case "low_monthly":
// 					$temp->setLowMonthly($value);
// 					break;
// 				case "hi_monthly":
// 					$temp->setHighMonthly($value);
// 					break;
// 				case "low_yearly":
// 					$temp->setLowYearly($value);
// 					break;
// 				case "hi_yearly":
// 					$temp->setHighYearly($value);
// 					break;
// 				case "low_dt":
// 					if($value != null){
// 						$temp->setLowDt(new \DateTime($value));
// 					}
// 					break;
// 				case "hi_dt":
// 					if($value != null){
// 						$temp->setHighDt(new \DateTime($value));
// 					}
// 					break;
				default:
					break;
			}
	
		}
		// 		var_dump($temp);
		return $temp;
	}
	
	private function parseDewData($tempNode)
	{
		// 		echo "1<BR>";
		// 		var_dump($tempNode);
		// 		echo "<BR>";
		$temp = new DewData();
		foreach($tempNode->children() as $child=>$value)
		{
			if($value == "" || strpos($value, '----') || strpos($value, '---') || strpos($value, '--') !== false)
			{
				// 						echo $child . "<BR>";
				// 						echo $value . "<BR>";
				$value = null;
			}
	
			switch($child)
			{
				case "outside_pt":
					$temp->setOutsidePt($value);
					break;
// 				case "hi_pt":
// 					$temp->setHightPt($value);
// 					break;
// 				case "low_pt":
// 					$temp->setLowPt($value);
// 					break;
// 				case "hi_pt_dt":
// 					if($value != null){
// 						$temp->setHighPtDt(new \DateTime($value));
// 					}
// 					break;
// 				case "low_pt_dt":
// 					if($value != null){
// 						$temp->setLowPtDt(new \DateTime($value));
// 					}
// 					break;
// 				case "hi_monthly_pt":
// 					$temp->setHighMonthlyPt($value);
// 					break;
// 				case "low_monthly_pt":
// 					$temp->setLowMonthlyPt($value);
// 					break;
// 				case "hi_yearly_pt":
// 					$temp->setHighYearlyPt($value);
// 					break;
// 				case "low_yearly_pt":
// 					$temp->setLowYearPt($value);
// 					break;
// 				case "inside_pt":
// 					$temp->setInsidePt($value);
// 					break;
				default:
					break;
			}
	
		}
		// 		var_dump($temp);
		return $temp;
	}
	
	private function parseHeatData($tempNode)
	{
		// 		echo "1<BR>";
		// 		var_dump($tempNode);
		// 		echo "<BR>";
		$temp = new HeatData();
		foreach($tempNode->children() as $child=>$value)
		{
			if($value == "" || strpos($value, '----') || strpos($value, '---') || strpos($value, '--') !== false)
			{
				// 						echo $child . "<BR>";
				// 						echo $value . "<BR>";
				$value = null;
			}
	
			switch($child)
			{
				case "outside_idx":
					$temp->setOutsideIdx($value);
					break;
// 				case "hi_idx":
// 					$temp->setHighIdx($value);
// 					break;
// 				case "hi_idx_dt":
// 					if($value != null){
// 						$temp->setHighIdxDt(new \DateTime($value));
// 					}
// 					break;
// 				case "hi_monthly_idx":
// 					$temp->setHighMonthlyIdx($value);
// 					break;
// 				case "hi_yearly_idx":
// 					$temp->setHighYearlyIdx($value);
// 					break;
// 				case "inside_idx":
// 					$temp->setInsideIdx($value);
// 					break;
// 				case "thw":
// 					$temp->setThw($value);
// 					break;
				default:
					break;
			}
	
		}
		// 		var_dump($temp);
		return $temp;
	}
	
}