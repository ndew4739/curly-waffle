<?php
session_start();
if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {
	
		$username = $_SESSION['username'];
		$class = $_SESSION['class'];
	//echo $username;
	//echo $class;

	$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

	if($db->connect_errno > 0){
    	die('Unable to connect to database [' . $db->connect_error . ']');
	}

	$sql = "SELECT * FROM punc WHERE allocation = '$username' AND live = 1";
	//$result = $db->query($sql);
	//var_dump($result);
	

	if(!$result = $db->query($sql)){
	  die('There was an error running the query [' . $db->error . ']');
	}

	if($result->num_rows>0){
		$row = $result->fetch_assoc();
		echo json_encode($row);
	} else {
		$sql = "SELECT * FROM punc WHERE class = '$class' AND allocation = 'all' AND live = 1";
		if(!$result = $db->query($sql)){
	  		die('There was an error running the query [' . $db->error . ']');
	  	} else {
	  		if($result->num_rows>0){
				$row = $result->fetch_assoc();
				echo json_encode($row);
			} else {
				return false;
			}
		}
	}
	/*
		$sql = "SELECT * FROM puncAll WHERE class = '$class'";
		if(!$result = $db->query($sql)){
			echo "No work set";
		} else {
			echo $result;
		}
	} else {
		echo $result;
	}*/
}
	//echo json_encode($arr);
//echo "hi";

$db->close();

?> 