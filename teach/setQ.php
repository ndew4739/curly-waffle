<?php

session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {


//echo $_POST["qNum"];
//echo $_POST["question"];

	$username = $_SESSION['username'];
	$class = $_SESSION['class'];
	$question = $_POST['question'];

	$db = new mysqli('localhost','root','duckvin','myDb');

	if ($db->connect_errno >0) { 
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT qNum FROM live_question WHERE username = '$username' ORDER BY qNum DESC LIMIT 1";

	if(!$result = $db->query($sql)){
  		die('There was an error running the query [' . $db->error . ']');
	} else {
		if($result->num_rows > 0){
			$last = $result->fetch_assoc();
			$qNum = $last['qNum'] + 1;
		    $qNum;
			$result->free();
		} else {
			$qNum = 0;
		}
	}

	$sql2 = "INSERT INTO live_question (qNum, username, class, question, completed, live) VALUES ('$qNum', '$username', '$class', '$question', '0' , '1')";

	if(!$result = $db->query($sql2)){
  		die('There was an error running the query [' . $db->error . ']');
	} else {
		header("Location: liveForm.html");
	}
}

$db->close();

?>