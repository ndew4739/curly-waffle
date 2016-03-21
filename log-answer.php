<?php

session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {

	$username = $_POST['username'];
	$class = $_POST['class'];
	$answer = $_POST['answer'];
	$qNum = $_POST['qNum'];


	$db = new mysqli('localhost','root','duckvin','myDb');

	if ($db->connect_errno >0) { 
    	die("Connection failed: " . mysqli_connect_error());
	} else {
		$sql = "INSERT INTO answers (qNum, username, class, answer) VALUES ('$qNum', '$username', '$class', '$answer')";
		if(!$result = $db->query($sql)){
  			die('There was an error running the query [' . $db->error . ']');
		} else {
			echo "success";
		}
	}
}
?>