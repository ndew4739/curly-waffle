<?php
session_start();
ob_start();
$host="localhost"; // Host name 
$username="root"; // Mysql username 
$password="duckvin"; // Mysql password 
$db_name="myDb"; // Database name 
$tbl_name="MyStudents"; // Table name 

// Connect to server and select databse.
$conn = mysqli_connect("$host", "$username", "$password", "$db_name");
if ($conn===false) { 
mysqli_select_db("$db_name")or die("Connection failed: " . mysqli_connect_error());
}
 


$myusername=$_POST['myusername']; 
$mypassword=$_POST['mypassword'];


$sql="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result= $conn->query($sql);
$result_row=$result->fetch_object();

$row_cnt = $result->num_rows;



if($row_cnt==1){
  echo "success";
  $_SESSION['username'] = $result_row->username;
  $_SESSION['Sid'] = $result_row->Sid;
  $_SESSION['ttlevel'] = $result_row->ttlevel;
  $_SESSION['divlevel'] = $result_row->divlevel;
  $_SESSION['user_login_status'] = 1;
  header("Location: index.php");
}
else {
echo "Wrong Username or Password";
}

ob_end_flush();
?>
