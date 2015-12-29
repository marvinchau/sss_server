<?php


function site_url()
{
	return sprintf(
			"%s://%s%s",
			isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
			$_SERVER['SERVER_NAME'],
			$_SERVER['REQUEST_URI']
	);

}

function get_datetime_distance($datetime1, $datetime2)
{

	$time1 = strtotime($datetime1);
	$time2 = strtotime($datetime2);

	return $time2-$time1;
}



/******** reference for
 * http://stackoverflow.com/questions/15699101/get-the-client-ip-address-using-php
* http://devco.re/blog/2014/06/19/client-ip-detection/
**************/

// Function to get the client IP address

// function get_client_ip() {
// 	$ipaddress = '';
// 	if ($_SERVER['HTTP_CLIENT_IP'])
	// 		$ipaddress = $_SERVER['HTTP_CLIENT_IP'];
	// 		else if($_SERVER['HTTP_X_FORWARDED_FOR'])
		// 			$ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
		// 			else if($_SERVER['HTTP_X_FORWARDED'])
			// 				$ipaddress = $_SERVER['HTTP_X_FORWARDED'];
			// 				else if($_SERVER['HTTP_FORWARDED_FOR'])
				// 					$ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
				// 					else if($_SERVER['HTTP_FORWARDED'])
					// 						$ipaddress = $_SERVER['HTTP_FORWARDED'];
					// 						else if($_SERVER['REMOTE_ADDR'])
						// 							$ipaddress = $_SERVER['REMOTE_ADDR'];
						// 							else
							// 								$ipaddress = 'UNKNOWN';
							// 								return $ipaddress;
							// }

							function get_client_ip() {
								$ipaddress = '';
								if (getenv('HTTP_CLIENT_IP'))
									$ipaddress = getenv('HTTP_CLIENT_IP');
								else if(getenv('HTTP_X_FORWARDED_FOR'))
									$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
								else if(getenv('HTTP_X_FORWARDED'))
									$ipaddress = getenv('HTTP_X_FORWARDED');
								else if(getenv('HTTP_FORWARDED_FOR'))
									$ipaddress = getenv('HTTP_FORWARDED_FOR');
								else if(getenv('HTTP_FORWARDED'))
									$ipaddress = getenv('HTTP_FORWARDED');
								else if(getenv('REMOTE_ADDR'))
									$ipaddress = getenv('REMOTE_ADDR');
								else
									$ipaddress = 'UNKNOWN';
								return $ipaddress;
							}

							
							
							

			
function validate_input_param($param, $accept_params){
// 	var_dump($param);
	
	$match = count($accept_params);
	$count = 0;
	
	foreach($param as $key=>$value){
// 		print $key;
// 		print $value;
// 		print "<BR>";
		
		if(in_array($key, $accept_params)){
// 			print $key;
// 			print "<BR>";
// 			var_dump($accept_params);
// 			return false;
			$count++;
		}
	}
	
	if($count == $match){
		return true;
	}else{
		return false;
	}
}

function validate_userType($userType, $accept_userTypes){
// 	foreach($userType as $key => $value){
	
	
		if(!in_array($userType, $accept_userTypes)){
			return false;
		}
		return true;
// 	}
}
							
							