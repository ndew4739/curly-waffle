<?php

session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {

	$username = $_POST['username'];
	$class = $_POST['class'];

	$db = new mysqli('localhost','root','duckvin','myDb');

	if ($db->connect_errno >0) { 
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT question, qNum FROM live_question WHERE class = '$class' AND live = 1";

	if(!$result = $db->query($sql)){
 		die('There was an error running the query [' . $db->error . ']');
	} else {

		if($result->num_rows > 0){
			$last = $result->fetch_assoc();
			$qNum = $last["qNum"];
			$sql2 = "SELECT username FROM answers WHERE username = '$username' AND qNum = '$qNum'";
				if(!$result2 = $db->query($sql2)){
 					die('There was an error running the query [' . $db->error . ']');
				} else {
					if($result2->num_rows > 0){
						echo false;
						$result2->free();
					} else {
						echo json_encode($last);
					}
				}
		} else {
			echo false;
		}
	}

}
?>