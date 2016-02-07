<!DOCTYPE html>
<html>
<?php

echo ($_GET['username'].$_GET['ttlevel'].$_GET['divlevel']);

$username = $_GET['username'];
$ttLevel = $_GET['ttlevel'];
$divLevel = $_GET['divlevel'];

if ($ttLevel <= 4){
   $ttTable="ttYearThree";
} else {
   $ttTable="ttYearFour";
}

if ($divLevel <= 4){
   $divTable="divYearThree";
} else {
   $divTable="divYearFour";
}

?>

<body>
<link rel="stylesheet" type="text/css" href="gridcss.css">

<form action="" id="selectOperation">
<select id="operation">
  <option value=0 id="starter">Operation</option>
  <option id="mult" value="<?php echo $ttTable ?>">Multiplication</option>
  <option id="div" value="<?php echo $divTable ?>">Division</option>
</select>
</form>
<form action="" id="stat">
<select id="statCall">
  <option value=0>Statistic</option>
  <option value="btime">Best Time</option>
  <option value="lavg">Average This Level</option>
</select>
</form>
<table id="stats">
  <tr>
    <th>Username</th>
    <th class="multD">Multiplication <br> level</th>
    <th class="divD">Division <br> level</th>
    <th>Attempts</th>
    <th class = "best">Best time</th>
    <th class = "avg">Average time</th>
    <th class = "best">Accuracy</th>
    <th class = "avg">Average <br> accuracy</th>
  </tr>
  <tr id="entry">
    <td id='uname'><?php echo $username ?></td>
    <td class="multD" id='ttlevel'><?php echo $ttLevel ?></td>
    <td class="divD" id='divlevel'><?php echo $divLevel ?></td>
    <td id='att'></td>
    <td class = "best" id="bTime"></td>
    <td class = "avg" id="aTime"></td>
    <td class = "best" id="bAcc"></td>
    <td class = "avg" id="aAcc"></td>
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

<button><a href="index.php">Student Homepage</a></button>

<script src="JQuery.js"></script>

<script>


$(document).ready(function(){
var avTimeArray = [];
var avTime=0;
var avAcc = 0;
var yrThree = [1,2,3,5,10];
var yrFour = [1,2,3,4,5,6,7,8,9,10,11,12];
var mapArray;
var gridData = [];

function secToTime(totalSeconds){
var minutes = parseInt(totalSeconds/60) % 60;
var seconds = totalSeconds % 60;
var time = (minutes < 10 ? "0" + minutes : minutes) + ":" + (seconds < 10 ? "0" + seconds : seconds);
return time;
}

function sec(time){
    var a = time.split(':');
    var seconds = (+a[0]) * 60 + (+a[1]);
    return seconds;
}

var arr = $('#tbl > tbody > tr').map(function ()
{
    return $(this).children().map(function ()
    {
        return $(this);
    });
}).get();

function clearGrid(){
    for(i=1;i<13;i++){
        for(j=1;j<13;j++){
            arr[i][j].text("").attr('class','clear');
        }
    }
}
  $( ".best" ).hide();
  $( ".avg" ).hide();
  $( "#stat" ).hide(); 
  $( "#selectOperation" ).change(function() {
  clearGrid();
  $('#statCall option[value=0]').prop('selected', true);
  $( "#starter" ).remove();
  $( "#stat" ).show();
    var data = {'table': $('#operation option:selected').val(), 'username': $('#uname').text(), 'ttLevel': $( '#ttlevel' ).text(), 'divLevel': $( '#divlevel' ).text()};
    $.post("data500.php", data, function(response){
        stData=$.parseJSON(response);
//        console.log(stData.length);
        console.log(stData);
    if(stData){
        if($('#operation option:selected').attr("id") == "mult"){
            $( '.divD' ).hide();
            $( '.multD' ).show();
        } else if ($('#operation option:selected').attr("id") == "div"){
            $( '.divD' ).show();
            $( '.multD' ).hide();
        }
    $("#att").text(stData.length);
    $("#bTime").text(stData[0][3]);
    $("#bAcc").text(stData[0][4]);
    } else {
    alert("No attempts for this level");
    }
    $( "#stat" ).change(function(){
        var stat = $( '#statCall option:selected').val();
        if(stat=="btime"){
          $( ".avg" ).hide();
          $( ".best" ).show();
          var kay = stData[0].length;
          for(i=5;i<kay;i++){
              gridData.push(stData[0][i]);
          }
          if(stData[0].length <= 65){
            mapArray = yrThree;
          }  else {
            mapArray = yrFour;
          }
          for(i=0;i<mapArray.length;i++){
            for(j=1;j<13;j++){
              var cell = gridData.shift();
              arr[mapArray[i]][j].text(cell);
              if(cell>4){
                  arr[mapArray[i]][j].attr('class','long');
              } else {
                  arr[mapArray[i]][j].attr('class','correct');
              }
            }
          }
        console.log(gridData);                  

        } else if(stat=="lavg") {
          $( ".avg" ).show();
          $( ".best" ).hide();

            for(j=5;j<stData[0].length;j++){
            var avCell = 0;
                for(i=0;i<stData.length;i++){
                    avCell += parseFloat(stData[i][j]);
                }            
            avTimeArray.push((avCell/stData.length).toFixed(2))
            }
            console.log(avTimeArray);

            if(stData[0].length <= 65){
                mapArray = yrThree;
            } else {
                mapArray = yrFour;
            }

            for(i=0;i<mapArray.length;i++){
                for(j=1;j<13;j++){
                    var cell = avTimeArray.shift();
                    arr[mapArray[i]][j].text(cell);
                    if(cell>4){
                        arr[mapArray[i]][j].attr('class','long');
                    } else {
                        arr[mapArray[i]][j].attr('class','correct');
                    }
                }
            }            
            for(i=0;i<stData.length;i++){
                avTime += sec(stData[i][3]);
                avAcc += parseInt(stData[i][4]);
            }            
            finalTime = (avTime/stData.length).toFixed(0)
            var finalAcc = (avAcc/stData.length).toFixed(2);
            $( "#aTime" ).text(secToTime(finalTime));
            $( "#aAcc" ).text(finalAcc+"%");
//            alert(secToTime(finalTime));
            avAcc = 0;
            avTime=0;
        } else {
            alert("null");
        }
    });
    });
  });

  $( "#btn" ).click( function(){
    $.post("getstats.php", function(response){
        stData=$.parseJSON(response);
        console.log(stData);
    });
  });
});

</script>
</body>
</html>
