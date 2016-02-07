<?php

session_start();
$contents = file_get_contents('php://input');
$data = JSON_decode($contents);
//var_dump($data);

if(!empty($data)){
	$sid = $data->SID;
}

//echo $sid;

$sql = "DELETE FROM MyStudents WHERE `Sid` = '$sid'";

$conn = new mysqli("localhost", "root", "duckvin", "myDb");

if ($conn->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

if ($conn->query($sql) === TRUE) {
    echo "Student deleted";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>