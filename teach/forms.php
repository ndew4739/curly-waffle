<!DOCTYPE html>
<html>
<head>
<title>Form Home</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="news-title">
    <h1>Form Table</h1>
</div>
<a href="formSummary.php" style="text-decoration:none;color:white;font-size:18px">back</a>
<div class="news-feed">
<div>
<?php

session_start();

if(!$_SESSION['user_login_status']==1){
    header("HTTP/1.0 403 Forbidden");
} else {
    $class=$_SESSION['class'];
    $username = $_SESSION['username'];
    $form = $_GET['title'];
    $obj = [];
//  echo $class;
}
$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = "SELECT * FROM formResults WHERE title = '$form'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()){
    	$obj[] = $row;
    }
    $x = json_decode($obj[0]['array']);
    $u = ($obj[0]['username']);
    $b = count($x);
    $stCount = count($obj);
    echo '<table><tr><th colspan="'.(($b*2)+1).'" style="font-size:28px">'.$form.'</th></tr>';
    echo '<tr><th>Name</th>';
    for($i = 0; $i<$b; $i++){
        echo '<th colspan="2" style="border-left:solid black">Question'.($i+1).'</th>';
    }
    echo '</tr>';
    echo '<tr><th></th>';
    for($i = 0; $i<$b; $i++){
        echo '<th style="border-left:solid black">att</th><th style="border-left:solid black 1px">corr</th>';
    }
    echo '</tr>';
    for($j = 0; $j < $stCount; $j++){
        $name = $obj[$j]['username']; 
        $dasRow = json_decode($obj[$j]['array']);
        echo '<tr><td>'.$name.'</td>';
        for($i = 0; $i<$b; $i++){
            echo '<td style="border-left:solid black">'.$dasRow[$i]->attempts.'</td><td style="border-left:solid black 1px">'.$dasRow[$i]->correct.'</td>';
        }
        echo '</tr>';
    }

//    $qNums = $obj[0]->array[0]['username'];
//    echo $qNums;
    echo "</table>";
} else {
    echo "0 results";
}
$db->close();
?>
</div>
</div>
</body>
</html>