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
<a href="index.html" style="text-decoration:none; color:white;margin-bottom:5px">Home</a>
<div class="news-feed">
<div>
<?php

session_start();

if(!$_SESSION['user_login_status']==1){
    header("HTTP/1.0 403 Forbidden");
} else {
    $class=$_SESSION['class'];
    $username = $_SESSION['username'];
//  echo $class;
}



$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = "SELECT title FROM dailyForm WHERE username = '$username' AND live = 1";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Title</th></tr>";
    while($row = $result->fetch_assoc()){
        $title = $row["title"];
        echo "<tr><td class = 'select'><a href= 'forms.php?username=$username&title=$title'>".$title."</a></td>";
    }
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