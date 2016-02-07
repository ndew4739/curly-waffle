<?php

$word_list = array("this","is","my","word","list");

$list = json_encode($word_list);

$username = "priscilla.owusu";

$db = new mysqli('localhost','root','duckvin','myDb');

if ($db->connect_errno >0) { 
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO wordLists VALUES ('$username','$list')";

if ($db->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $db->error;
}

$db->close();

?>