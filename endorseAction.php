<?php

include 'settings.php';

session_start();

$name = $_POST["name"];
$date = $_POST["date"];
$comm = $_POST["comment"];

$arr_data = array(); // create empty array


$newendorse = array(
'name'=>$name,
'date'=> $date,
'comment'=> $comm
);

//retrive existing json file
$jsondata = file_get_contents('endorsements.json');

// converts old json data into array
$arr_data = json_decode($jsondata, true);

 // Push new comment data to array
array_push($arr_data,$newendorse);

//encode the array into a json format
$jsondata = json_encode($arr_data, JSON_PRETTY_PRINT);

//write into a new json file
//file_put_contents(, $jsondata);
//write json data into data.json file
if(file_put_contents('endorsements.json', $jsondata)) 
	{
		echo 'Data successfully saved';
	}
	else 
	        echo "error";

header('Location: Endorsements.php');

?>
