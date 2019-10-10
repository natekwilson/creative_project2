<?php
include 'settings.php';

session_start();

$comm = $_POST["comment"];
$user = $_SESSION["username"];


//retrieve the unique UserID from username

$sql = "SELECT userId FROM $table WHERE userName = ?" ;
$statement = $conn->prepare($sql);
$statement->bind_param("s",$user);
$statement->execute();
$result = $statement->get_result();
$data = $result->fetch_assoc();
$id = $data['userId'];

	

$statement->close();




$table = "Comments";

//Update the Comments table
$sql = "INSERT INTO $table (userId,commentContent) VALUES ($id,?)";
if ($statement = $conn->prepare($sql)){
	$statement->bind_param("s",$comm);
	$statement->execute();
	$statement->close();

	
}
header('Location: Projects.php');
exit;
?>

