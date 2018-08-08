<?php
require_once ('classes/cls_database.php');
require_once ('classes/cls_authentication.php');
//require_once("classes/cls_write_log.php");

	session_start();
$auth = new Authentication(true);
	$auth->sessionTimeout();
	$user = $auth->getUser();
	
	$userid = $user->getUserId();
	$userid = $user->getUserId();
	$text="<strong>Error 0000 :Log Out. UserId=".$userid;
	$file_name="Logsystem_error_log.txt";
	
	
	
	//$file = fopen($path, "a+");
//			if($file)
//			{
//				date_default_timezone_set ("Asia/Calcutta"); 
//				$tody=date("Y-m-d");
//				$textWithDate=$tody." - ".date("H:i:s")." - ".$text;
//				fputs($file, $textWithDate . "\n \n");
//				//return true;
//			} 
//			else 
//			{echo "1";
//				self::$last_error = "Error 1003 : Failed to open the file";
//				//return false;
//			}
	$_SESSION['SMSVRCN'] = NULL;
	$_SESSION['timeout']= NULL;
//	$_SESSION['YEAR']= NULL;
	session_destroy();
	header("Location: login.php");
?>