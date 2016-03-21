<?php
session_start();
if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {

	$arr = array (
		'username'=>$_SESSION['username'],
		'first_name'=>$_SESSION['first_name'],
		'last_name'=>$_SESSION['last_name'],
		'title'=>$_SESSION['title'],
		'class'=>$_SESSION['class']
//		'qNum'=>7,
//		'question'=>'this'
	);
	$username = $_SESSION['username'];

	$db = new mysqli('localhost','root','duckvin','myDb');

	if ($db->connect_errno >0) { 
    	die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "SELECT qNum, question FROM live_question WHERE username = '$username' AND live = 1";

	if(!$result = $db->query($sql)){
  		die('There was an error running the query [' . $db->error . ']');
	} else {
		if($result->num_rows > 0){
			$last = $result->fetch_assoc();
			$arr['qNum'] = $last['qNum'];
			$arr['question'] = $last['question'];
			$result->free();
//			echo json_encode($last['qNum']);

		} else {
			$arr['msg'] = "There is no live question at present";
		}
	}
}

echo json_encode($arr);

$db->close();
?> 