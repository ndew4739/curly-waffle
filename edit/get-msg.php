<?php

session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {
	$class=$_SESSION['class'];
}

$db = new mysqli('localhost','root','duckvin','myDb');

if ($db->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM alerta WHERE DATE(timestamp) = CURDATE() ORDER BY `id`";

if(!$result = $db->query($sql)){
	die('There was an error running the query [' . $db->error . ']');
}

if($result->num_rows > 0){
	$msg = $result->fetch_assoc();
	echo($msg);
} else {
	echo false;
};

$db->close();


//get class
//get data
//log data
//client loads then responds logged

?>