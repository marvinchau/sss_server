<?php

namespace Models\CSV;

class CSVManager
{
	function genCSV($filename, $array, $attachment = false, $headers = true) {
	
// 		echo $filename;
		
		if($attachment) {
			// send response headers to the browser
			header( 'Content-Type: text/csv' );
			header( 'Content-Disposition: attachment;filename='.$filename);
			$fp = fopen('php://output', 'w');
		} else {
			$fp = fopen($filename, 'w');
		}
	
// 		$result = mysql_query($query, $db_conn) or die( mysql_error( $db_conn ) );
	
// 		if($headers) {
// 			// output header row (if at least one row exists)
// 			$row = mysql_fetch_assoc($result);
// 			if($row) {
// 				fputcsv($fp, array_keys($row));
// 				// reset pointer back to beginning
// 				mysql_data_seek($result, 0);
// 			}
// 		}
	
		if(isset($array) && sizeOf($array) > 0)
		{
			
			$headerRow = array();
			foreach($array[0] as $key=>$value)
			{
				array_push($headerRow, $key);
			}

			if(sizeof($headerRow) > 0)
			{
				fputcsv($fp, $headerRow);
			}
			
			foreach($array as $dataset){

				$rowRecord = array();
				foreach($dataset as $key => $value)
				{
					array_push($rowRecord, $value);

				}

				if(sizeof($rowRecord) > 0){
					fputcsv($fp, $rowRecord);
				}
			}
		}
		
	
		fclose($fp);
		return $filename;
	}
	
}