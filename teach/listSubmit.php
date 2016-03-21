<?php
	$request = file_get_contents('php://input');
	$data = json_decode($request);
	$username = $data->username;
	$class = $data->class;
	$title = $data->title;
    $array = $data->words;
    $words = json_encode($array);

    $db = new mysqli('localhost','root','duckvin','myDb');

    if ($db->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
	}

	$sql = "INSERT INTO Theme (username, class, title, words) VALUES ('$username', '$class', '$title', '$words')";

	if(!$result = $db->query($sql)){
	  die('There was an error running the query [' . $db->error . ']');
	}
	
$db->close();

echo "success";
?>