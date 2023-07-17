$(document).ready(function() {
  $('#firstname, #lastname, #username').on('input', function() {
    var input = $(this);
    var id = input.attr('id');
    $.ajax({
      url: 'validate_' + id + '.php',
      type: 'POST',
      data: {
        value: input.val()
      },
      success: function(data) {
        $('#' + id + '-error').text(data);
      }
    });
  });

  $('#psw, #psw-repeat').on('input', function() {
    if ($('#psw').val() !== $('#psw-repeat').val()) {
      $('#psw-repeat-error').text('Les mots de passe ne correspondent pas.');
    } else {
      $('#psw-repeat-error').text('');
    }
  });
});
