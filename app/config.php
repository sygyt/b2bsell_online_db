<?php

$host="104.199.2.231";
$user="admin";
$passwd="admin";
$db="ser";
$uploadpath="fiver/ser/upload";
$imagepath="image";
$rec_limit = 50; // set value for page limit


 $conn = new mysqli(null, 'root', null, 'ser', null, '/cloudsql/online-contact-database:europe-west1:serdbcontact');

if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "Connected ds";
		//mysqli_set_charset($conn,"utf8");
	//echo "Connected successfully";
	}

?>