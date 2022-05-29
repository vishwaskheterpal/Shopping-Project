<?php 
require_once('connect.php');
$conn = connectDB();
 
	$name = $_POST['name'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$password = $_POST[' password'];
	$password = md5($password);
	$instQuery = "INSERT INTO `store_user` (name,phone,email,password,usertype) VALUES ('".$name."','".$phone."','".$email."','".$password."','user')";
    $sth = $conn->query($instQuery);
	  // Perform a query, check for error
	  if (!$con -> query($instQuery)) {
		echo("Error description: " . $mysqli -> error);
	  }



?>