<?php

$class = $_POST['myClass'];
//var_dump($class);

$db = new mysqli('localhost','root','duckvin','myDb');

if ($db->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT title, words FROM Theme WHERE class = '$class'";

if(!$result = $db->query($sql)){
  die('There was an error running the query [' . $db->error . ']');
}

$array = [];

if($result->num_rows > 0){
	while($wordList = $result->fetch_assoc()) {
		$array[]=$wordList;
	}
	echo json_encode($array);
} else {
	echo false;
};

$db->close();

?>