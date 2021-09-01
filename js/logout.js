$('.logout').on('click', function(e){
  var session_name = 'login';
  $.ajax({
    type: 'POST',
    url: 'session_destroyer.php',
    data: {
      sName: session_name
    },
    success: function(msg){
      document.location.href = './';
    }
  });
});
