<?php

$host="localhost";
$user="root";
$passwd="cait123";
$db="ser";
$uploadpath="fiver/ser/upload";
$imagepath="image";
$rec_limit = 50; // set value for page limit



 $conn = new mysqli($host,$user, $passwd, $db);
if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "Connected ds";
		//mysqli_set_charset($conn,"utf8");
	//echo "Connected successfully";
	}

?>