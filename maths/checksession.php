<?php
session_start();
if(!$_SESSION['user_login_status']==1){
	header("HTTP/1.0 403 Forbidden");
} else {
	$arr = array (
		'username'=>$_SESSION['username'],
		'Sid'=>$_SESSION['Sid'],
		'ttLevel'=>$_SESSION['ttlevel'],
		'divLevel'=>$_SESSION['divlevel'],
		'ttBestTime'=>$_SESSION['ttBestTime']
	);

	echo json_encode($arr);
}
?>