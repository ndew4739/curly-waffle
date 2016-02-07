<?php

session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {
	$class=$_SESSION['class'];
}

$lastCall = file_get_contents('php://input');

//$id = json_decode($lastCall);

$int = json_decode($lastCall);

$id = $int->number;

$db = new mysqli('localhost','root','duckvin','myDb');

if ($db->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM alerta WHERE DATE(timestamp) = CURDATE() AND `class` = '$class' AND `id` > '$id' ORDER BY `id` DESC";

//echo $sql;
$rows = array();

$results=$db->query($sql);
$check =  $results->num_rows;
if($check > 0){
	while($row = $results->fetch_assoc()) {
	$rows[]=$row;
	} 
	echo(json_encode($rows));
} else {
	echo "empty";
}






$db->close();


//get class
//get data
//log data
//client loads then responds logged

?>