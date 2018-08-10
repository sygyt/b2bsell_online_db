<?php

$host=getenv('MYSQL_DSN');
$user=getenv('MYSQL_USER');
$passwd=getenv('MYSQL_PASSWORD');
$db="ser";
$uploadpath="fiver/ser/upload";
$imagepath="image";
$rec_limit = 50; // set value for page limit


 $conn = new mysqli(null,$user, $passwd, $db,0, $host);

 if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "Connected ds";
		//mysqli_set_charset($conn,"utf8");
	//echo "Connected successfully";
	}

// function to return the PDO instance
/*
    // Connect to CloudSQL from App Engine.
    $dsn = getenv('MYSQL_DSN');
    $user = getenv('MYSQL_USER');
    $password = getenv('MYSQL_PASSWORD');
    if (!isset($dsn, $user) || false === $password) {
        throw new Exception('Set MYSQL_DSN, MYSQL_USER, and MYSQL_PASSWORD environment variables');
    }
    try {
        $conn = new PDO($dsn, $user, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connected successfully";
    }
    catch(PDOException $e)
    {
        echo "Connection failed: " . $e->getMessage();
    }
*/

?>