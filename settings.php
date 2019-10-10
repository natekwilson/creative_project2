<?php

$servername = "localhost";
$username = "limited_user";
$pass = "1234";
$database = "IT210";
$table = "Users";
$conn = new mysqli($servername, $username, $pass, $database);



//conn is a mysqli object
if($conn->connect_error)
{
	die("Connection Failed: ". $conn->connect_error);
}

?>
