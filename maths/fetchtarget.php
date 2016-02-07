<?php
session_start();
if(!$_SESSION['user_login_status']==1){
header("Location: main_login.php");
}
$username = $_SESSION['username'];

$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
  die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = "
SELECT MultiTarget
FROM MyStudents
WHERE username = '$username'";
if(!$result = $db->query($sql)){
  die('There was an error running the query [' . $db->error . ']');
}

$level = $result->fetch_assoc();
echo $level['MultiTarget'];

$db->close();;
?>