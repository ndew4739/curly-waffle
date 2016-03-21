<?php

session_start();

if(!$_SESSION['user_login_status']==1){
    header("HTTP/1.0 403 Forbidden");
} else {
    $class=$_SESSION['class'];
    $username = $_SESSION['username'];
    $object = file_get_contents('php://input');
}
$x = json_decode($object);
$id = $x->id;
$error = $x->error;
$correct = $x->correct;
$attempts = $x->attempts;
$allocation = $x->allocation;
$live = $x->live;


if($allocation==='all'){
    $table = 'puncAll';
    $sql = "INSERT INTO puncAll (id, allocation, class, error, correct, attempts, live) VALUES ('$id','$username','$class','$error','$correct','$attempts','$live')";
} else {
    $sql = "UPDATE punc SET attempts = '$attempts', live = '$live' WHERE allocation = '$username'";
}

$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

if ($db->query($sql) === TRUE) {
    echo "New record created successfully1";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
};



$db->close();

?>