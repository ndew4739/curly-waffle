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
$err = $x->err;
$corr = $x->corr;
$att = $x->att;
$name = $x->name;


$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}


if($x->model){
	$model=$x->model;
	$sql = "INSERT INTO punc (allocation, class, error, correct, model) VALUES ('$name','$class','$err','$corr','$model')";
} else {
	$sql = "INSERT INTO punc (allocation, class, error, correct) VALUES ('$name','$class','$err','$corr')";

}

if ($db->query($sql) === TRUE) {
    echo "New record created successfully1";
} else {
    echo "Error: " . $query . "<br>" . $db->error;
};



$db->close();

?>