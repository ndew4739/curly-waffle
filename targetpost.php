<?php

session_start();
if(!$_SESSION['user_login_status']==1){
header("Location: main_login.php");
}
$username = $_SESSION['username'];

$target = $_POST['target'];

$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}


$sql = "UPDATE MyStudents SET MultiTarget = '$target' WHERE username = '$username'";
$db->query($sql) or die($db->connect_error);
$db->close();

echo("Target set to " . $target . "x tables.")

?>