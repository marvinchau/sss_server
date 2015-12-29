<?php

date_default_timezone_set("Asia/Hong_Kong");

define('DATETIME_FORMAT', 'Y-m-d H:i:s');
define('DATE_FORMAT', 'Y-m-d');
define('ONE_MIN', 60);




include_once '../src/Utilities/Utilities.php';

$platform = 'develop';


switch($platform)
{
	case 'develop':
		require_once 'Config_Develop.php';
		break;
}