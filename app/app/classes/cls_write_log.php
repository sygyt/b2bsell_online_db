<?php
	class WriteLog {
		private static $last_error;
		public static function append($text, $file_name)
		{
		
			$file = fopen($_SERVER['DOCUMENT_ROOT']."/webtool/Log" . $file_name, "a+");
		//		$file = fopen("http://service.saliyamotors.com/Log" . $file_name, "a+");
		//	$file = fopen("http://www.pmoffice.gov.lk/Log" . $file_name, "a+");
			//$file = fopen("../Log".$file_name,"a+");
			if($file)
			{
				date_default_timezone_set ("Asia/Calcutta"); 
				$tody=date("Y-m-d");
				$textWithDate=$tody." - ".date("H:i:s")." - ".$text;
				fputs($file, $textWithDate . "\n \n");
				return true;
			} 
			else 
			{
				self::$last_error = "Error 1003 : Failed to open the file";
				return false;
			}
			return true;
		}
		public static function write($text, $file_name){
			$file = fopen("/stock/$file_name", "r+");
			if($file)
			{
				date_default_timezone_set ("Asia/Calcutta"); 
				$tody=date("Y-m-d");
				$textWithDate=$tody." - ".date("H:i:s")." - ".$text;
				fputs($file, $textWithDate . "\n \n");
				return true;
			} 
			else 
			{
				self::$last_error = "Error 1003 : Failed to open the file";
				return false;
			}
			return true;
		}
	}
?>