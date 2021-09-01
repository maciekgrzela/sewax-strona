$('.change').on('click', function change(event){
  var classNoDot = $(this).val();
    var className = '.'+classNoDot;
    var mixed = $(className).html();
    if(classNoDot == 'new_img'){
    } else if($(this).val().substring(0,3) != 'img'){
        var content = mixed.split('<button');
        $('.val').html(classNoDot);
        $('.modal-title').html('Zmień właściwość:  '+content[0]+' ');
    }
  if (classNoDot == 'lbl18' || $(this).val().substring(0,3) == 'img'){
      $('#myModal2').modal("show");
      $('.modal-title').html('Zmień właściwość: OBRAZEK');
      if ($(this).val().substring(0,3) == 'img'){
        $('input[type=hidden]').val($(this).attr('name'));
      }else {
        $('input[type=hidden]').val('lbl18');
      }
  }else if (classNoDot == 'new_img'){
    $('#myModal2').modal("show");
    $('.modal-title').html('Dodaj obrazek');
    $('input[type=hidden]').val('new');
  }else {
    $('#myModal').modal("show");
  }
});
$('.btn-send-shift').on('click', function(){
  var whatToChange = $('.val').html();
  var newV = $('textarea[name=shift]').val();
  $.ajax({
    type: 'POST',
    url: 'shift_value.php',
    data : {
      what_to_change : whatToChange,
      newValue : newV
    },
    success: function(msg){
      $('#myModal').modal('toggle');
      location.reload();
    }
  });
});
$('.refresh').on('click', function(){
  location.reload();
});
$('.delete').on('click', function(){
  $('input[type=hidden].del').val($(this).attr('name'));
  $('#myModal3').modal('show');
});
$('.btn-send-delete').on('click', function(){
  var wtd = $('input[type=hidden].del').val();
  $.ajax({
    type: 'POST',
    url: 'deleteIMG.php',
    data: {
      delete: wtd
    },
    success: function(msg){
      location.reload();
    },
  });
});
$('.password').on('click', function(){
  $('#myModal4').modal('show');
});
$('.btn-send-update-pass').on('click', function(){
  var newPassword = $('input[type=password].pass').val();
  $.ajax({
    type: 'POST',
    url: 'update_password.php',
    data: {
      newPass: newPassword
    },
    success: function(msg){
      location.reload();
    }
  });
});
