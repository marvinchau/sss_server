<?php

namespace Utilities;

class Tools
{
	public static function numberFormat($number, $show_zero_decimal = FALSE) {
		$output = NULL;
		
		if (is_numeric($number)) {
			if ($show_zero_decimal || floor($number) != $number) {
				$output = number_format($number, 2, ",", ".");
			} else {
				$output = $number;
			}
		}
		
		return $output;
	}
}