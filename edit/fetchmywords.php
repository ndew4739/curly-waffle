<?php

$username = $_POST['username'];

$db = new mysqli('localhost','root','duckvin','myDb');

if ($db->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT wlist FROM wordLists WHERE username = '$username'";

if(!$result = $db->query($sql)){
  die('There was an error running the query [' . $db->error . ']');
}

if($result->num_rows > 0){
	$wordList = $result->fetch_assoc();
	echo($wordList['wlist']);
} else {
	echo false;
};

$db->close();

?>