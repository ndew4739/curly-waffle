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

$wordList = $result->fetch_assoc();

$reply = json_decode($wordList['wlist']);

array_push($reply, $word);

var_dump($reply);

?>