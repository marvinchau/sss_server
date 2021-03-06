<?php


namespace Utilities;


class DataConvertor
{

	public static function objectArrayToArray($array){
		
		$newArray = array();
		if(count($array) > 0){
			//var_dump($array);
			//print 2;
			foreach($array as $item){
				//print 1;
				//var_dump($item);
				$newObj = (array) $item;
				$outObj = array();
				//var_dump($newObj);

				// 		var_dump($newObj);
				$className = new \ReflectionObject($item);
				foreach($newObj as $key => $value)
				{
					// 					$newKey = str_replace(" ". $className->getName(). ' _', '', $key);
					// 					$newKey = str_replace(" ". $className->getName(). ' _', '', $key);
					// 					$newKey = str_replace("\u0000". $className->getName(). ' _', '', $key);
					$newKey = explode("\0", $key);
					// 					var_dump($newKey);
					// 					$outObj[''.$newKey[1] . "\\" . $newKey[2].''] = $value;
					if ($value != null) {
						//var_dump($key);
						if (is_array($value)) {
							$outObj[$newKey[2]] = DataConvertor::objectArrayToArray($value);
						} else if (is_object($value)) {
							$outObj[$newKey[2]] = DataConvertor::objectToArray($value);
						} else {
							$outObj[$newKey[2]] = $value;
						}
					}
					//$outObj[$newKey[2]] = $value;
					// 					var_dump($newKey);
					// 					echo "<BR>";
					// 					var_dump($key);
					// 					echo "<BR>";
					unset($newObj[$key]);
					// 						var_dump($outObj);
				}
				// 				var_dump($outObj);

				array_push($newArray, $outObj);
			}
			//print 3;
		}
		return $newArray;
	}

	public static function objectToArray($obj)
	{
		// 		var_dump($obj);
		$newObj = (array) $obj;

		// 		var_dump($newObj);
		$className = new \ReflectionObject($obj);
		


		foreach($newObj as $key => $value)
		{
				if ($value != null) {
					$newKey = explode("\0", $key);						
					if (is_array($value)) {
						$newObj[$newKey[2]] = DataConvertor::objectArrayToArray($value);
					} else if (is_object($value)) {
						$newObj[$newKey[2]] = DataConvertor::objectToArray($value);
					} else {
						$newObj[$newKey[2]] = $value;
					}
// 				$newObj[$newKey[2]] = $value;
				}
				unset($newObj[$key]);
				// 							var_dump($newObj);
			}

			return $newObj;

		}


	}