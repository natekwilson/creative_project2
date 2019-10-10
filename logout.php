<?php
session_start();
include 'settings.php';

$user = $_SESSION["username"] ;
$pass = $_SESSION["password"] ;

	$sql = "UPDATE $table SET session=0 WHERE password = ? AND userName = ?";
	$statement2 = $conn->prepare($sql);
	$statement2->bind_param("ss", $pass, $user);
	$statement2->execute();

	$statement2->close();

	unset($_SESSION["username"]);
	unset($_SESSION["password"]);
	unset($_SESSION["loggedin"]);




	header('Location: login.php');
?>
