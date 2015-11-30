<?php

//$request = file_get_contents('php://input');
//echo (var_dump(json_encode($request)));

$username = $_POST['username'];
$table = $_POST['table'];
$ttLevel = $_POST['ttLevel'];
$divLevel = $_POST['divLevel'];
if($table == ttYearThree || $table == ttYearFour){
  $level = $ttLevel;
  $SQLcol = "ttlevel";
} else if ($table == divYearThree || $table == divYearFour) {
  $level = $divLevel;
  $SQLcol = "divlevel";
}


$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = "SELECT * FROM $table WHERE username = '$username' AND $SQLcol = '$level' ORDER BY totalTime ASC";
if($result = $db->query($sql)){
    $attempts = $result->num_rows;
    while($row = $result->fetch_row()){
        $activity[]=$row;
    };
}

$db->close();
//echo $attempts;
echo json_encode($activity);
//echo $username . "----------" . $table;

?>