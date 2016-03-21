<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Punctuation</title> 
      <link rel="stylesheet" href="style.css?v=3">
      <style>
      body{
        height:100%;
      }
      th{
        text-align:right;
      }
      input[type="text"]{
        width:500px;
        padding-right:40px;
      }
      table{
        width:auto;
      }
      button{
        margin:5px;
        width:auto;
        float:left;
      }
      #students{
        width:700px;
        clear:all;
        height:100%;
      }
      </style>
	<script src="jquery-1.11.3.min.js"></script>
	<script src="jquery-ui.min.js"></script>
    <script>
    $(document).ready(function(){
      obj={};
    	$.getJSON("checksession.php", function(data) {
      		$( '#user-name' ).text(data.title + " " + data.last_name);
      		console.log(data);
    	}).fail(function(data) {
      		$("#login-section").load("teacher-login.html");
    	});
      function sendPunc(obj){
        $.post("setPunc.php", obj, function(data){
          console.log(data);
        })
        .fail(function(){
          alert("error");
        });
      }
      function getPunc(name){
        if($('#error').val()){
          console.log("affirmative");
          if($('#corrected').val()){
            obj.err = $('#error').val();
            obj.corr = $('#corrected').val();
            if($('#model').val()){
              obj.model = $('#model').val();
            }
            obj.name = name;
           // console.log(obj);
            return JSON.stringify(obj);
          } else {
            alert('Empty cell: "Corrected"');
            return false;
          }
        } else {
          alert('Empty cell: "Error"');
          return false;
        }
      }
      $('.stName').on('click', function(){
        var name = $(this).text();
        //console.log(name);
        var f = getPunc(name);
        if(f){
          sendPunc(f);
          $(this).remove();
        }
      })
      $('#wholeCl').on('click', function(){
        var name = $(this).val();
        //console.log(name);
        var f = getPunc(name);
        if(f){
          sendPunc(f);
          $(this).remove();
        }
      })
    });

    </script>

<body>
  <p id='user-name' style="color:white"></p>
  <a href="index.html" style="text-decoration:none; color:white; margin-bottom:5px">Home</a>
  <div>
  <form id="puncForm" action="formProcessNOT.php" method="post" autocomplete="off">
    
    <table>
      <tr>
        <th>Error: </th><td><input type="text" id="error"></td>
      </tr>
      <tr>
        <th>Corrected: </th><td><input type="text" id="corrected"></td>
      </tr>
      <tr>
        <th>Model(optional): </th><td><input type="text" id="model" data-index="0"></td>
      </tr>

    </table>

    <button type="button" id="wholeCl" value="all">Set for whole class</button>
  </form>
</div>
  
    <div id="students">
  <?php

session_start();

if(!$_SESSION['user_login_status']==1){
    header("HTTP/1.0 403 Forbidden");
} else {
    $class=$_SESSION['class'];
    $username = $_SESSION['username'];
}
$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = "SELECT username FROM MyStudents WHERE class = '$class'";

$result = $db->query($sql);

  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      $arr[] = $row['username'];
    }
//    var_dump ($arr);
  } else {
    echo "error loading class";
  };
//    echo $x[0];
    $stCount = count($arr);
    for($j = 0; $j < $stCount; $j++){
        echo '<button type="button" class="stName">'.$arr[$j].'</button>';
    }

  ?>
</div>
</body>
</html>
