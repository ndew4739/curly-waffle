var numArray = [];
var arr;
var finalSpot = [];
var halfSpot = [];
var ans;
var loc;
var counter = 0;
var level = 0;
var errorCount = 0;

Array.prototype.shuffle = function() {
    var input = this;     
    for (var i = input.length-1; i >=0; i--) {     
        var randomIndex = Math.floor(Math.random()*(i+1)); 
        var itemAtIndex = input[randomIndex]; 
        input[randomIndex] = input[i]; 
        input[i] = itemAtIndex;
    }
    return input;
}


function mapGrid(mLevel) {
 level = mLevel;
  arr = $('#tbl > tbody > tr').map(function ()
    {
      return $(this).children().map(function ()
        {
          return $(this);
        });
  }).get();
//  console.log(arr);
  var tRow = mLevel*15;
  for(i=0; i<15; i++){
    x = (tRow-i);
    numArray.push(x);
  }
// console.log(numArray);
}

function setNum(){
  for(i=0; i<15; i++){
    arr[0][i+1].text(numArray.pop());
  }
  var spotArray1 = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
  var spotArray2 = [2,4,6,8,10,12,14,1,3,5,7,9,11,13,15];
  var spotArray3 = [4,8,12,1,5,9,13,2,6,10,14,3,7,11,15];
  var spotArray4 = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15];
  spotArray4.shuffle();
  finalSpot = spotArray1.concat(spotArray2, spotArray3, spotArray4);
  halfSpot = spotArray1.concat(spotArray2, spotArray3, spotArray4);
  $( '#links' ).hide();
  $( '#go' ).remove();
  $( '#guessInput' ).focus();
//  console.log(finalSpot);
  locate();

}

function leaveTens(){
  for(i=0;i<16;i++){
    if(arr[1][i].text()%5!=0 && finalSpot.length > 15){
      arr[1][i].removeAttr('class','correct');
      arr[1][i].text(" ");
    } else if(finalSpot.length <=15){
      arr[1][i].removeAttr('class','correct');
      arr[1][i].text(" ");      
    }
  }
}

function locate(){
  if(finalSpot.length > 0){
    if(counter % 15 == 0){
      leaveTens();
    }
    counter++
//    console.log(counter);
    loc = finalSpot.shift();
    arr[1][loc].attr('id','selected');
    arr[1][loc].text(" ");
    var d = new Date();
    startTime = d.getTime();    
    ans = arr[0][loc].text()*2;
    document.getElementById('here').innerHTML = "Double " + (arr[0][loc]).text();
//      cheat function
//    document.getElementById('guessInput').value = ans;
  } else {
    console.log("fin");
  }
}

function checkAns() {
    var Uans = document.getElementById("guessInput").value;
//    console.log(ans)
    if (Uans == ans){
        arr[1][loc].text(ans);
        arr[1][loc].removeAttr('id','selected').attr('class','correct');
        if(finalSpot.length > 0){
        document.getElementById("guessInput").value = "";
            locate();
        } else {
            finish();
        }        
    } else {
        errorCount++;
        arr[1][loc].removeAttr('id','selected').attr('class','error');
        $( '#tbl' ).effect( 'shake' );
        document.getElementById("guessInput").value = "";
        console.log(errorCount);
    }
}

function finish(){
  var d = new Date();
  finTime = d.getTime();
  var numBat = (finTime - startTime);
  totalTime = Math.round((numBat + 0.00001) * 100)/ 100000;
  $('form').remove();
  $( '#links' ).show();
//  console.log(totalTime);
  var accuracy = (60/(60 + errorCount))*100;
  var acc = accuracy.toFixed(2);
  console.log(accuracy + "//" + acc);
  if(totalTime < 3 && accuracy > 96){
    level++
    console.log(level);
    $.post("doublespost.php",
    {level},
    function(response,status){
    var levelUp = response;
    $( "#totalTime" ).text("Total time: " + totalTime + " Accuracy: " + acc + "%");
    alert("*----Received Data----*\n\nTotal time : " + totalTime +"\n\nLevel up!");    
    });
  } else {
    alert("Total time: " + totalTime)
    $( "#totalTime" ).text("Total time: " + totalTime + " Accuracy: " + acc + "%");

  }
}
