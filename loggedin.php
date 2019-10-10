<?php

include 'settings.php';

session_start();

//initialize the local variables from the passed in POST info
$user = $_POST["Username"];
$pass = $_POST["Password"];

//hash the pass
$pass = sha1($pass);


$sql = "SELECT password FROM $table WHERE password = ? AND userName = ? " ;
if ($statement = $conn->prepare($sql)){
	$statement->bind_param("ss",$pass, $user);
	$statement->execute();

	$result = $statement->get_result();

	$data = $result->fetch_all(MYSQLI_ASSOC);
	if ($data)
	{
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
	else
//BAD LOGIN
		{
			$_SESSION["ERROR"] = "Either Password or Username did not match";
			header('Location: login.php');
		}

}


$conn->close();

?>

