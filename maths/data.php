<!DOCTYPE html>
<html>
<head>
<title>Data Home</title>
</head>
<body>
 <link rel="stylesheet" type="text/css" href="gridcss.css">
<div id = "here">
<form action="" id="usernameform">
<br />
<?php


$db = new mysqli('localhost', 'root', 'duckvin', 'myDb');

if($db->connect_errno > 0){
    die('Unable to connect to database [' . $db->connect_error . ']');
}
$sql = "
SELECT username
FROM MyStudents
ORDER BY lastname ASC";
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}

echo "Select student: <br />
<select id=\"try\" name=\"courseID\">
    <option value=\"0\">Username </option>\n";
$sql = "
SELECT username
FROM MyStudents
ORDER BY lastname ASC";
if(!$result = $db->query($sql)){
    die('There was an error running the query [' . $db->error . ']');
}
while($row = $result->fetch_assoc()){
echo " <option value=\"{$row["username"]}\">{$row["username"]} </option>\n";
}
echo " </select>";
?>
<br />
<input type="submit" class="button" value="Get Data" />
</form>

</div>
<div id="result"></div>

<table id="stats">
  <tr>
    <th>Username</th>
    <th>Curent level</th>
    <th>Attempts</th>
    <th>Best time</th>
    <th>Accuracy</th>
  </tr>
  <tr id="entry">
    <td id='uname'></td>
    <td id='clevel'></td>
    <td id='att'></td>
    <td id='btime'></td>
    <td id='acc'></td>
  </tr>
</table>

<table id="tbl">
    <tr>
        <td></td>
        <td>1</td>
        <td>2</td>
        <td>3</td>
        <td>4</td>
        <td>5</td>
        <td>6</td>
        <td>7</td>
        <td>8</td>
        <td>9</td>
        <td>10</td>
        <td>11</td>
        <td>12</td>
    </tr>
    <tr>
        <td>1</td>
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
        <td>2</td>
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
        <td>3</td>
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
        <td>4</td>
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
        <td>5</td>
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
        <td>6</td>
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
        <td>7</td>
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
        <td>8</td>
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
        <td>9</td>
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
        <td>10</td>
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
        <td>11</td>
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
        <td>12</td>
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
</table>
</div>
<p id = totalTime></p>
<a href=index.php>Back to homepage</a>

<script src="JQuery.js"></script>
<script>
$(document).ready(function(){
var stData;
var bestSession = [];
var arr = $('#tbl > tbody > tr').map(function ()
{
    return $(this).children().map(function ()
    {
        return $(this);
    });
}).get();

var te = 0;
for(i = 1; i < arr.length; i++){
    for(j = 1; j < arr[i].length; j++){
        arr[i][j].attr("data-row", te);
        var bb = (arr[i][j].attr("data-row"));
//        arr[i][j].text(bb); 
        te++;
    }    
}
  $(".button").click(function(){
    for(i=1; i < 13; i++){
                for(j=1; j < 13; j++){
                    arr[i][j].text(" ");
                    arr[i][j].attr('class','empty');

                }
            }
    var data = $('#try option:selected').text();
    $.post("multiquery.php",
    data,
    function(response,status){
      $( "#result" ).text(response);
      stData = $.parseJSON(response);
        if(stData[2] && stData[2].length-4===144){
            for(e=0;e<4;e++){
                bestSession.push(stData[2].shift());
                console.log(bestSession);
            }
            $( '#uname' ).text(bestSession[0]);
            $( '#clevel' ).text(stData[0]);
            $( '#att' ).text(stData[1]);
            $( '#btime' ).text(bestSession[2]);
            $( '#acc' ).text(bestSession[3]+"%");

            for(i=1; i < 13; i++){
                for(j=1; j < 13; j++){
                    var cell = stData[2].shift();
                    arr[i][j].text(cell);
                    if(cell>4){
                        arr[i][j].attr('class','long');
                    }
                }
            }
      bestSession = []   
     } else if(stData[2] && stData[2].length-4===60){
            for(e=0;e<4;e++){
                bestSession.push(stData[2].shift());
                console.log(bestSession);
            }
            $( '#uname' ).text(bestSession[0]);
            $( '#clevel' ).text(stData[0]);
            $( '#att' ).text(stData[1]);
            $( '#btime' ).text(bestSession[2]);
            $( '#acc' ).text(bestSession[3]+"%");
            for(i=1; i < 4; i++){
                for(j=1; j < 13; j++){
                    var cell = stData[2].shift();
                    arr[i][j].text(cell);
                    if(cell>4){
                        arr[i][j].attr('class','long');
                    }
                }
            }
            for(i=5; i < 11; i+=5){
                for(j=1; j < 13; j++){
                    var cell = stData[2].shift();
                    arr[i][j].text(cell);
                    if(cell>4){
                        arr[i][j].attr('class','long');
                    }
                }
            bestSession = [];
            }
        } else {

            $( '#uname' ).text($( "#try option:selected" ).text());
            $( '#clevel' ).text(stData[0]);
            $( '#att' ).text(stData[1]);
            $( '#btime' ).text(" ");
            $( '#acc' ).text(" ");        }
    })
    return false;
  });
});
    </script>
 </body>
</html>
