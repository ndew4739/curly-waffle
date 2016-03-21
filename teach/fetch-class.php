<?php
session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {
	$class=$_SESSION['class'];
//	echo $class;
}

$conn = new mysqli("localhost", "root", "duckvin", "myDb");

if ($conn->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

$arr = [];
$students;

$sql = "SELECT `Sid`, `firstname`, `lastname`, `username`, `year`, `sex`, `password`, `class` FROM `MyStudents` WHERE `class` = '$class'";

$result = $conn->query($sql);

if($result->num_rows > 0){
	while($row = $result->fetch_assoc()){
		$arr[] = $row;
	}
	echo JSON_encode($arr);
} else {
	echo JSON_encode($arr);
};
$conn->close();
?> 