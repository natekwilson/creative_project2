<?php

include 'settings.php';

$conn = new mysqli($servername, $username, $pass, $database);

if ($conn->connect_error) 
{
	die("Connection failed dawg: " . $conn->connect_error);
}

$sql = "SELECT password from $table where;";
$result = $conn->query($sql);

if ($stmt = $conn->prepare($sql))
{
	$stmt->execute();
	
	$result = $stmt->get_result();
	
	$data = $result->fetch_all(SQLI_ASSOC);

	echo json_encode($data);

	$stmt->close();

}

$conn->close();

?>
