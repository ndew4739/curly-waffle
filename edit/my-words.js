
$.loadList = function() {
  $.getJSON("checksession.php", function(data) {
        $( '#trythis' ).text(data.username);
        console.log(data.username);
      }).fail(function(data) {
        window.location = "main-login.html";
  });
}

$(function() {
  $.loadList();
});
/*
$(document).ready(function(){

  jsonData = 
  $.ajax({
    url: '/echo/json/',
    type: 'POST',
    data: {
        json: jsonData
    },
    success: function (response) {
        var trHTML = '';
        $.each(response, function (i, item) {
            trHTML += '<tr><td>' + item.rank + '</td><td>' + item.content + '</td><td>' + item.UID + '</td></tr>';
        });
        $('#records_table').append(trHTML);
    }
});

});
*/

