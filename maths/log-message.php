<?php

session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {
	$class=$_SESSION['class'];
}

$data = file_get_contents('php://input');
$json = json_decode($data, true);
$username = $json['username']; 
$title = $json['title'];
$code = $json['code'];
$comment = $json['comment'];

$db = new mysqli('localhost','root','duckvin','myDb');

if ($db->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO alerta (`username`, `title`, `class`, `code`, `comments`) VALUES ('$username', '$title', '$class', $code, '$comment')";

if(!$result = $db->query($sql)){
	die('There was an error running the query [' . $db->error . ']');
}

$db->close();

echo "Message was sent to teacher";

//get class
//get data
//log data
//client loads then responds logged

?>