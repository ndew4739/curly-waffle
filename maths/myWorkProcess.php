<?php
session_start();
$username=$_SESSION['username'];
$class=$_SESSION['class'];
$data = file_get_contents('php://input');
$object = json_decode($data);
//var_dump($array);
//echo $array;
$title = ($object->title);
$array = json_encode($object->array);
//echo $array;

$sql = "INSERT INTO formResults (username, class, title, array) VALUES ('$username','$class','$title','$array')";

$mysqli = new mysqli("localhost","root","duckvin","myDb");
if ($mysqli->connect_errno){
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully1";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
};



$mysqli->close();

?>