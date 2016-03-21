<?php
session_start();
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="duckvin"; // Mysql password 
$db_name="myDb"; // Database name 
$tbl_name="Teachers"; // Table name 

// Connect to server and select databse.
$conn = new mysqli("$host", "$username", "$password", "$db_name");

if ($conn->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}
 
$username=$_POST['username']; 
$password=$_POST['password'];
$sql="SELECT * FROM $tbl_name WHERE username='$username' and password='$password'";
$result= $conn->query($sql);
$result_row=$result->fetch_object();
$row_cnt = $result->num_rows;
if($row_cnt==1){
  	echo "success";
  	$_SESSION['username'] = $result_row->username;
  	$_SESSION['password'] = $result_row->password;
  	$_SESSION['first_name'] = $result_row->first_name;
  	$_SESSION['last_name'] = $result_row->last_name;
	$_SESSION['title'] = $result_row->title;
	$_SESSION['class'] = $result_row->class;
  	$_SESSION['user_login_status'] = 1;
  	header("Location: index.html");
}
else {
echo "Wrong Username or Password";
}
ob_end_flush();
?>