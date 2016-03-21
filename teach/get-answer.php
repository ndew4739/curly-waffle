<?php

session_start();

if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {
//	$class=$_SESSION['class'];
//	$username=$_SESSION['username'];


//$lastCall = file_get_contents('php://input');


//$id = json_decode($lastCall);

$lastCall = $_POST['lastCall'];

$qNum = $_POST['qNum'];

$class = $_POST['class'];

$db = new mysqli('localhost','root','duckvin','myDb');

if ($db->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM answers WHERE qNum = '$qNum' AND class = '$class' AND `id` > '$lastCall' ORDER BY `id` DESC";

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
	echo false;
}

}




$db->close();


//get class
//get data
//log data
//client loads then responds logged

?>