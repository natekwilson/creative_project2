<?php

$servername = "localhost";
$username = "chance";
$pass = "password";
$database = "webforms";
$table = "studentform";
$conn = new mysqli($servername, $username, $pass, $database);


//conn is a mysqli object
if($conn->conect_error){
	die("Connection Failed: ", $conn->connect_error);
}

//sql statement 
$sql = "Select * from $table;"
if ($statement = $conn->prepare($sql)){
	$statement->execute();

	$result = $statement->get_result();

	//put the info into a format that we can use
	$data = $result->fetch_all(MYSQLI_ASSOC); //an associated array, each array value has a written value instead of just an index

	var_dump($data);

	
	
}

