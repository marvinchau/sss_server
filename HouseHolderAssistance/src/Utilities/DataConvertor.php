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
			// 			var_dump($key);
			// 			echo "<BR>";
			// 			echo $className->getName() . "<BR>";
			// // 			echo str_replace('\0', '', $key);
			// // 			$newKey = str_replace($className->getName(), '', $key);
			// var_dump($className->getName());
			// echo "<BR>";
			// var_dump("Entities\User _");
			// echo "<BR>";
			// 			echo str_replace("Entities\User _", "", $key) . "<BR>";
			// 			$firstIdx = strpos($newKey, $className->getName()) -1 ;
			// 			if($firstIdx = -1){
			// 				$firstIdx = 0;
			// 			}
			// 			$newKey = substr($newKey, firstIdx, strlen($newKey)+1);
			// if any problem, ask larry ( special character \u0000)
			//$newKey = str_replace(" ". $className->getName(). ' _', '', $key);
					$newKey = explode("\0", $key);

			// 			echo urlencode(" ");
			// 			$newKey = str_replace($className->getName(), '', $key);
			// 			echo $newKey."<BR>";
			// 			$newKey = str_replace($className->getName(), '', $key);
			// 			echo urlencode($newKey) . "<BR>";
			// 			var_dump($newKey);
			// 			$prefix = substr($newKey, 0, 3);
			// 			echo $prefix . "<BR>";
			// 			if (strcmp(substr($newKey, 0, 3), '\"_') == 0)
			// 			{
			// 				echo $newKey . "<BR>";
				// 				$newKey = substr($newKey, 1, strlen($newKey));
				// 				echo $newKey . "<BR>";
				// 		
					//var_dump($value);
					//var_dump($newKey[2]);
				$newObj[$newKey[2]] = $value;
				}
				unset($newObj[$key]);
				// 							var_dump($newObj);
			}

			return $newObj;

		}


	}