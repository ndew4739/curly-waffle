<!DOCTYPE html>
<html>
<head>
<title>Data Home</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="news-title">
    <h1>Numeracy Table</h1>
</div>
<div class="news-feed">
<div>
<?php
$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = "SELECT username, ttlevel, divlevel, doublelev FROM MyStudents";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Username</th><th>Timestables</th><th>Division</th><th>Doubles</th></tr>";
    while($row = $result->fetch_assoc()){
        $username = $row["username"];
        $ttLevel = $row["ttlevel"];
        $divLevel = $row["divlevel"];
        $doubleLev = $row["doublelev"];
        echo "<tr><td class = 'select'><a href= 'stats.php?username=$username&ttlevel=$ttLevel&divlevel=$divLevel'>".$username."</a></td><td>".$row["ttlevel"]."</td><td>".$row["divlevel"]."</td><td>".$row["doublelev"]."</td></tr>";
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