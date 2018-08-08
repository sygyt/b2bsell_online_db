<?php

$host="localhost";
$user="root";
$passwd="cait123";
$db="runner";
/*
$host="localhost";
$user="root";
$passwd="ASDF@#$%^@123";
$db="afs2";
*/
/*$conn=mysql_connect($host,$user,$passwd);
mysql_select_db($db);
if($conn){

echo "connect";
}else{
	echo "Fail";
}
*/

 $dbcon = new mysqli($host,$user, $passwd, $db);
if ($dbcon->connect_error) {
		die("Connection failed: " . $dbcon->connect_error);
	}else{
		//echo "Connected ds";
		//mysqli_set_charset($conn,"utf8");
	//echo "Connected successfully";
	}

?>