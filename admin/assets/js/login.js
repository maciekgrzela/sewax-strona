$('.btn-send').on('click', function(){
  var session_name = 'login';
  var form_login = $('#inputLogin').val();
  var form_password  = $('#inputPassword').val();
  var status;
  $.ajax({
    type: 'POST',
    url: 'session_controller.php',
    data: {
      login: form_login,
      password: form_password,
      sName: session_name,
      session_status: status
    },
    success: function(msg){
      var login_info = msg;
      if (login_info == "OK"){
        document.location.href = '../';
      }else if (login_info == "WP") {
        $('.alert-danger').css({
          'display': 'block',
        });
      }
    }
  });
});
