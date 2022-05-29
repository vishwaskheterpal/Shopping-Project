<?php 
function connectDB(){
	
	
	$servername = "localhost";
	$username = "php_demo";
	$password = "Vishu@123";
	$dbName = "php_demo";
	try {
	  $conn = new PDO("mysql:host=$servername;dbname=".$dbName, $username, $password);
	  // set the PDO error mode to exception
	  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	  
		return $conn;
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}
}

?>