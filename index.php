<?php
session_start();
if(!$_SESSION['user_login_status']==1){
header("Location: main_login.php");
}
$username = $_SESSION['username'];
$Sid = $_SESSION['Sid'];
$ttLevel = $_SESSION['ttlevel'];
$divLevel = $_SESSION['divlevel'];
?>
<!DOCTYPE html>
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
    <form method="link" action="targettraining.php">
    <input type = "submit" value = "Target Practice">
    </form>
    <button id="target">Set Target</button>
    <div class="input-group">
    <input type="number" id="input" size = 4 autofocus autocomplete="off" class="form-control"/>
    <input type="button" id="fireButton" value = "submit"/>
    </div>
    </div>
<div></div>
<script src="JQuery.js"></script>
<script src="jquery-ui.js"></script>
<script>

$(document).ready(function(){
$( ".input-group" ).hide();

    $( "#target" ).click(function(){
        $( ".input-group" ).show();
        $( "#fireButton" ).click(function(){
            var target = $( "#input" ).val();
            if(target > 12){
                alert("Maximum number is 12");
            } else {
            $( ".input-group" ).hide();
            $( "#target" ).hide();
            $.post("targetpost.php",
            {target},
            function(data){
            alert(data);
            
            }); 
            }
        });
    });    
});
</script>
  </body>
</html>
