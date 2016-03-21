<?php
session_start();
$class = $_SESSION['class'];
$contents = file_get_contents('php://input');
$data = JSON_decode($contents);
//var_dump($data);
//
$arr = [];
if(!empty($data)){
    foreach ($data as $obj){
    	$firstname = $obj->firstname;
    	$surname = $obj->surname;
    	$sex = $obj->sex;
    	$year = $obj->year;
    	$username = $obj->username;
    	$password = $obj->pass;
    	$arr[]="('$firstname','$surname','$sex','$year','$username','$password','$class')";
    }
}
$sql="INSERT INTO MyStudents (firstname, lastname, sex, year, username, password, class) VALUES ".implode(",",$arr);

$conn = new mysqli("localhost", "root", "duckvin", "myDb");

if ($conn->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
//var_dump(implode(",",$arr));
$conn->close();
?>