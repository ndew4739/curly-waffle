<!DOCTYPE html>
<html>
<head>
<title>Form Home</title>
<link rel="stylesheet" type="text/css" href="style.css">
<script src="jquery-1.11.3.min.js"></script>
<script src="jquery-ui.min.js"></script>

<script>
    $(document).ready(function(){
        $.getJSON("checksession.php", function(data) {
            $( '#user-name' ).text(data.username);
            $( '#class' ).text(data.class);
            console.log(data);
        }).fail(function(data) {
            $("#login-section").load("teacher-login.html");
        });
        var x = ($(":input[type='text']").length);
        $('input[type="text"]').last().addClass('last');
        $('.x').on('click', function(){
            $(this).parent().remove();
        })
        $('#editList').on('keydown', 'input', function(event) { 
            if (event.which == 13) {
                event.preventDefault();
                if($(this).hasClass('last')){
                    event.preventDefault();
                    console.log("last");
                    $('#list').append('<div><input type="text" style="margin:10px"><button type="button" class="x">x</button><br></div>');
                    $(this).removeClass('last');
                    $('input[type="text"]').last().focus().addClass('last');
                }
            }
        });
        $('#submit-list').off().on('click', function(e){
            e.preventDefault();
            var storeList = {};
            storeList.username = $('#username').text();
            storeList.class = $('#class').text();
            var array = [];
            var title = $('#title').text();
            storeList.title = title;
            $('input[type="text"').each(function(){
                var f = $(this).val();
                array.push(f);
            })
            storeList.words = array;
            console.log(storeList);
            var themeList = JSON.stringify(storeList);
            console.log(themeList);
            $.post("listUpdate.php", themeList, function(data){
            })
            .fail(function(){
                alert("Error storing list. Contact administrator.")
            })
            .done(function(data){
                alert("List updated");
                window.location = "themeList.php"
            })
        });

    });
</script>
</head>
<body>
    <p id="user-name"></p>
    <p id="class"></p>
<div class="news-title">
    <h1>Form Table</h1>
</div>
<a href="themeList.php" style="text-decoration:none;color:white;font-size:18px">back</a>
<div class="news-feed">
<div style="margin-left:40%">
    <form id="editList" action="updateTheme.php" method="post">
        <div id="list">
<?php

session_start();

if(!$_SESSION['user_login_status']==1){
    header("HTTP/1.0 403 Forbidden");
} else {
    $class=$_SESSION['class'];
    $username = $_SESSION['username'];
    $title = $_GET['title'];
//  echo $class;
}
$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}

$sql = "SELECT * FROM Theme WHERE title = '$title'";

$result = $db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo'<h2 id="title">'.$title.'</h2>';
    $x = json_decode($row['words']);
    $wCount = count($x);
//    echo $x[0];
    for($j = 0; $j < $wCount; $j++){
        echo '<div><input type="text" style="margin:10px" value="'.$x[$j].'"><button type="button" class="x">x</button><br></div>';
    }
/*    $u = ($obj[0]['username']);
    $b = count($x);
    $stCount = count($obj);
    echo '<table><tr><th colspan="'.(($b*2)+1).'" style="font-size:28px">'.$form.'</th></tr>';
    echo '<tr><th>Name</th>';
    for($i = 0; $i<$b; $i++){
        echo '<th colspan="2" style="border-left:solid black">Question'.($i+1).'</th>';
    }
    echo '</tr>';
    echo '<tr><th></th>';
    for($i = 0; $i<$b; $i++){
        echo '<th style="border-left:solid black">att</th><th style="border-left:solid black 1px">corr</th>';
    }
    echo '</tr>';
    for($j = 0; $j < $stCount; $j++){
        $name = $obj[$j]['username']; 
        $dasRow = json_decode($obj[$j]['array']);
        echo '<tr><td>'.$name.'</td>';
        for($i = 0; $i<$b; $i++){
            echo '<td style="border-left:solid black">'.$dasRow[$i]->attempts.'</td><td style="border-left:solid black 1px">'.$dasRow[$i]->correct.'</td>';
        }
        echo '</tr>';
    }

//    $qNums = $obj[0]->array[0]['username'];
//    echo $qNums;
    echo "</table>";*/
} else {
    echo "0 results";
}
$db->close();
?>
</div>
<input type="submit" id="submit-list">
</form>
</div>
</div>
</body>
</html>