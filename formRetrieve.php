<?php

session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {
	$username=$_SESSION['username'];
	$class=$_SESSION['class'];
	$arr = [];
	$sql = "SELECT * FROM dailyForm WHERE class = '$class' AND live = 1";

	$mysqli = new mysqli("localhost","root","duckvin","myDb");
	if ($mysqli->connect_errno){
		echo "Failed to connect to MySQL: " . $mysqli->connect_error;
	}

	if(!$result = $mysqli->query($sql)){
	  die('There was an error running the query [' . $mysqli->error . ']');
	}

	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()){
			$arr[] = $row;
		}
		echo JSON_encode($arr);
	} else {
		echo JSON_encode($arr);
	};
}

$mysqli->close();


?>