$(function() {
  var form = $('#ajax-contact');
  var formMessages = $('#form-messages');


  $(form).submit(function(e) {
    e.preventDefault();

    var formData = $(form).serialize();

    $.ajax({
      type: 'POST',
      url: $(form).attr('action'),
      data: formData
    }).done(function(response){
      $(formMessages).removeClass('alert alert-danger');
      $(formMessages).addClass('alert alert-success');

      $(formMessages).text(response);

      $('#name').val('');
      $('#product').val('');
      $('#location').val('');
      $('#contactData').val('');
      $('#query').val('');
    }).fail(function(data){
        $(formMessages).removeClass('alert alert-success');
        $(formMessages).addClass('alert alert-danger');

        if (data.responseText !== '') {
          $(formMessages).text(data.responseText);
        } else {
          $(formMessages).text('Ups! Wystąpił błąd podczas wysyłania formularza. Spróbuj ponownie później');
        }
    });

  });
});