<?php

session_start();
if(!$_SESSION['user_login_status']==1){
header("Location: main_login.php");
}
$username = $_SESSION['username'];

$request = file_get_contents('php://input');
$jrequest = json_decode($request, true);
$size = sizeof($jrequest["times"]);
$seconds = 0;
$t = array();
$acc = ($size/($size + $jrequest["error"]));
$accperc = round(($acc*100), 2);
for($x = 0 ; $x < $size; ++$x)
{
    $seconds += $jrequest["times"][$x];
    ${"name" . $x} = $jrequest["times"][$x];
}

$totalTime = date('i:s',$seconds);
$timeStamp = date("Y-m-d H:i:s");


$host="localhost"; // Host name 
$usernameDB="root"; // Mysql username 
$password="duckvin"; // Mysql password 
$db_name="myDb"; // Database name 

$conn = mysqli_connect("$host", "$usernameDB", "$password", "$db_name");
if ($conn===false) { 
    mysqli_select_db("$db_name") or die("Connection failed: " . mysqli_connect_error());
}

$sql = "
SELECT ttlevel
FROM MyStudents
WHERE username = '$username'";
if(!$result = $conn->query($sql)){
  die('There was an error running the query [' . $conn->error . ']');
}

$result = $result->fetch_assoc();
$ttLevel = $result['ttlevel'];
//echo $ttLevel;
$target;
$table;
switch ($ttLevel) {
    case 1:
    case 2:
        $reqAcc = 0.95;
        $target = 120;
        $table = "ttYearThree";
        $sqltwo = "INSERT INTO $table VALUES ('$username', '$ttLevel', '$timeStamp', '$totalTime', '$accperc', '$name0', '$name1', '$name2', '$name3', '$name4', '$name5', '$name6', '$name7', '$name8', '$name9', '$name10', '$name11', '$name12', '$name13', '$name14', '$name15', '$name16', '$name17', '$name18', '$name19', '$name20', '$name21', '$name22', '$name23', '$name24', '$name25', '$name26', '$name27', '$name28', '$name29', '$name30', '$name31', '$name32', '$name33', '$name34', '$name35', '$name36', '$name37', '$name38', '$name39', '$name40', '$name41', '$name42', '$name43', '$name44', '$name45', '$name46', '$name47', '$name48', '$name49', '$name50', '$name51', '$name52', '$name53', '$name54', '$name55', '$name56', '$name57', '$name58', '$name59')";
        break;
    case 3:
    case 4:
        $reqAcc = 0.95;
        $target = 180;
        $table = "ttYearThree";
        $sqltwo = "INSERT INTO $table VALUES ('$username', '$ttLevel', '$timeStamp', '$totalTime', '$accperc', '$name0', '$name1', '$name2', '$name3', '$name4', '$name5', '$name6', '$name7', '$name8', '$name9', '$name10', '$name11', '$name12', '$name13', '$name14', '$name15', '$name16', '$name17', '$name18', '$name19', '$name20', '$name21', '$name22', '$name23', '$name24', '$name25', '$name26', '$name27', '$name28', '$name29', '$name30', '$name31', '$name32', '$name33', '$name34', '$name35', '$name36', '$name37', '$name38', '$name39', '$name40', '$name41', '$name42', '$name43', '$name44', '$name45', '$name46', '$name47', '$name48', '$name49', '$name50', '$name51', '$name52', '$name53', '$name54', '$name55', '$name56', '$name57', '$name58', '$name59')";
        break;
    default:
        $reqAcc = 0.97;
        $target = 300;
        $table = "ttYearFour";
        $sqltwo = "INSERT INTO $table VALUES ('$username', '$ttLevel', '$timeStamp', '$totalTime', '$accperc', '$name0', '$name1', '$name2', '$name3', '$name4', '$name5', '$name6', '$name7', '$name8', '$name9', '$name10', '$name11', '$name12', '$name13', '$name14', '$name15', '$name16', '$name17', '$name18', '$name19', '$name20', '$name21', '$name22', '$name23', '$name24', '$name25', '$name26', '$name27', '$name28', '$name29', '$name30', '$name31', '$name32', '$name33', '$name34', '$name35', '$name36', '$name37', '$name38', '$name39', '$name40', '$name41', '$name42', '$name43', '$name44', '$name45', '$name46', '$name47', '$name48', '$name49', '$name50', '$name51', '$name52', '$name53', '$name54', '$name55', '$name56', '$name57', '$name58', '$name59', '$name60', '$name61', '$name62', '$name63', '$name64', '$name65', '$name66', '$name67', '$name68', '$name69', '$name70', '$name71', '$name72', '$name73', '$name74', '$name75', '$name76', '$name77', '$name78', '$name79', '$name80', '$name81', '$name82', '$name83', '$name84', '$name85', '$name86', '$name87', '$name88', '$name89', '$name90', '$name91', '$name92', '$name93', '$name94', '$name95', '$name96', '$name97', '$name98', '$name99', '$name100', '$name101', '$name102', '$name103', '$name104', '$name105', '$name106', '$name107', '$name108', '$name109', '$name110', '$name111', '$name112', '$name113', '$name114', '$name115', '$name116', '$name117', '$name118', '$name119', '$name120', '$name121', '$name122', '$name123', '$name124', '$name125', '$name126', '$name127', '$name128', '$name129', '$name130', '$name131', '$name132', '$name133', '$name134', '$name135', '$name136', '$name137', '$name138', '$name139', '$name140', '$name141', '$name142', '$name143')";
}
//echo $table;

mysqli_query($conn,$sqltwo) or die(mysqli_error($conn));
if ($seconds <= $target && $acc > $reqAcc){
  $ttLevel++;
  $sql = "UPDATE MyStudents SET ttlevel = '$ttLevel' WHERE username = '$username'";
  mysqli_query($conn,$sql) or die(mysqli_error($conn));
  echo "Your new level is: " . $ttLevel;
  echo "\nTime: " . $totalTime . ". Accuracy: " . $accperc . "%";
} else {
  echo "Time: " . $totalTime . ". Accuracy: " . $accperc . "%";
}
mysqli_close($conn);

?>