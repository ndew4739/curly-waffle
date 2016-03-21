<!DOCTYPE html>
<html>
<head>
<title>Punctuation</title>

<link rel="stylesheet" href="style.css">
<style>
h1{
  color:#ffaa71;
  text-shadow: 1px 4px black;
}
p{
  background-color: #ffaa71;
  display:inline-block;
  padding: 5px;
}
</style>
<script src="jquery-1.11.3.min.js"></script>
  <script src="jquery-ui.min.js"></script>
<script>

$(document).ready(function(){
  $.getJSON("../checksession.php", function(data) {
      $( '#user-name' ).text(data.username);
  });
  $.post("getPunc.php", function(data) {
//    console.log(data);
  if(data){
    var grab = JSON.parse(data);
    console.log(grab);
    if(grab.model){
      $('#model').text(grab.model);
    } else {
      $('#model').text("There is no model text for this activity");
    }
    var accuracy = 0;
    var errorCount = 0;
    var errorLog = [];
    var key = grab.correct;
//    var key = "Here is an unpunctuated sentence. It is simple. It is not punctuated. I do not like it."
//    console.log(key);
    var ansArray = key.split("");
//    console.log(ansArray);
    $('#task').text(grab.error);
    $( '#example' ).click(function(){
      $('#model').show();
      $('#example').remove();
    })
    $('#response').submit(function(){
        var clean = true;
        res = $('#stInput').val().split("");
        console.log(res);        
        for(i = 0;i<ansArray.length;i++){
            if(res[i]==ansArray[i]){
                errorLog.push(res[i])
            } else {
              clean=false;
              errorCount++;
              errorLog.push(res[i]);
              console.log(res[i] + "--" + ansArray[i]);
              var output = errorLog.join("");
              $('#error').show();
              $('#error').text("Error at: " + "'" + output + "_'" + "(<----expecting: " + "'" + ansArray[i] + "')");
              errorLog = [];
              output = [];
              break; 
            }
            

            }
        if(clean){
        $('#error').show().text("Success! Extend your sentence and send it to Mr de Wilde.");
            grab.attempts = errorCount + 1;
            grab.live = 0;
            console.log(grab);
            if(grab.allocation === "all"){
              grab.username = $('#user-name').text();
            }
            var send = JSON.stringify(grab);
            $.post('puncResult.php', send, function(result){
              console.log(result);
            })
          }
        event.preventDefault();
      })
    
  } else {
    $('#go').remove();
    $('#task').text("You have no sentences set.")
  }
  });
});

</script>
</head>

<body id="main-page">

<div id="tab-bar">
  <ul id="left-side">
    <li><a id="home" href="index.html">Home</a>
  </ul>
    <ul id="right-side">
      <li id="user-name"></li>
      <li><a href="../index.html">Title</a></li>
      <li><a href="logout.php">Logout</a></li>
    </ul>
</div>
<div style="padding-top:60px; margin-left:70px">
  <h1>Welcome to the Art of Punctuation</h1>
  <div>
  <p id="model" style="display:none"></p>
  <button type="button" id="example">See<br>Example</button>
  </div>
  <div>
  <p id = "task"></p>
  </div>
  <div>
  <p id = "error" style="display:none"></p>
  </div>
  <form id="response" action="logMe.php">
  <textarea style="height: 100px;width: 800px; font-size: 18px" id="stInput" autocomplete="off" class="input"/></textarea>
  <input type="submit" id="go" value = "submit">
  </form>
</div>
</body>
</html>