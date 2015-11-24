<?php
session_start();
if(!$_SESSION['user_login_status']==1){
header("Location: main_login.php");
}
$username = $_SESSION['username'];
echo $username;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Doubles</title> 
    <script src="JQuery.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="doublesjs.js" type="text/javascript"></script>
    <script>
    </script>
</head>
<body>
    <link rel="stylesheet" type="text/css" href="gridcss.css">
<div id="btn_select">
<button id="go">GO!</button>
</div>
<div class = "container">
<table id="tbl">
  <tbody>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
  </tbody>
</table>
<form onsubmit="checkAns();return false;">
<div class="input-group">
<p id="here"></p>
<input type="number" id="guessInput" size = 4 autofocus autocomplete="off" class="form-control"/>
<input type="button" id="fireButton" value = "submit" class="btn btn-danger"/>
</div>
</form>

</div>
<p id = totalTime></p>
<div id="links">
<a href=index.php>Back to homepage</a>
<a href=doubles.php>Reload</a>
</div>
<script>

$(document).ready(function(){
  $.get("fetchlevel.php", function( data ){
  level = data;
  mapGrid(level);
    $('#go').click(function(){
      setNum();
    });
  });
});
</script>
</html>
