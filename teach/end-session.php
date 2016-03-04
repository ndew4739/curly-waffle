<?php

session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {

$qNum = $_POST['qNum'];

$class = $_POST['class'];

$db = new mysqli('localhost','root','duckvin','myDb');

	if ($db->connect_errno >0) { 
    	die("Connection failed: " . mysqli_connect_error());
	} else {
		$sql = "UPDATE live_question SET"

?>