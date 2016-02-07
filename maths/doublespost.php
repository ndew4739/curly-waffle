<?php

session_start();
if(!$_SESSION['user_login_status']==1){
header("Location: main_login.php");
}
$username = $_SESSION['username'];
$Sid = $_SESSION['Sid'];

$host="localhost"; // Host name 
$usernameDB="root"; // Mysql username 
$password="duckvin"; // Mysql password 
$db_name="myDb"; // Database name 

$conn = mysqli_connect("$host", "$usernameDB", "$password", "$db_name");
if ($conn===false) { 
mysqli_select_db("$db_name") or die("Connection failed: " . mysqli_connect_error());
}

$request = $_POST['level'];
$sql = "UPDATE MyStudents SET doublelev = '$request' WHERE username = '$username'";
mysqli_query($conn,$sql) or die(mysqli_error($conn));
echo "You're new level is: " . $request;
mysqli_close($conn);
?>
