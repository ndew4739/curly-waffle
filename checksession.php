<?php
session_start();
if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {
	$arr = array (
		'username'=>$_SESSION['username'],
		'first_name'=>$_SESSION['first_name'],
		'last_name'=>$_SESSION['last_name'],
		'class'=>$_SESSION['class']
	);

	echo json_encode($arr);
}
?> 