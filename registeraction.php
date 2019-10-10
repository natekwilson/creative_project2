<?php

include 'settings.php';

session_start();

$user = $_POST["Username"];
$pass = $_POST["Password"];
$cpas = $_POST["CPassword"];
$fnam = $_POST["Firstname"];
$lnam = $_POST["Lastname"];
$emal = $_POST["Email"];

//check if passwords match
if (!($pass == $cpas))
{
	$_SESSION["ERROR"] = "Entered Passwords did not match";
	header('Location: register.php');
	exit;	
}
//hash the password
$pass = sha1($pass);

//check if the username is unique
$sql = "SELECT userName FROM $table WHERE userName = ? " ;
if ($statement = $conn->prepare($sql))
{
	$statement->bind_param("s",$user);
	$statement->execute();
	$result = $statement->get_result();
	$data = $result->fetch_all(MYSQLI_ASSOC);

	if ($data)
	{
		$_SESSION["ERROR"] = "Your username is already in the database";
		header('Location: register.php');
		exit;
	}
	$statement->close();
}


//Update the database
$sql = "INSERT INTO $table (userId,userName, password, FirstName, LastName, email ) VALUES (null,?,?,?,?,?)" ;
if ($statement = $conn->prepare($sql)){
	$statement->bind_param("sssss",$user, $pass, $fnam, $lnam, $emal);
	$statement->execute();

	//Log the new user in automatically
	$_SESSION["username"] = $user;
	$_SESSION["password"] = $pass;
	$_SESSION["loggedin"] = true;
	$statement->close();
	$sql = "UPDATE $table SET session=1 WHERE password = ? AND userName = ?";
	$statement2 = $conn->prepare($sql);
	$statement2->bind_param("ss", $pass, $user);
	$statement2->execute();
	$statement2->close();
	header('Location: Contact.php');
}

$conn->close();

?>

