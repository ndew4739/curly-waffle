<!DOCTYPE html>
<html>
<head>
<title>Punctuation</title>

<link rel="stylesheet" href="style.css">
<style>
p{
  background-color: #ffaa71;
}
</style>
<script src="jquery-1.11.3.min.js"></script>
  <script src="jquery-ui.min.js"></script>
<script>

$(document).ready(function(){
    var accuracy = 0;
    var errorCount = 0;
    var errorLog = [];
    var key = "Here is an unpunctuated sentence. It is simple. It is not punctuated. I do not like it."
    console.log(key);
    var ansArray = key.split("");
    console.log(ansArray);
    $('#response').submit(function(){
        res = $('#stInput').val().split("");
        console.log(res);        
        for(i = 0;i<ansArray.length;i++){
            if(res[i]==ansArray[i]){
                errorLog.push(res[i])
                } else {
                errorCount++;
                errorLog.push(res[i]);
                console.log(res[i] + "--" + ansArray[i]);
                var output = errorLog.join("");
                alert("Errors");
                $('#error').text("Error at: " + "'" + output + "_'" + "(<----expecting " + "'" + ansArray[i] + "')");
                errorLog = [];
                output = [];
                break; 
            }
            $('#error').text("Success! Extend your sentence and send it to Mr de Wilde.");
        }
        event.preventDefault();
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
<div style="padding-top:60px">
  <h1>Welcome to the Art of Punctuation</h1>
  <p class="model" style="background-color:#ffaa71">These will be the model sentences. They are simple. They are nicely punctuated. I like them.</p>
  
  <p class = "task">here is an unpunctuated sentence it is simple it is not punctuated i do not like it</p>
  
  <p id = "error"><p>
  <form id="response" action="logMe.php">
  <textarea style="height: 200px;width: 800px; font-size: 18px" id="stInput" autocomplete="off" class="input"/></textarea>
  <input type="submit" id="go" value = "submit">
  </form>
</div>
</body>
</html>