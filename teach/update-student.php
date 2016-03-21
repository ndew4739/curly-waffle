<?php

session_start();
$contents = file_get_contents('php://input');
$data = JSON_decode($contents);
//var_dump($data);


if(!empty($data)){
	$sid = $data->SID;
    $firstname = $data->firstname;
    $surname = $data->surname;
    $sex = $data->sex;
    $year = $data->year;
    $username = $data->username;
    $password = $data->password;
    $class = $data->class;
}


$sql="UPDATE MyStudents SET `firstname` = '$firstname', `lastname` = '$surname', `sex` = '$sex', `year` = '$year', `username` = '$username', `password` = '$password', `class` = '$class' WHERE `Sid` = '$sid'";

$conn = new mysqli("localhost", "root", "duckvin", "myDb");

if ($conn->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

if ($conn->query($sql) === TRUE) {
    echo "Student updated";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();


?>