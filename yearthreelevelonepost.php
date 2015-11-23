<?php

session_start();
if(!$_SESSION['user_login_status']==1){
header("Location: main_login.php");
}
$username = $_SESSION['username'];
$Sid = $_SESSION['Sid'];
$ttlevel = $_SESSION['ttlevel'];

$host="localhost"; // Host name 
$usernameDB="root"; // Mysql username 
$password="duckvin"; // Mysql password 
$db_name="myDb"; // Database name 

$conn = mysqli_connect("$host", "$usernameDB", "$password", "$db_name");
if ($conn===false) { 
mysqli_select_db("$db_name") or die("Connection failed: " . mysqli_connect_error());
}

$request = file_get_contents('php://input');
$jrequest = json_decode($request, true);
$seconds = 0;
$t = array();
$acc = (60/(60 + $jrequest["error"]));
$accperc = round(($acc*100), 2);
for($x = 0 ; $x < sizeof($jrequest["times"]); ++$x)
{
    $seconds += $jrequest["times"][$x];
    ${"name" . $x} = $jrequest["times"][$x];
}

$totalTime = date('i:s',$seconds);
$timeStamp = date("Y-m-d H:i:s");

if ($seconds < 120 && $acc > 0.95){
    if ($ttlevel==1){ 
    $sql = "INSERT INTO year3levelone VALUES ('$username', '$timeStamp', '$totalTime', '$accperc', '$name0', '$name1', '$name2', '$name3', '$name4', '$name5', '$name6', '$name7', '$name8', '$name9', '$name10', '$name11', '$name12', '$name13', '$name14', '$name15', '$name16', '$name17', '$name18', '$name19', '$name20', '$name21', '$name22', '$name23', '$name24', '$name25', '$name26', '$name27', '$name28', '$name29', '$name30', '$name31', '$name32', '$name33', '$name34', '$name35', '$name36', '$name37', '$name38', '$name39', '$name40', '$name41', '$name42', '$name43', '$name44', '$name45', '$name46', '$name47', '$name48', '$name49', '$name50', '$name51', '$name52', '$name53', '$name54', '$name55', '$name56', '$name57', '$name58', '$name59')";
    $sqltwo = "UPDATE MyStudents SET ttlevel=2 WHERE username = '$username'";
    mysqli_query($conn,$sql) or die(mysqli_error($conn));
    mysqli_query($conn,$sqltwo) or die(mysqli_error($conn));
    echo "Time: " . $totalTime . ". Accuracy: " . $accperc . "% ! Level up!";
    } else {
    echo "Error logging times into database. Notify your teacher.";
    } 
} else {
    if ($ttlevel==1){ 
        $sql = "INSERT INTO year3levelone VALUES ('$username', '$timeStamp', '$totalTime', '$accperc', '$name0', '$name1', '$name2', '$name3', '$name4', '$name5', '$name6', '$name7', '$name8', '$name9', '$name10', '$name11', '$name12', '$name13', '$name14', '$name15', '$name16', '$name17', '$name18', '$name19', '$name20', '$name21', '$name22', '$name23', '$name24', '$name25', '$name26', '$name27', '$name28', '$name29', '$name30', '$name31', '$name32', '$name33', '$name34', '$name35', '$name36', '$name37', '$name38', '$name39', '$name40', '$name41', '$name42', '$name43', '$name44', '$name45', '$name46', '$name47', '$name48', '$name49', '$name50', '$name51', '$name52', '$name53', '$name54', '$name55', '$name56', '$name57', '$name58', '$name59')";
        mysqli_query($conn,$sql) or die(mysqli_error($conn));
    echo "Time: " . $totalTime . ". Accuracy: " . $accperc . "%";
    } else {
    echo "Error logging times into database. Notify your teacher.";
    }
}
mysqli_close($conn);
?>
