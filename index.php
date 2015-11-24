<?php
session_start();
if(!$_SESSION['user_login_status']==1){
header("Location: main_login.php");
}
$username = $_SESSION['username'];
$Sid = $_SESSION['Sid'];
$ttlevel = $_SESSION['ttlevel'];
?>

<html>
  <head>
  <link rel="stylesheet" type="text/css" href="mystyle.css">
  </head>
  <body>
    <div id="banner">
    <ul id="banban">
    <li><?php echo $username; ?></li>
    <li><a id="done" href = "logout.php">logout</a></li>
    </ul>
    </div>
    <div class="header">
    <h1>3/4D's homepage</h1>
    <p>Choose your game below:</p>
    <form method="link" action="ttupdate.php">
    <input type = "submit" value = "magic timestable button">
    </form>
    <form method="link" action="divupdate.php">
    <input type = "submit" value = "magic division button">
    </form>
    <form method="link" action="doubles.php">
    <input type = "submit" value = "magic doubles button">
    </form>
    </div>
<div></div>
  </body>
</html>
