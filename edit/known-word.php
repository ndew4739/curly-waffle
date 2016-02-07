<?php

$x = $_POST["postData"];
$decode = json_decode($x);
$username = ($decode->username);
$word = ($decode->word);


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
	$reply = json_decode($wordList['wlist']);
	echo($wordList['wlist']);
	array_push($reply, $word);
	$insert = json_encode($reply);
	$sql2 = "UPDATE wordLists SET wlist = '$insert' WHERE username = '$username'";
	if(!$result = $db->query($sql2)){
	  die('There was an error running the query [' . $db->error . ']');
	} 
} else {
	$array = array([0 => $word]);
	$newList = json_encode($array[0]);
	$sql2 = "INSERT INTO wordLists (username, wlist) VALUES ('$username', '$newList')";
	if(!$result = $db->query($sql2)){
	  die('There was an error running the query [' . $db->error . ']');
	}
}
$db->close();

echo "success";
?>