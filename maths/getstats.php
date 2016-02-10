<?php

session_start();
if(!$_SESSION['user_login_status']==1){
header("Location: main_login.php");
}
$username = $_SESSION['username'];

$mysqli = new mysqli("localhost","root","duckvin","myDb");
if ($mysqli->connect_errno){
	echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}

$sql = "INSERT INTO addSub (username, level)
SELECT * FROM (SELECT '$username', 1) AS tmp
WHERE NOT EXISTS (
    SELECT username FROM addSub WHERE username = '$username'
) LIMIT 1";

if(!$result = $mysqli->query($sql)){
  die('There was an error running the query [' . $mysqli->error . ']');
}

$sql2 = "SELECT username, level, bestTime FROM addsub WHERE username = '$username'";

if(!$result2 = $mysqli->query($sql2)){
  die('There was an error running the query2 [' . $mysqli->error . ']');
}

if($result2->num_rows > 0){
	$data = $result2->fetch_assoc();

} else {
	echo false;	
};

echo json_encode($data);

$mysqli->close();

?>
