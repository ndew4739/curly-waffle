<?php

session_start();
if(!$_SESSION['user_login_status']==1){
header("Location: main_login.php");
}

$username = $_SESSION['username'];

$request = file_get_contents('php://input');

$data = json_decode($request);

//var_dump($data);

$mysqli = new mysqli("localhost","root","duckvin","myDb");
if ($mysqli->connect_errno){
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

//$accuracy = $data.accuracy;
$time = $data->ttime;
//echo $time;
$newBest = $data->newBest;
//echo $newBest;
$level = $data->level;
//echo $level;

$sql = "INSERT INTO addSubLog (username, time) VALUES ('$username', '$time')";

if($newBest === true){
	$sql2 = "UPDATE addsub SET bestTime = '$time', level = '$level' WHERE username = '$username'";
} else {
	$sql2 = "UPDATE addsub SET level = '$level' WHERE username = '$username'";
};

if ($mysqli->query($sql) === TRUE) {
    echo "New record created successfully1";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
};

if ($mysqli->query($sql2) === TRUE) {
    echo "New record created successfully2";
} else {
    echo "Error: " . $sql2 . "<br>" . $mysqli->error;
};

?>
