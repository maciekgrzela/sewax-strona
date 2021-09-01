$('.btn-wide').on('click', function(event){
  var name = $('input[name=imie]').val();
  var product = $('input[name=product]').val();
  var contact = $('input[name=contact]').val();
  var content = $('textarea[name=content]').val();
  $.ajax({
    type: 'POST',
    url: 'engine.php',
    data: {
      nameToSend: name,
      productToSend: product,
      contactToSend: contact,
      contentToSend: content
    },
    success: function(msg){
      var message = msg;
      var iconType;
      if (message.length == 59){
        iconType = "up";
      }else{
        iconType = "down";
      }
      $('.well').html("<div class='container'><div class='row'><div class='col-xs-12 text-center'><i class='fa fa-thumbs-"+ iconType +" fa-7x' aria-hidden='true'></i><p>"+message+"</p></div></div>");
    }
  });
});
