<?php

function resultToArray($result) {
    $rows = array();
    while($row = $result->fetch_assoc()) {
        $rows[] = $row;
    }
    return $rows;
}

$data = array();

$username = $_POST['username'];

$db = new mysqli('localhost','root','duckvin','myDb');

if ($db->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT qNum FROM live_question WHERE username = '$username' ORDER BY qNum DESC LIMIT 1";

$sql2 = "SELECT * FROM live_question WHERE username = '$username' AND completed = 0 ORDER BY qNum DESC";

if(!$result = $db->query($sql)){
  die('There was an error running the query [' . $db->error . ']');
}

if($result->num_rows > 0){
	$last = $result->fetch_assoc();
	$data['lastQ'] = $last['qNum'];
//	echo json_encode($last);
	$result->free();
	if(!$result = $db->query($sql2)){
  		die('There was an error running the query [' . $db->error . ']');
	} else {
		$result = $db->query($sql2);
		$rows = resultToArray($result);
		$data['incomplete'] = $rows;
		echo json_encode($data); // Array of rows
		$result->free();
	}
} else {
	echo false;
};

$db->close();

?>