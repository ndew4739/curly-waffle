<?php

session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {
	$username = $_SESSION['username'];
	$class = $_SESSION['class'];
	$qNum = $_POST['qNum'];

	$db = new mysqli('localhost','root','duckvin','myDb');

	if ($db->connect_errno >0) { 
    	die("Connection failed: " . mysqli_connect_error());
	} else {
		$sql = "UPDATE live_question SET completed = 1, live = 0 WHERE qNum = '$qNum' AND class = '$class'";
		if(!$result = $db->query($sql)){
  			die('There was an error running the query [' . $db->error . ']');
		} else {
			echo "success";
		}
	}
}

$db->close();

?>
