
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Training</title> 
    <script src="JQuery.js"></script>
    <script src="jquery-ui.js"></script>
    <script src="targettraining.js" type="text/javascript"></script>
    <link rel="stylesheet" type="text/css" href="gridcss.css">
    <script>
    </script>
</head>
<body>

<p id = "totalTime"></p>
<div id="links">
<a href=index.php>Back to homepage</a>
<a href=targettraining.php>Reload</a>
</div>
<div id="btn_select">
<button id="go">GO!</button>
</div>
<div class = "container">
<form onsubmit="checkAns();return false;">
<div class="input-group">
<p id="here"></p>
</div>
<div class="input-group">
<input type="number" id="guessInput" size = 4 autofocus autocomplete="off" class="form-control"/>
<input type="button" id="fireButton" value = "submit" class="btn btn-danger"/>
</div>
</form>
<div class = "structure" id="lift">
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
    </tr>
  </tbody>
</table>

</div>
<div class="structure" id="divMagic">
<table class="array" id="array">
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>
    <tr>
        <td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
    </tr>

</table>

</div>


</div>

<script>

$(document).ready(function(){

    // check user session
    $.getJSON("checksession.php", function(data) {
      $( '#user-name' ).text(data.username);
      // todo: save data locally for offline mode

    }).fail(function(data) {
      window.location = "main_login.html";
    });

  $.get("fetchtarget.php", function( data ){
  var target = data;
  mapGrid(target);
  clearArray();
    $('#go').click(function(){
      setNum();
    });
  });
});
</script>
</html>