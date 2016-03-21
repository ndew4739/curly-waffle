<?php
session_start();
$username=$_SESSION['username'];
$class=$_SESSION['class'];
$data = file_get_contents('php://input');
$array = json_decode($data);
//var_dump($array);
//echo $array;
$title = json_encode($array->head);
echo $username;
echo $class;
//echo "     ";
echo $title;
//echo "    ";
$a = $array->array;
$questions = json_encode($a);
//$c = count($a);
//for($x = 0; $x < $c; $x++){
//	echo json_encode($a[$x]);
//}
//echo = count($a);
//echo $c
//$questions = json_encode($array->array[0]);
//echo $questions;

$sql = "INSERT INTO dailyForm (username, class, title, questions) VALUES ('$username','$class','$title','$questions')";

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